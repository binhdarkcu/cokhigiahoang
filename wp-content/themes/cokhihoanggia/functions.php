<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
include_once( get_template_directory() . '/utilites/Utilities.php');
include_once( get_template_directory() . '/utilites/Stores.php');
include_once( get_template_directory() . '/utilites/BaoGiaValidator.php');
//Define constants
define('TEMPLATE_PATH', get_bloginfo('template_url'));
define('HOME_URL', get_home_url());
define('BlOG_NAME', get_bloginfo('blog_name'));
define('SLOGAN', get_bloginfo('description'));
//Hooks
add_action('wp_enqueue_scripts', 'ajax_enqueue');

//Send ajax request without login
add_action('wp_ajax_nopriv_tao_bao_gia', 'bao_gia');
add_action('wp_ajax_tao_bao_gia', 'bao_gia');

add_action('wp_ajax_nopriv_luu_thong_tin_khach_hang', 'luu_thong_tin_khach_hang');
add_action('wp_ajax_luu_thong_tin_khach_hang', 'luu_thong_tin_khach_hang');

add_action('wp_ajax_nopriv_tinh_don_gia', 'tinh_don_gia');
add_action('wp_ajax_tinh_don_gia', 'tinh_don_gia');

add_action('wp_ajax_get_list_bao_gia', 'danh_sach_bao_gia');
add_action('wp_ajax_cap_nhat_trang_thai', 'cap_nhat_trang_thai');
add_action('wp_ajax_update_setting', 'update_setting');

//Hide admin footer from admin
function change_footer_admin() {
    return ' ';
}

add_filter('admin_footer_text', 'change_footer_admin', 9999);

function change_footer_version() {
    return ' ';
}

add_filter('update_footer', 'change_footer_version', 9999);

$file = get_template_directory() . '/assets/logo_email.png'; //phpmailer will load this file
$uid = 'logo'; //will map it to this UID
$name = 'logo.png'; //this will be the file name for the attachment

global $phpmailer;
add_action('phpmailer_init', function(&$phpmailer)use($file, $uid, $name) {
    $phpmailer->SMTPKeepAlive = true;
    $phpmailer->AddEmbeddedImage($file, $uid, $name);
});

//create admin ajax url
function ajax_enqueue() {
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', array('jquery'));
    wp_enqueue_script('blockUI', get_template_directory_uri() . '/js/jquery.blockUI.js', array('jquery'));
    wp_localize_script('main_js', 'globalConfig', array('admin_ajax_url' => admin_url('admin-ajax.php')));
}

function luu_thong_tin_khach_hang() {
    global $wp_version;
    global $wpdb;
    $json_data = $_POST['json'];

    if (version_compare($wp_version, '5.0', '<')) {

        $json = wp_unslash($json_data);
    } else {

        $json = $json_data;
    }
    $bao_gia = json_decode($json, true);

    $validator = new BaoGiaValidator();
    $error = $validator->isValidData($bao_gia);

    if ($error['message']) {
        $result['message'] = $error['message'];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        // Don't forget to stop execution afterward.
        wp_die();
    }

    $ho_ten = $bao_gia['ho_ten'];
    $sdt = $bao_gia['so_dt'];
    $email = $bao_gia['email'];
    $cty = $bao_gia['cty'];
    $trang_thai = 'Đã xem';
    $token = uniqid();
    $token_expiry = strtotime("+30 minutes");
    $ngay_tao = $ngay_cap_nhat = current_time('Y-m-d h:i:s');
    
    $_table = $wpdb->prefix . "bao_gia";
    $query = $wpdb->prepare("INSERT INTO $_table "
            . "(full_name, phone_number, email, company, status, order_detail, token, token_timestamp, created_date, updated_date, is_deleted) "
            . "VALUES(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, 0)", array($ho_ten, $sdt, $email, $cty, $trang_thai, '_chi_tiet', $token, $token_expiry, $ngay_tao, $ngay_cap_nhat));
 
    $wpdb->query($query);
    $lastid = $wpdb->insert_id;
    
    $bao_gia['so_bao_gia'] = '0'.$lastid;
    $chi_tiet = json_encode($bao_gia, JSON_UNESCAPED_UNICODE);
    $wpdb->update($_table, array('order_detail' => $chi_tiet), array('id' => $lastid));
    echo $token;
    wp_die();
}

