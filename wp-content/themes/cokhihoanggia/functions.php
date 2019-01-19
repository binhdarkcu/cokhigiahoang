<?php

require_once( __DIR__ . './utilites/Utilities.php');
require_once( __DIR__ . './utilites/Stores.php');
require_once( __DIR__ . './utilites/BaoGiaValidator.php');
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
add_action('wp_ajax_nopriv_tinh_don_gia', 'tinh_don_gia');
add_action('wp_ajax_tinh_don_gia', 'tinh_don_gia');
add_action('wp_ajax_get_list_bao_gia', 'danh_sach_bao_gia');
add_action('wp_ajax_cap_nhat_trang_thai', 'cap_nhat_trang_thai');
add_action('wp_ajax_update_setting', 'update_setting');

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
    wp_localize_script('main_js', 'globalConfig', array('admin_ajax_url' => admin_url('admin-ajax.php')));
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
    
//    if(!empty($error['message'])){
//        $result['message'] = $error['message'];
//        echo json_encode($result);
//        // Don't forget to stop execution afterward.
//        wp_die();
//    }
    
    //Lấy thông tin người báo giá
    //Validate dữ liệu đầu vào
    $ho_ten = $bao_gia['ho_ten'];
    $sdt = $bao_gia['so_dt'];
    $email = $bao_gia['email'];
    $cty = $bao_gia['cty'];
    $trang_thai = 'Đã báo giá';
    $chi_tiet = json_encode($bao_gia, JSON_UNESCAPED_UNICODE);
    $ngay_tao = $ngay_cap_nhat = current_time('Y-m-d h:i:s');

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

    $query = "INSERT INTO " . $wpdb->prefix . "bao_gia
                                		(full_name, phone_number, email, company, status, order_detail, created_date, updated_date, is_deleted)
                                                         VALUES ('$ho_ten','$sdt','$email','$cty','$trang_thai','$chi_tiet','$ngay_tao','$ngay_cap_nhat', 0)";

    $wpdb->query($query);


    if (send_email_to_customer($bao_gia)) {
        $status = 'SUCCESS';
    }else{
        $message = 'Không thể gửi email!';
    }

 

    echo json_encode($result);
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

    return wp_mail($to, $subject, $body, $headers);
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
    $id = $_POST['id'];
    $action = $_POST['action_type'];
    $status = $_POST['status'];

    $response = array(
        'data' => 'null',
        'id' => $id,
        'action' => $action,
        's' => $status,
        'status' => 'ACTION_DENIED'
    );

    if (is_admin() && $id) {
        $query = '';
        if ($action == 'delete') {
            $query = "UPDATE " . $wpdb->prefix . "bao_gia SET is_deleted=1 WHERE id=" . $id;
        } else if ($action == 'update' && $status) {
            $query = "UPDATE " . $wpdb->prefix . "bao_gia SET status = '" . $status . "' WHERE id=" . $id;
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
//    $baoGia['thoi_gian_thue'] = 1;
//    $baoGia['so_luong'] = 2;
//    $baoGia['vi_tri'] = 'Tiền Giang';
//    $baoGia['chieu_cao'] = 60;
    switch ($baoGia['loai_vt']) {
        case 'Vận thăng hàng':
            $baoGia = $baoGia['hinh_thuc'] == 'Thuê' ? calculate_data_for_thue_VTH($baoGia) : calculate_data_for_mua_VTH($baoGia);
            break;
        case 'Vận thăng lồng':
            $baoGia = calculateDataForVTL($baoGia);
            break;
        default;
    }
    return $baoGia;
}

// Tính mua vận thăng hàng
function calculate_data_for_mua_VTH($baoGia) {
    $uti = new Utilities();
    $donGiaMua = $baoGia['tl_vt_hang'] == '500 kg' ? get_don_gia_mua_VTH_500kg($baoGia) : get_don_gia_mua_VTH_1000kg($baoGia);

    //Đơn giá cho 1 bộ
    $baoGia['don_gia_1_bo'] = $donGiaMua['don_gia'];

    // Đơn giá cho x bộ
    $baoGia['don_gia_x_bo'] = number_format(convert_to_number($donGiaMua['don_gia']) * $baoGia['so_luong']);

    // Khung vận thăng
    $baoGia['khung_van_thang'] = $donGiaMua['khung_van_thang'];

    // Thanh giằng
    $baoGia['thanh_giang'] = $donGiaMua['thanh_giang'];

    $lapDatVaKiemDinh = get_chi_phi_lap_dat_va_kiem_dinh();
    // Chi phí lắp đặt
    $baoGia['lap_dat'] = $lapDatVaKiemDinh['lap_dat'];

    // Chi phí kiểm định
    $baoGia['kiem_dinh'] = $lapDatVaKiemDinh['kiem_dinh'];

    // Chi phí lắp đặt kiểm định (B)
    $baoGia['chi_phi_lap_dat_kiem_dinh'] = number_format(convert_to_number($baoGia['lap_dat']) + convert_to_number($baoGia['kiem_dinh']));

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
    foreach ($baoGia as $key => $value) {
        // so_luong2 , so_luong3
        if (substr($key, 0, 8) === 'so_luong' && strlen($key) > 8 && $baoGia[$key] > 0) {
            // $form_giao_giao[so_luong2]
            if ($formGianGiao[$key]) {
                $index = substr($key, 8);
                $baoGia['trong_luong' . $index] = $formGianGiao[$key]['trong_luong'];
                $baoGia['tong_trong_luong' . $index] = $formGianGiao[$key]['trong_luong'] * $value;
                $baoGia['don_gia' . $index] = $formGianGiao[$key]['don_gia'];
                $baoGia['don_gia_thue' . $index] = $formGianGiao[$key]['don_gia_thue'];
                $baoGia['tong_don_gia' . $index] = number_format(convert_to_number($formGianGiao[$key]['don_gia']) * $value);
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
    $stores = new Stores();
    $key = ADDITIONAL_INFO_MUA_VTH_500KG;
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_additional_info_for_VTH_500kg();
}

function get_additional_info_for_VTH_1000kg() {
    $stores = new Stores();
    $key = ADDITIONAL_INFO_MUA_VTH_1000KG;
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_additional_info_for_VTH_1000kg();
}

// Gian giao data structure
function get_gian_giao_form_data() {
    $key = GIAN_GIAO;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_gian_giao_form_data();
}

function get_cities() {
    $key = THANH_PHO;
    $stores = new Stores();

    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_cities();
}

function get_gia_ban_VTH500kg_trong_TPHCM() {
    $key = BAN_VTH_500KG_TRONG_TPHCM;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_gia_ban_VTH500kg_trong_TPHCM();
}

function get_gia_ban_VTH500kg_ngoai_TPHCM() {
    $key = BAN_VTH_500KG_NGOAI_TPHCM;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_gia_ban_VTH500kg_ngoai_TPHCM();
}

function get_gia_ban_VTH1000kg_trong_TPHCM() {
    $key = BAN_VTH_1000KG_TRONG_TPHCM;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_gia_ban_VTH1000kg_trong_TPHCM();
}

function get_gia_ban_VTH1000kg_ngoai_TPHCM() {
    $key = BAN_VTH_1000KG_NGOAI_TPHCM;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_gia_ban_VTH1000kg_ngoai_TPHCM();
}

function get_gia_thue_VTH500kg_trong_TPHCM() {
    $key = THUE_VTH_500KG_TRONG_TPHCM;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_gia_thue_VTH500kg_trong_TPHCM();
}

function get_gia_thue_VTH500kg_ngoai_TPHCM() {
    $key = THUE_VTH_500KG_NGOAI_TPHCM;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_gia_thue_VTH500kg_ngoai_TPHCM();
}

function get_phan_tram_theo_thang_thue() {
    $key = PHAN_TRAM_THEO_THANG_THUE;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_phan_tram_theo_thang_thue();
}

function get_phi_van_chuyen_gian_giao($baoGia) {
    $key = PHI_VAN_CHUYEN_GIAN_GIAO;
    $stores = new Stores();
    $result = query_settings($key);
    $phi_van_chuyen = $result ? $result : $stores->get_phi_van_chuyen_gian_giao();

    // For updating setting page
    if(!$baoGia){
        return $phi_van_chuyen;
    }
    
    // For calculation purposes
    return $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? $phi_van_chuyen['trong_tp_hcm'] : $phi_van_chuyen['ngoai_tp_hcm'];
}

function get_gia_thue_VTH1000kg_trong_TPHCM() {
    $key = THUE_VTH_1000KG_TRONG_TPHCM;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_gia_thue_VTH1000kg_trong_TPHCM();
}

function get_gia_thue_VTH1000kg_ngoai_TPHCM() {
    $key = THUE_VTH_1000KG_NGOAI_TPHCM;
    $stores = new Stores();
    $result = query_settings($key);

    if ($result) {
        return $result;
    }
    return $stores->get_gia_thue_VTH1000kg_ngoai_TPHCM();
}

function get_chi_phi_lap_dat_va_kiem_dinh() {
    $key = ADDITIONAL_INFO_MUA_VTH;
    $stores = new Stores();
    $result = query_settings($key);
    if ($result) {
        return $result;
    }
    return $stores->get_chi_phi_lap_dat_va_kiem_dinh();
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