function bao_gia() {
    check_ajax_referer('H4GpryAtCnbwJVTdNMMf', 'security');
    global $wp_version;
    global $wpdb;
    $validator = new BaoGiaValidator();
    $json_data = $_POST['json'];

    // Create response
    $status = 'ERROR';
    $message = 'Thông tin báo giá đã được gửi thành công';
    $result = array(
        'message' => $message,
        'status' => $status
    );

    if (version_compare($wp_version, '5.0', '<')) {

        $json = wp_unslash($json_data);
    } else {

        $json = $json_data;
    }

    $bao_gia = json_decode($json, true);

    $error = $validator->isValidData($bao_gia);
    if ($error['message']) {

        $result['message'] = $error['message'];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        // Don't forget to stop execution afterward.
        wp_die();
    }
    //Lấy thông tin người báo giá
    //Validate dữ liệu đầu vào
    $ho_ten = $bao_gia['ho_ten'];
    $sdt = $bao_gia['so_dt'];
    $email = $bao_gia['email'];
    $cty = $bao_gia['cty'];
    $trang_thai = 'Đã báo giá';
    $chi_tiet = json_encode($bao_gia, JSON_UNESCAPED_UNICODE);
    $ngay_tao = $ngay_cap_nhat = current_time('Y-m-d h:i:s');
    $token = $bao_gia['token'];

    // Check type of product
    $loai_sp = $bao_gia['loai_sp'];
    switch ($loai_sp) {
        case 'Giàn giáo':
            $chi_tiet = json_encode(calculate_data_for_gian_giao($bao_gia), JSON_UNESCAPED_UNICODE);
            break;
        case 'Vận thăng':
            $chi_tiet = json_encode(calculate_data_for_van_thang($bao_gia), JSON_UNESCAPED_UNICODE);
            break;
        default:
            break;
    }

    //TODO: update exist order
    $_table = $wpdb->prefix . "bao_gia";
    $now = time();
    if ($token) {
        $query = $wpdb->prepare("UPDATE $_table SET status = %s, order_detail = %s, updated_date = %s, token = NULL, token_timestamp = 0 WHERE token= %s AND token_timestamp > $now", $trang_thai, $chi_tiet, $ngay_tao, $token);
    } else {
        $query = $wpdb->prepare("INSERT INTO $_table "
                . "(full_name, phone_number, email, company, status, order_detail, token, token_timestamp, created_date, updated_date, is_deleted) "
                . "VALUES (%s, %s, %s, %s, %s, %s, NULL, 0, %s,%s, 0)", $ho_ten, $sdt, $email, $cty, $trang_thai, $chi_tiet, $ngay_tao, $ngay_cap_nhat);
    }

    $wpdb->query($query);

    if (send_email_to_customer($bao_gia)) {
        $result['status'] = 'SUCCESS';
    } else {
        $result['message'] = 'Không thể gửi email!';
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    // Don't forget to stop execution afterward.
    wp_die();
}

function send_email_to_customer($bao_gia) {
    $fields = array('ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'so_luong', 'loai_vt', 'tl_vt_hang', 'so_long', 'tl_long', 'chieu_cao', 'bien_tan', 'vi_tri', 'vi_tri2', 'ngay_can_hang', 'thoi_gian_thue');

    $available_fields = array();

    foreach ($bao_gia as $key => $value) {
        if (in_array($key, $fields)) {
            $available_fields[$key] = $value;
        }
    }

    $template_path = get_template_directory() . '/template-parts/emailing/email-customer.html';
    $template = file_get_contents($template_path);

    $chi_tiet = '';
    foreach ($available_fields as $key => $value) {
        $template = str_replace("[$key]", $value, $template);

        $dvt = '';
        switch ($key) {
            case 'thoi_gian_thue':
                $dvt = 'tháng';
                break;
            case 'so_luong':
                $dvt = 'bộ';
                break;
            case 'chieu_cao':
                $dvt = 'm';
                break;
            case 'bien_tan':
                $dvt = 'biến tần';
                break;
            default:
                break;
        }

        if ($key !== 'ho_ten' && $key !== 'so_dt' && $key !== 'email' && $key !== 'cty' && $key !== 'vi_tri' && $key !== 'vi_tri2' && $key !== 'form_bao_gia' && $key !== 'ngay_can_hang') {
            $chi_tiet .= 'hinh_thuc' && $available_fields[$key] === 'Bán' ? 'Mua /' : " $available_fields[$key] $dvt/";
        }
    }

    $chi_tiet = substr($chi_tiet, 0, -1);
    $date = getdate(date("U"));
    $ngay_thang = "Ngày $date[mday] tháng $date[mon] năm $date[year]";

    $template = str_replace("[chi_tiet]", $chi_tiet, $template);
    $template = str_replace("[ngay_thang]", $ngay_thang, $template);

    $to = $available_fields['email'];
    $subject = 'Xác nhận đơn hàng';
    $body = $template;
    $headers = array('Content-Type: text/html; charset=UTF-8');

    return true ;//wp_mail($to, $subject, $body, $headers);
}

function danh_sach_bao_gia() {
    global $wpdb;
    $rows = array();
    $result = array(
        'data' => $rows,
        'status' => 'ACTION_DENIED'
    );

    if (is_admin()) {
        $query = "SELECT * FROM " . $wpdb->prefix . "bao_gia WHERE is_deleted = 0 ORDER BY created_date DESC";
        $wpdb->query($query);

        $rows = $wpdb->get_results($query, 'ARRAY_A');
        $result['data'] = $rows;
        $result['status'] = 'OK';
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    wp_die();
}

function cap_nhat_trang_thai() {
    global $wpdb;
    // Validate input data
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
    $action = filter_input(INPUT_POST, "action_type", FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_STRING);

    $response = array(
        'data' => 'null',
        'id' => $id,
        'action' => $action,
        's' => $status,
        'status' => 'ACTION_DENIED'
    );

    $_table = $wpdb->prefix . "bao_gia";
    if (is_admin() && $id) {
        $query = '';
        if ($action == 'delete') {
            //convert to array
            $ids = explode(',', $id);
            $query_ids = '';
            $param_ids = array();

            foreach ($ids as $_id) {
                if (isset($_id)) {
                    //assigns to list of params
                    $query_ids .= '%d,';
                    //assigns to list of values
                    $param_ids[] = $_id;
                }
            }

            $query_ids = substr($query_ids, 0, -1);

            $query = $wpdb->prepare("UPDATE $_table SET is_deleted=1 WHERE id IN($query_ids)", $param_ids);
        } else if ($action == 'update' && $status) {
            $query = $wpdb->prepare("UPDATE $_table SET status = %s  WHERE id= %d", $status, $id);
        }
        $wpdb->query($query);
        $response['status'] = $query;
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    wp_die();
}

function update_setting() {
    global $wpdb;
    global $wp_version;
    $value = $_POST['setting_value'];
    $key = $_POST['setting_key'];

    if (version_compare($wp_version, '5.0', '<')) {

        $json = wp_unslash($value);
    } else {

        $json = $value;
    }

    $rows = array();
    $result = array(
        'data' => $rows,
        'status' => 'ACTION_DENIED'
    );

    $status = 'ERROR';

    $created_date = $updated_date = current_time('Y-m-d h:i:s');

    // array
    $decode_value = json_decode($json, JSON_UNESCAPED_UNICODE);

    // string
    $encoded_value = json_encode($decode_value, JSON_UNESCAPED_UNICODE);

    if (is_admin()) {
        $query = "SELECT * FROM " . $wpdb->prefix . "baogia_settings WHERE setting_key = '$key' AND is_deleted = 0 ORDER BY created_date DESC";
        $wpdb->query($query);

        $rows = $wpdb->get_results($query, 'ARRAY_A');

        if ($rows) {
            $query = "UPDATE " . $wpdb->prefix . "baogia_settings SET setting_value = '$encoded_value', updated_date = '$updated_date' WHERE setting_key = '$key'";
        } else {
            $query = "INSERT INTO " . $wpdb->prefix . "baogia_settings (setting_key, setting_value, created_date, updated_date) VALUES ('$key','$encoded_value', '$created_date', '$updated_date')";
        }

        $wpdb->query($query);

        $result['status'] = 'OK';
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    wp_die();
}

// Tính đơn giá giàn giáo, vận thăng
function tinh_don_gia() {
    global $wp_version;
    global $wpdb;
    $jsonData = $_POST['json'];

    if (version_compare($wp_version, '5.0', '<')) {

        $json = wp_unslash($jsonData);
    } else {

        $json = $jsonData;
    }

    $baoGia = json_decode($json, true);

    switch ($baoGia['loai_sp']) {
        case 'Giàn giáo':
            $baoGia = calculate_data_for_gian_giao($baoGia);
            break;
        case 'Vận thăng':
            $baoGia = calculate_data_for_van_thang($baoGia);
            break;
        default;
    }

    echo json_encode($baoGia, JSON_UNESCAPED_UNICODE);
    wp_die();
}

//*
// SUPPORT FUNCTIONS
//*/
//*
//INPUT: @string eg: "100,203"
//OUTPUT: @number 100203
//*/
function convert_to_number($string) {
    return (float) str_replace(',', '', $string);
}

function calculate_data_for_van_thang($baoGia) {
    switch ($baoGia['loai_vt']) {
        case 'Vận thăng hàng':
            $baoGia = $baoGia['hinh_thuc'] == 'Thuê' ? calculate_data_for_thue_VTH($baoGia) : calculate_data_for_mua_VTH($baoGia);
            break;
        case 'Vận thăng lồng':
            $baoGia = $baoGia['hinh_thuc'] == 'Thuê' ? calculate_data_for_thue_VTL($baoGia) : calculate_data_for_mua_VTL($baoGia);
            break;
        default;
    }
    return $baoGia;
}

function calculate_data_for_mua_VTL($baoGia) {
    $ulti = new Utilities();
    
    if($baoGia['so_long'] == '1 lồng'){
        $code = '1L';
        $soLong = 1;
    }else{
        $code = '2L';
        $soLong = 2;
    }
    
    $code .= $baoGia['tl_long'] == '1 tấn' ? '1T' : '2T';
    $donGiaMua = get_don_gia_mua_VTL();
    $donGia = $donGiaMua[$code];
    $caiDatChung = get_mua_VTL_cai_dat_chung();
    // Xảy ra lỗi
    if (!$donGia) {
        return $baoGia;
    }

    $giaBienTan = 0;
    $giaSan = convert_to_number($donGia['don_gia']);
    $giaMotMet = convert_to_number($donGia['don_gia_mot_khung']);

    //Thông tin sản phẩm
    $hasBienTan = $baoGia['bien_tan'];
    $baoGia['cong_suat_bien_tan'] = $donGia['cong_suat_bien_tan'];
    $baoGia['tai_trong'] = $donGia['tai_trong'];
    $baoGia['kieu_van_thang'] = $donGia['kieu_van_thang'];

    if ($hasBienTan == 'Có') {
        $giaBienTan = convert_to_number($caiDatChung['gia_bien_tan']);
        $baoGia['show_bien_tan'] = 'grid';
        $baoGia['dong_co'] = $donGia['dong_co'];
    } else {
        $baoGia['show_bien_tan'] = 'none';
        $baoGia['dong_co'] = $donGia['dong_co_ko_bt'];
    }

    $temp = array();
    $temp['so_khung_vt_tc'] = (get_so_khung($baoGia['chieu_cao'], true) - 2)*$baoGia['so_luong'];
    $temp['so_thanh_giang'] = get_so_thanh_giang($baoGia['chieu_cao'])*$baoGia['so_luong'];
    $khungVTLamTron = get_so_khung($baoGia['chieu_cao'], true);

    $temp['don_gia_1_bo'] = ($giaBienTan*$soLong + $giaSan + $giaMotMet * $khungVTLamTron) * get_gia_tri_san_pham($baoGia);

    $temp['tong_x_bo_truoc_thue'] = $temp['don_gia_1_bo'] * $baoGia['so_luong'];
    $temp['vat'] = $temp['tong_x_bo_truoc_thue'] * 0.1;
    $temp['tong_x_bo_sau_thue'] = $temp['tong_x_bo_truoc_thue'] + $temp['vat'];

    $baoGia['don_gia_bang_chu'] = $ulti->convert_number_to_words($temp['tong_x_bo_sau_thue']);

    // Cọc 1
    $temp['coc_1'] = $temp['tong_x_bo_sau_thue'] * 0.5;
    $baoGia['coc_1_bang_chu'] = $ulti->convert_number_to_words($temp['coc_1']);

    // Định dạng thông số, vd: 50000 => 50,000
    foreach ($temp as $key => $value) {
        $baoGia[$key] = number_format($value);
    }

    return $baoGia;
}

function calculate_data_for_thue_VTL($baoGia) {
    $data = get_don_gia_thue_vtl($baoGia);
    // Có lỗi xảy ra
    if (!$data) {
        return $baoGia;
    }

    $donGiaThue = $data['thong_tin_don_gia'][$baoGia['chieu_cao']];
    $ttvt = $data['thong_tin_sp'];
    $cuaTang = $data['cua_tang'];
    $caiDatChung = get_thue_VTL_cai_dat_chung();

    $uti = new Utilities();

    $phanTramTheoThangThue = 0;
    $listPhanTramThueTheoThang = get_phan_tram_theo_thang_thue();
    switch ($baoGia['thoi_gian_thue']) {
        case 1:
            $phanTramTheoThangThue = $listPhanTramThueTheoThang[1];
            break;
        case 2:
            $phanTramTheoThangThue = $listPhanTramThueTheoThang[2];
            break;
        default;
    }
    //Thông tin vận thăng
    $baoGia['kieu_van_thang'] = $ttvt['kieu_van_thang'];
    $baoGia['cong_suat_bien_tan'] = $ttvt['cong_suat_bien_tan'];
    $baoGia['tai_trong'] = $ttvt['tai_trong'];

    if ($baoGia['bien_tan'] === 'Có') {
        $baoGia['show_bien_tan'] = 'grid';
        $baoGia['dong_co'] = $ttvt['dong_co_bien_tan'];
    } else {
        $baoGia['show_bien_tan'] = 'none';
        $baoGia['dong_co'] = $ttvt['dong_co_ko_bien_tan'];
    }
    //-------------------------------------------------------------
    //Cửa tầng
    $baoGia['van_chuyen_den'] = $cuaTang['van_chuyen_den'];
    $baoGia['van_chuyen_ve'] = $cuaTang['van_chuyen_ve'];
    $baoGia['lap_dat_ct'] = $cuaTang['lap_dat'];
    $baoGia['thao_do_ct'] = $cuaTang['thao_do'];
    $baoGia['don_gia_cua_tang'] = $cuaTang['don_gia'];
    //-------------------------------------------------------------

    $temp = array();

    $temp['don_gia'] = convert_to_number($donGiaThue['don_gia']);
    $temp['don_gia_thue_1_thang'] = $temp['don_gia'] + $temp['don_gia'] * $phanTramTheoThangThue * 0.01;
    $temp['don_gia_thue_x_thang'] = $temp['don_gia_thue_1_thang'] * $baoGia['thoi_gian_thue'];

    $temp['lap_dat'] = convert_to_number($donGiaThue['lap_dat']);
    $temp['van_chuyen'] = convert_to_number($donGiaThue['van_chuyen']);

    if ($baoGia['vi_tri'] != 'Tp Hồ Chí Minh') {
        $temp['lap_dat'] *= $caiDatChung['ty_so_ngoai_tp'];
        $temp['van_chuyen'] *= $caiDatChung['ty_so_ngoai_tp'];
    }

    $temp['tong_lap_dat'] = $temp['lap_dat'] * $baoGia['so_luong'];
    $temp['tong_van_chuyen'] = $temp['van_chuyen'] * $baoGia['so_luong'];


    $temp['kiem_dinh'] = convert_to_number($caiDatChung['kiem_dinh']);

    $temp['van_hanh_1_thang'] = convert_to_number($caiDatChung['van_hanh']);
    $temp['bao_tri_1_thang'] = convert_to_number($caiDatChung['bao_tri']);
    if ($baoGia['so_long'] == 2) {
        $temp['van_hanh_1_thang'] *= 2;
        $temp['bao_tri_1_thang'] *= 2;
    }

    $temp['tong_kiem_dinh'] = $temp['kiem_dinh'] * $baoGia['so_luong'];

    $temp['van_hanh_x_thang'] = $temp['van_hanh_1_thang'] * $baoGia['thoi_gian_thue'];
    $temp['bao_tri_x_thang'] = $temp['bao_tri_1_thang'] * $baoGia['thoi_gian_thue'];

    // Chi phí 1 tháng = Đơn giá + Vận hành + Bảo trì
    $temp['chi_phi_thue_1_thang'] = $temp['don_gia_thue_1_thang'] + $temp['van_hanh_1_thang'] + $temp['bao_tri_1_thang'];
    $temp['chi_phi_thue_x_thang'] = $temp['chi_phi_thue_1_thang'] * $baoGia['thoi_gian_thue'];

    //Chi phí một lần (A+B)
    $temp['chi_phi_mot_lan'] = $temp['tong_van_chuyen'] * 2 + $temp['tong_lap_dat'] * 2 + $temp['tong_kiem_dinh'];

    // Tổng 1 bộ trước thuế
    $temp['gia_tri_thuc_hien'] = $temp['chi_phi_mot_lan'] + $temp['chi_phi_thue_x_thang'];

    // VAT
    $temp['vat'] = $temp['gia_tri_thuc_hien'] * 0.1;

    // Tổng 1 bộ sau thuế
    $temp['tong_cong_1_bo_sau_thue'] = $temp['gia_tri_thuc_hien'] + $temp['vat'];

    // Cọc 1
    $temp['coc_1'] = $temp['don_gia_thue_1_thang'] * 2 * $baoGia['so_luong'];
    $baoGia['coc_1_bang_chu'] = $uti->convert_number_to_words($temp['coc_1']);

    // Cọc 2
    $temp['coc_2'] = $temp['chi_phi_mot_lan'] * $baoGia['so_luong'] * 1.1;
    $baoGia['coc_2_bang_chu'] = $uti->convert_number_to_words($temp['coc_2']);

    if ($baoGia['so_luong'] > 1) {
        $temp['tong_cong_x_bo_sau_thue'] = $temp['tong_cong_1_bo_sau_thue'] * $baoGia['so_luong'];
        $baoGia['show_last_row'] = 'block';
        $baoGia['don_gia_bang_chu'] = $uti->convert_number_to_words($temp['tong_cong_x_bo_sau_thue']);
    } else {
        $baoGia['don_gia_bang_chu'] = $uti->convert_number_to_words($temp['tong_cong_1_bo_sau_thue']);
    }

    // Ngày lập bảng
    $date = getdate(date("U"));
    $baoGia['ngay_bao_gia'] = $ngay_thang = "Ngày $date[mday] tháng $date[mon] năm $date[year]";

    foreach ($temp as $key => $value) {
        $baoGia[$key] = number_format($value);
    }

    return $baoGia;
}

function get_don_gia_thue_vtl($baoGia) {
    $list_VTL = array(
        '1 lồng' => array(
            '1 tấn' => '1L1T',
            '2 tấn' => '1L2T'
        ),
        '2 lồng' => array(
            '1 tấn' => '2L1T',
            '2 tấn' => '2L2T'
        )
    );
    $loai_vtl = $list_VTL[$baoGia['so_long']][$baoGia['tl_long']];

    if (!$loai_vtl) {
        return null;
    }

    $run_dynamic_function = "get_don_gia_thue_VTL_" . $loai_vtl . "_trong_TPHCM";
    $don_gia_thue = $run_dynamic_function();

    return $don_gia_thue;
}

// Tính số khung của VTL
function get_so_khung($chieu_cao, $isRound = false) {
    return $isRound ? ceil($chieu_cao / 1.5) : (ceil($chieu_cao / 1.5) - 2);
}

// Tính số giằng của VTL
function get_so_thanh_giang($chieu_cao) {
    return ceil($chieu_cao / 8.0);
}

// Tính mua vận thăng hàng
function calculate_data_for_mua_VTH($baoGia) {
    $uti = new Utilities();
    $donGiaMua = $baoGia['tl_vt_hang'] == '500 kg' ? get_don_gia_mua_VTH_500kg($baoGia) : get_don_gia_mua_VTH_1000kg($baoGia);

    $gia_tri_sp = get_gia_tri_san_pham($baoGia);

    $don_gia_bang_so = convert_to_number($donGiaMua['don_gia']) * $gia_tri_sp;

    //Giá trị sản phẩm
    $baoGia['phan_tram_gia_tri'] = get_gia_tri_san_pham_cu();
    
    //Đơn giá cho 1 bộ
    $baoGia['don_gia_1_bo'] = number_format($don_gia_bang_so);

    // Đơn giá cho x bộ
    $baoGia['don_gia_x_bo'] = number_format($don_gia_bang_so * $baoGia['so_luong']);

    // Khung vận thăng
    $baoGia['khung_van_thang'] = number_format($donGiaMua['khung_van_thang'] * $baoGia['so_luong']);

    // Thanh giằng
    $baoGia['thanh_giang'] = number_format($donGiaMua['thanh_giang'] * $baoGia['so_luong']);

    $lapDatVaKiemDinh = get_chi_phi_lap_dat_va_kiem_dinh();
    // Chi phí lắp đặt
    $baoGia['lap_dat'] = $lapDatVaKiemDinh['lap_dat'];

    // Chi phí kiểm định
    $baoGia['kiem_dinh'] = $lapDatVaKiemDinh['kiem_dinh'];

    //Tổng chi phí lắp đặt
    $baoGia['tong_lap_dat'] = number_format($baoGia['so_luong'] * convert_to_number($baoGia['lap_dat']));

    //Tổng chi phí kiểm định
    $baoGia['tong_kiem_dinh'] = number_format($baoGia['so_luong'] * convert_to_number($baoGia['kiem_dinh']));


    // Chi phí lắp đặt kiểm định (B)
    $baoGia['chi_phi_lap_dat_kiem_dinh'] = number_format(convert_to_number($baoGia['tong_lap_dat']) + convert_to_number($baoGia['tong_kiem_dinh']));

    // Giá trị thực hiện (A+B)
    $baoGia['gia_tri_thuc_hien'] = number_format(convert_to_number($baoGia['don_gia_x_bo']) + convert_to_number($baoGia['chi_phi_lap_dat_kiem_dinh']));

    // VAT (10%) gía trị thực hiện
    $baoGia['vat'] = number_format(convert_to_number($baoGia['gia_tri_thuc_hien']) * 0.1);

    // Tổng cộng sau thuế bằng số
    $baoGia['tong_cong_sau_thue'] = number_format(convert_to_number($baoGia['vat']) + convert_to_number($baoGia['gia_tri_thuc_hien']));

    // Tổng cộng sau thuế bằng chữ
    $baoGia['tong_cong_sau_thue_bang_chu'] = $uti->convert_number_to_words(convert_to_number($baoGia['tong_cong_sau_thue']));

    // Giá trị đặt cọc (50% tổng đơn giá sau thuế)
    $baoGia['dat_coc1'] = number_format(convert_to_number($baoGia['tong_cong_sau_thue']) * 0.5);

    // Nhân đôi
    $baoGia['so_luongx2'] = $baoGia['so_luong'] * 2;

    // Ngày lập bảng
    $date = getdate(date("U"));
    $baoGia['ngay_bao_gia'] = $ngay_thang = "Ngày $date[mday] tháng $date[mon] năm $date[year]";

    return $baoGia;
}

// Tính thuê vận thăng hàng
function calculate_data_for_thue_VTH($baoGia) {
    $uti = new Utilities();
    $additionaInfo = $baoGia['tl_vt_hang'] == '500 kg' ? get_additional_info_for_VTH_500kg() : get_additional_info_for_VTH_1000kg();

    // Đơn giá - Lắp đặt/tháo dỡ - vận chuyển
    $donGiaThue = $baoGia['tl_vt_hang'] == '500 kg' ? get_don_gia_thue_VTH_500kg($baoGia) : get_don_gia_thue_VTH_1000kg($baoGia);
    $listPhanTramThueTheoThang = get_phan_tram_theo_thang_thue();
    $phanTramThue = 0;
    switch ($baoGia['thoi_gian_thue']) {
        case 1:
            $phanTramThue = $listPhanTramThueTheoThang[1];
            break;
        case 2:
            $phanTramThue = $listPhanTramThueTheoThang[2];
            break;
        default;
    }

    // Chi phí bảo trì
    $baoGia['bao_tri_1_thang'] = $additionaInfo['bao_tri'];

    // Chi phí bảo trì x tháng
    $baoGia['bao_tri_x_thang'] = number_format(convert_to_number($baoGia['bao_tri_1_thang']) * ($baoGia['thoi_gian_thue']));

    // Chi phí kiểm định
    $baoGia['kiem_dinh_12thang'] = $additionaInfo['kiem_dinh_12thang'];

    // Đơn giá thuê 1 tháng
    $donGiaThueNumber = convert_to_number($donGiaThue['don_gia']);
    $donGiaLamTron = ceil(($donGiaThueNumber + $donGiaThueNumber * $phanTramThue * 0.01) / 1000000) * 1000000;
    $baoGia['don_gia_thue_1_thang'] = number_format($donGiaLamTron);

    // Đơn giá thuê x tháng
    $baoGia['don_gia_thue_x_thang'] = number_format(convert_to_number($baoGia['don_gia_thue_1_thang']) * $baoGia['thoi_gian_thue']);

    // Lắp đặt
    $baoGia['lap_dat'] = $donGiaThue['lap_dat'];

    // Vận chuyển
    $baoGia['van_chuyen'] = $donGiaThue['van_chuyen'];

    // Chi phí thuê 1 tháng
    $baoGia['chi_phi_thue_1_thang'] = number_format(convert_to_number($baoGia['bao_tri_1_thang']) + convert_to_number($baoGia['don_gia_thue_1_thang']));

    // Chi phí thuê x tháng (A)
    $baoGia['chi_phi_thue_x_thang'] = number_format(convert_to_number($baoGia['chi_phi_thue_1_thang']) * $baoGia['thoi_gian_thue']);

    // Chi phí một lần (Vận chuyển x2 + lắp đặt x2 + kiểm đinh) | (B)
    $baoGia['chi_phi_mot_lan'] = number_format(convert_to_number($baoGia['van_chuyen']) * 2 + convert_to_number($baoGia['lap_dat']) * 2 + convert_to_number($baoGia['kiem_dinh_12thang']));

    // Đặt cọc
    $baoGia['dat_coc1'] = number_format(convert_to_number($baoGia['chi_phi_thue_1_thang']) * $baoGia['so_luong'] * 2);
    $baoGia['dat_coc2'] = number_format(convert_to_number($baoGia['chi_phi_mot_lan']) * $baoGia['so_luong'] * 1.1);
    $baoGia['dat_coc2_bang_chu'] = $uti->convert_number_to_words(convert_to_number($baoGia['dat_coc2']));

    // Giá trị thực hiện (A+B)
    $baoGia['gia_tri_thuc_hien'] = number_format(convert_to_number($baoGia['chi_phi_thue_x_thang']) + convert_to_number($baoGia['chi_phi_mot_lan']));

    // VAT
    $baoGia['vat'] = number_format(convert_to_number($baoGia['gia_tri_thuc_hien']) * 0.1);

    // Tổng 1 bộ sau thuế
    $baoGia['tong_cong_1_bo_sau_thue'] = number_format(convert_to_number($baoGia['gia_tri_thuc_hien']) + convert_to_number($baoGia['vat']));
    $baoGia['show_last_row'] = 'none';

    // Tổng x bộ sau thuế
    if ($baoGia['so_luong'] > 1) {
        $baoGia['tong_cong_x_bo_sau_thue'] = number_format(convert_to_number($baoGia['tong_cong_1_bo_sau_thue']) * $baoGia['so_luong']);
        $baoGia['show_last_row'] = 'block';
        $baoGia['don_gia_bang_chu'] = $uti->convert_number_to_words(convert_to_number($baoGia['tong_cong_x_bo_sau_thue']));
    } else {
        $baoGia['don_gia_bang_chu'] = $uti->convert_number_to_words(convert_to_number($baoGia['tong_cong_1_bo_sau_thue']));
    }

    $baoGia['so_luong'] = $baoGia['so_luong'] < 10 ? "0" . $baoGia['so_luong'] : $baoGia['so_luong'];
    // Ngày lập bảng
    $date = getdate(date("U"));
    $baoGia['ngay_bao_gia'] = $ngay_thang = "Ngày $date[mday] tháng $date[mon] năm $date[year]";
    return $baoGia;
}

function get_don_gia_thue_VTH_500kg($baoGia) {
    $listDonGia = $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? get_gia_thue_VTH500kg_trong_TPHCM() : get_gia_thue_VTH500kg_ngoai_TPHCM();
    return $listDonGia[$baoGia['chieu_cao']];
}

function get_don_gia_thue_VTH_1000kg($baoGia) {
    $listDonGia = $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? get_gia_thue_VTH1000kg_trong_TPHCM() : get_gia_thue_VTH1000kg_ngoai_TPHCM();
    return $listDonGia[$baoGia['chieu_cao']];
}

function get_don_gia_mua_VTH_500kg($baoGia) {
    $listDonGia = $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? get_gia_ban_VTH500kg_trong_TPHCM() : get_gia_ban_VTH500kg_ngoai_TPHCM();
    return $listDonGia[$baoGia['chieu_cao']];
}

function get_don_gia_mua_VTH_1000kg($baoGia) {
    $listDonGia = $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? get_gia_ban_VTH1000kg_trong_TPHCM() : get_gia_ban_VTH1000kg_ngoai_TPHCM();
    return $listDonGia[$baoGia['chieu_cao']];
}

function calculate_data_for_gian_giao($baoGia) {
    $uti = new Utilities();
    $formGianGiao = get_gian_giao_form_data();
    $gia_tri_sp = get_gia_tri_san_pham($baoGia);

    foreach ($baoGia as $key => $value) {
        // so_luong2 , so_luong3
        if (substr($key, 0, 8) === 'so_luong' && strlen($key) > 8 && $baoGia[$key] > 0) {
            // $form_giao_giao[so_luong2]
            if ($formGianGiao[$key]) {
                $index = substr($key, 8);
                $don_gia_bang_so = convert_to_number($formGianGiao[$key]['don_gia']) * $gia_tri_sp;
                $baoGia['trong_luong' . $index] = $formGianGiao[$key]['trong_luong'];
                $baoGia['tong_trong_luong' . $index] = round_big_number($formGianGiao[$key]['trong_luong'] * $value);
                $baoGia['don_gia' . $index] = number_format($don_gia_bang_so);
                $baoGia['don_gia_thue' . $index] = $formGianGiao[$key]['don_gia_thue'];
                $baoGia['tong_don_gia' . $index] = number_format($don_gia_bang_so * $value);
                $baoGia['thanh_tien_thue' . $index] = number_format(convert_to_number($formGianGiao[$key]['don_gia_thue']) * $value);
            }
        }
    }

    // Tổng trọng lượng
    $baoGia['tong_trong_luong'] = round(get_total_weight($baoGia));

    //Đơn giá vận chuyển trên kg
    $baoGia['don_gia_van_chuyen'] = get_phi_van_chuyen_gian_giao($baoGia);

    // Phí vận chuyển
    $baoGia['phi_van_chuyen'] = number_format($baoGia['don_gia_van_chuyen'] * 2 * $baoGia['tong_trong_luong']);

    // Tổng đơn giá thiết bị
    $baoGia['tong_don_gia_thiet_bi'] = number_format(get_total_price_berfore_tax($baoGia));

    // Tổng đơn giá trước thuế
    $baoGia['tong_don_gia_truoc_thue'] = number_format(convert_to_number($baoGia['tong_don_gia_thiet_bi']) + convert_to_number($baoGia['phi_van_chuyen']));

    // VAT
    $baoGia['vat'] = number_format(convert_to_number($baoGia['tong_don_gia_truoc_thue']) * 0.1);

    //Tổng đơn giá sau thuế
    $baoGia['tong_don_gia_sau_thue'] = number_format(convert_to_number($baoGia['tong_don_gia_truoc_thue']) + convert_to_number($baoGia['vat']));

    if ($baoGia['hinh_thuc'] == 'Thuê') {
        // Tổng đơn giá thuê thiết bị
        $baoGia['tong_don_gia_thue_thiet_bi'] = number_format(get_borrow_total_price_before_tax($baoGia));

        // Tiền thuê tạm tính
        $baoGia['tien_thue_tam_tinh'] = convert_to_number($baoGia['tong_don_gia_thue_thiet_bi']);

        // Tiền thuê tạm tính cho 1 tháng
        $baoGia['tien_thue_tam_tinh_30ngay'] = number_format($baoGia['tien_thue_tam_tinh'] * $baoGia['thoi_gian_thue'] * 30);

        // Tổng đơn giá thuê trước thuế
        $baoGia['tong_don_gia_thue_truoc_thue'] = number_format(convert_to_number($baoGia['tien_thue_tam_tinh_30ngay']) + convert_to_number($baoGia['phi_van_chuyen']));

        // VAT tổng giá thuê
        $baoGia['vat_thue'] = number_format(convert_to_number($baoGia['tong_don_gia_thue_truoc_thue']) * 0.1);

        // Tổng đơn giá thuê sau thuế
        $baoGia['tong_don_gia_thue_sau_thue'] = number_format(convert_to_number($baoGia['vat_thue']) + convert_to_number($baoGia['tong_don_gia_thue_truoc_thue']));

        $baoGia['tong_don_gia_bang_chu'] = $uti->convert_number_to_words(convert_to_number($baoGia['tong_don_gia_thue_sau_thue']));
    } else {
        $baoGia['tong_don_gia_bang_chu'] = $uti->convert_number_to_words(convert_to_number($baoGia['tong_don_gia_sau_thue']));
    }

    // Ngày báo giá
    $date = getdate(date("U"));
    $baoGia['ngay_bao_gia'] = $ngay_thang = "Ngày $date[mday] tháng $date[mon] năm $date[year]";

    return $baoGia;
}

// Get total pay before tax
function get_total_price_berfore_tax($data) {
    $total = 0;
    foreach ($data as $key => $value) {
        if (substr($key, 0, 12) === 'tong_don_gia' && strlen($key) > 12) {
            $total += convert_to_number($value);
        }
    }
    return $total;
}

// Get total pay before tax
function get_borrow_total_price_before_tax($data) {
    $total = 0;
    foreach ($data as $key => $value) {
        if (substr($key, 0, 15) === 'thanh_tien_thue' && strlen($key) > 15) {
            $total += convert_to_number($value);
        }
    }
    return $total;
}

// Get total weight
//*
//INPUT @array
//OUTPUT @float
//*/

function round_big_number($number){
    if($number > 999){
        return round($number);
    }
    
    return $number;
}

function get_total_weight($data) {
    $totalWeight = 0;
    foreach ($data as $key => $value) {
        if (substr($key, 0, 16) === 'tong_trong_luong' && strlen($key) > 16) {
            $totalWeight += $value;
        }
    }
    return $totalWeight;
}

function get_additional_info_for_VTH_500kg() {
    return run_executor($key, __FUNCTION__);
}

function get_additional_info_for_VTH_1000kg() {
    return run_executor($key, __FUNCTION__);
}

// Gian giao data structure
function get_gian_giao_form_data() {
    $key = GIAN_GIAO;
    return run_executor($key, __FUNCTION__);
}

function get_cities() {
    $key = THANH_PHO;
    return run_executor($key, __FUNCTION__);
}

function get_gia_ban_VTH500kg_trong_TPHCM() {
    $key = BAN_VTH_500KG_TRONG_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_gia_ban_VTH500kg_ngoai_TPHCM() {
    $key = BAN_VTH_500KG_NGOAI_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_gia_ban_VTH1000kg_trong_TPHCM() {
    $key = BAN_VTH_1000KG_TRONG_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_gia_ban_VTH1000kg_ngoai_TPHCM() {
    $key = BAN_VTH_1000KG_NGOAI_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_gia_thue_VTH500kg_trong_TPHCM() {
    $key = THUE_VTH_500KG_TRONG_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_gia_thue_VTH500kg_ngoai_TPHCM() {
    $key = THUE_VTH_500KG_NGOAI_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_phan_tram_theo_thang_thue() {
    $key = PHAN_TRAM_THEO_THANG_THUE;
    return run_executor($key, __FUNCTION__);
}

function get_don_gia_thue_VTL_1L1T_trong_TPHCM() {
    $key = DON_GIA_THUE_VTL_1L1T_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_don_gia_thue_VTL_1L2T_trong_TPHCM() {
    $key = DON_GIA_THUE_VTL_1L2T_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_don_gia_thue_VTL_2L1T_trong_TPHCM() {
    $key = DON_GIA_THUE_VTL_2L1T_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_don_gia_thue_VTL_2L2T_trong_TPHCM() {
    $key = DON_GIA_THUE_VTL_2L2T_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_don_gia_mua_VTL() {
    $key = DON_GIA_MUA_VTL;
    return run_executor($key, __FUNCTION__);
}

function get_phi_van_chuyen_gian_giao($baoGia) {
    $key = PHI_VAN_CHUYEN_GIAN_GIAO;
    $phi_van_chuyen = run_executor($key, __FUNCTION__);

    // For updating setting page
    if (!$baoGia) {
        return $phi_van_chuyen;
    }

    // For calculation purposes
    return $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? $phi_van_chuyen['trong_tp_hcm'] : $phi_van_chuyen['ngoai_tp_hcm'];
}

function get_gia_thue_VTH1000kg_trong_TPHCM() {
    $key = THUE_VTH_1000KG_TRONG_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_gia_thue_VTH1000kg_ngoai_TPHCM() {
    $key = THUE_VTH_1000KG_NGOAI_TPHCM;
    return run_executor($key, __FUNCTION__);
}

function get_chi_phi_lap_dat_va_kiem_dinh() {
    $key = ADDITIONAL_INFO_MUA_VTH;
    return run_executor($key, __FUNCTION__);
}

function get_gia_tri_san_pham($baoGia) {
    return $baoGia['tt_sp'] === 'Cũ' ? get_gia_tri_san_pham_cu() / 100 : 1;
}

function get_gia_tri_san_pham_cu() {
    $key = GIA_TRI_SAN_PHAM_CU;
    return run_executor($key, __FUNCTION__);
}

// Lấy giá biến tần mua/thuê
function get_gia_bien_tan($hinh_thuc) {
    $key = GIA_BIEN_TAN;
    $data = run_executor($key, __FUNCTION__);
    return $hinh_thuc === 'Mua' ? $data['mua'] : $data['thue'];
}

function get_thue_VTL_cai_dat_chung() {
    $key = THUE_VTL_CAI_DAT_CHUNG;
    return run_executor($key, __FUNCTION__);
}

function get_mua_VTL_cai_dat_chung() {
    $key = MUA_VTL_CAI_DAT_CHUNG;
    return run_executor($key, __FUNCTION__);
}

function run_executor($key, $fnc_name) {
    $stores = new Stores();
    $result = query_settings($key);
    return $result ? $result : $stores->$fnc_name();
}

function query_settings($setting_key) {
    global $wpdb;

    if ($setting_key) {
        $query = 'SELECT setting_value FROM ' . $wpdb->prefix . 'baogia_settings WHERE setting_key="' . $setting_key . '" AND is_deleted = FALSE';

        $result = $wpdb->get_row($query, ARRAY_A);
        return $result ? json_decode($result['setting_value'], true) : '';
    }
    return '';
}
