<?php
require_once( __DIR__ . './utilites/Utilities.php');
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

$file = get_template_directory().'/assets/logo_email.png'; //phpmailer will load this file
$uid = 'logo'; //will map it to this UID
$name = 'logo.png'; //this will be the file name for the attachment

global $phpmailer;
add_action( 'phpmailer_init', function(&$phpmailer)use($file,$uid,$name){
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
    $json_data = $_POST['json'];

    if (version_compare($wp_version, '5.0', '<')) {

        $json = wp_unslash($json_data);
    } else {

        $json = $json_data;
    }

    $status = 'ERROR';
    $bao_gia = json_decode($json, true);

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
            $chi_tiet = json_encode(calculateDataForGianGiao($bao_gia), JSON_UNESCAPED_UNICODE);
            break;
        default:
            break;
    }

    $query = "INSERT INTO " . $wpdb->prefix . "bao_gia
                                		(full_name, phone_number, email, company, status, order_detail, created_date, updated_date, is_deleted)
                                                         VALUES ('$ho_ten','$sdt','$email','$cty','$trang_thai','$chi_tiet','$ngay_tao','$ngay_cap_nhat', 0)";

    $wpdb->query($query);


    if(sendEmailToCustomer($bao_gia)){
        $status = 'OK';
    }

    $result = array(
        'message' => '',
        'status' => $status
    );

    echo json_encode($result);
    // Don't forget to stop execution afterward.
    wp_die();
}

function sendEmailToCustomer($bao_gia){
    $fields = array('ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp','so_luong', 'loai_vt', 'tl_vt_hang', 'so_long', 'tl_long', 'chieu_cao', 'bien_tan', 'vi_tri', 'vi_tri2', 'ngay_can_hang', 'thoi_gian_thue');

    $available_fields = array();

    foreach ($bao_gia as $key => $value){
        if(in_array($key, $fields)){
            $available_fields[$key] = $value;
        }
    }

    $template_path = get_template_directory().'/template-parts/emailing/email-customer.html';
    $template = file_get_contents($template_path);


    $chi_tiet = '';
    foreach ($available_fields as $key => $value){
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

    return wp_mail( $to, $subject, $body, $headers );
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

function update_setting(){
    
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
        
        if($rows){
            $query = "UPDATE " . $wpdb->prefix . "baogia_settings SET setting_value = '$encoded_value', updated_date = '$updated_date' WHERE setting_key = '$key'";
        }else{
            $query = "INSERT INTO " . $wpdb->prefix . "baogia_settings (setting_key, setting_value, created_date, updated_date) VALUES ('$key','$encoded_value', '$created_date', '$updated_date')";
        }
        
        $wpdb->query($query);
        
        $result['status'] = 'OK';
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    wp_die();
}

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

    switch($baoGia['loai_sp']){
        case 'Giào giáo':
            $baoGia = calculateDataForGianGiao($baoGia);
            break;
        case 'Vận thăng':
            $baoGia = calculateDataForVanThang($baoGia);
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
function convertToNumber($string) {
    return (int) str_replace(',', '', $string);
}

function calculateDataForVanThang($baoGia){
//    $baoGia['thoi_gian_thue'] = 1;
//    $baoGia['so_luong'] = 2;
//    $baoGia['vi_tri'] = 'Tiền Giang';
//    $baoGia['chieu_cao'] = 60;
    switch($baoGia['loai_vt']){
        case 'Vận thăng hàng':
            $baoGia = $baoGia['hinh_thu'] == 'Thuê' ? calculateDataForThueVTH($baoGia) : calculateDataForMuaVTH($baoGia);
            break;
        case 'Vận thăng lồng':
            $baoGia = calculateDataForVTL($baoGia);
            break;
        default;
    }
    return $baoGia;
}

function calculateDataForMuaVTH($baoGia){
    $uti = new Utilities();
    $donGiaMua = $baoGia['tl_vt_hang'] == '500 kg' ? getDonGiaMuaVTH500kg($baoGia) : getDonGiaMuaVTH1000kg($baoGia);
    
    //Đơn giá cho 1 bộ
    $baoGia['don_gia_1_bo'] = $donGiaMua['don_gia'];
    
    // Đơn giá cho x bộ
    $baoGia['don_gia_x_bo'] = number_format(convertToNumber($donGiaMua['don_gia'])*$baoGia['so_luong']);
    
    // Khung vận thăng
    $baoGia['khung_van_thang'] = $donGiaMua['khung_van_thang'];
    
    // Thanh giằng
    $baoGia['thanh_giang'] = $donGiaMua['thanh_giang'];
    
    $lapDatVaKiemDinh = getChiPhiLapDatVaKiemDinh();
    // Chi phí lắp đặt
    $baoGia['lap_dat'] = $lapDatVaKiemDinh['lap_dat'];
    
    // Chi phí kiểm định
    $baoGia['kiem_dinh'] = $lapDatVaKiemDinh['kiem_dinh'];
    
    // Chi phí lắp đặt kiểm định (B)
    $baoGia['chi_phi_lap_dat_kiem_dinh'] = number_format(convertToNumber($baoGia['lap_dat']) + convertToNumber($baoGia['kiem_dinh']));
    
    // Giá trị thực hiện (A+B)
    $baoGia['gia_tri_thuc_hien'] = number_format(convertToNumber($baoGia['don_gia_x_bo']) + convertToNumber($baoGia['chi_phi_lap_dat_kiem_dinh']));
    
    // VAT (10%) gía trị thực hiện
    $baoGia['vat'] = number_format(convertToNumber($baoGia['gia_tri_thuc_hien'])*0.1);
    
    // Tổng cộng sau thuế bằng số
    $baoGia['tong_cong_sau_thue'] = number_format(convertToNumber($baoGia['vat']) + convertToNumber($baoGia['gia_tri_thuc_hien']));
    
    // Tổng cộng sau thuế bằng chữ
    $baoGia['tong_cong_sau_thue_bang_chu'] = $uti->convert_number_to_words(convertToNumber($baoGia['tong_cong_sau_thue']));
    
    // Giá trị đặt cọc (50% tổng đơn giá sau thuế)
    $baoGia['dat_coc1'] = number_format(convertToNumber($baoGia['tong_cong_sau_thue'])*0.5);
    
    return $baoGia;
}

function getChiPhiLapDatVaKiemDinh(){
    return array(
        'lap_dat' => '5,000,000',
        'kiem_dinh' => '3,000,000'
    );
}

function calculateDataForThueVTH($baoGia){
    $uti = new Utilities();
    $additionaInfo = $baoGia['tl_vt_hang'] == '500 kg' ? getAdditionalInfoForVTH500kg() : getAdditionalInfoForVTH1000kg();
    
    // Đơn giá - Lắp đặt/tháo dỡ - vận chuyển
    $donGiaThue = $baoGia['tl_vt_hang'] == '500 kg' ? getDonGiaThueVTH500kg($baoGia) : getDonGiaThueVTH1000kg($baoGia);
    $listPhanTramThueTheoThang = get_phan_tram_theo_thang_thue();
    $phanTramThue = 0;
    switch($baoGia['thoi_gian_thue']){
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
    $baoGia['bao_tri_x_thang'] = number_format(convertToNumber($baoGia['bao_tri_1_thang'])*($baoGia['thoi_gian_thue']));
    
    // Chi phí kiểm định
    $baoGia['kiem_dinh_12thang'] = $additionaInfo['kiem_dinh_12thang'];
    
    // Đơn giá thuê 1 tháng
    $donGiaThueNumber = convertToNumber($donGiaThue['don_gia']);
    $donGiaLamTron = ceil(($donGiaThueNumber + $donGiaThueNumber*$phanTramThue*0.01)/1000000)*1000000;
    $baoGia['don_gia_thue_1_thang'] = number_format($donGiaLamTron);
    
    // Đơn giá thuê x tháng
    $baoGia['don_gia_thue_x_thang'] = number_format(convertToNumber($baoGia['don_gia_thue_1_thang'])*$baoGia['thoi_gian_thue']);
    
    // Lắp đặt
    $baoGia['lap_dat'] = $donGiaThue['lap_dat'];
    
    // Vận chuyển
    $baoGia['van_chuyen'] = $donGiaThue['van_chuyen'];
    
    // Chi phí thuê 1 tháng
    $baoGia['chi_phi_thue_1_thang'] = number_format(convertToNumber($baoGia['bao_tri_1_thang']) + convertToNumber($baoGia['don_gia_thue_1_thang']));
    
    // Chi phí thuê x tháng (A)
    $baoGia['chi_phi_thue_x_thang'] = number_format(convertToNumber($baoGia['chi_phi_thue_1_thang'])*$baoGia['thoi_gian_thue']);
    
    // Chi phí một lần (Vận chuyển x2 + lắp đặt x2 + kiểm đinh) | (B)
    $baoGia['chi_phi_mot_lan'] = number_format(convertToNumber($baoGia['van_chuyen'])*2 + convertToNumber($baoGia['lap_dat'] )*2 + convertToNumber($baoGia['kiem_dinh_12thang']));
    
    // Đặt cọc
    $baoGia['dat_coc1'] = number_format(convertToNumber($baoGia['chi_phi_thue_1_thang']) * $baoGia['so_luong'] * 2);
    $baoGia['dat_coc2'] = number_format(convertToNumber($baoGia['chi_phi_mot_lan']) * $baoGia['so_luong'] * 1.1);
    $baoGia['dat_coc2_bang_chu'] = $uti->convert_number_to_words(convertToNumber($baoGia['dat_coc2']));
    
    // Giá trị thực hiện (A+B)
    $baoGia['gia_tri_thuc_hien'] = number_format(convertToNumber($baoGia['chi_phi_thue_x_thang']) + convertToNumber($baoGia['chi_phi_mot_lan']));
    
    // VAT
    $baoGia['vat'] = number_format(convertToNumber($baoGia['gia_tri_thuc_hien'])*0.1);
    
    // Tổng 1 bộ sau thuế
    $baoGia['tong_cong_1_bo_sau_thue'] = number_format(convertToNumber($baoGia['gia_tri_thuc_hien']) + convertToNumber($baoGia['vat']));
    $baoGia['show_last_row'] = 'none';
    
    // Tổng x bộ sau thuế
    if($baoGia['so_luong'] > 1){
        $baoGia['tong_cong_x_bo_sau_thue'] = number_format(convertToNumber($baoGia['tong_cong_1_bo_sau_thue']) * $baoGia['so_luong']);
        $baoGia['show_last_row'] = 'block';
        $baoGia['don_gia_bang_chu'] = $uti->convert_number_to_words(convertToNumber($baoGia['tong_cong_x_bo_sau_thue']));
    }else{
        $baoGia['don_gia_bang_chu'] = $uti->convert_number_to_words(convertToNumber($baoGia['tong_cong_1_bo_sau_thue']));
    }
    
    return $baoGia;
}

function getDonGiaThueVTH500kg($baoGia){
    $listDonGia = $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? get_gia_thue_VTH500kg_trong_TPHCM() : get_gia_thue_VTH500kg_ngoai_TPHCM();
    return $listDonGia[$baoGia['chieu_cao']];
}

function getDonGiaThueVTH1000kg($baoGia){
    $listDonGia = $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? get_gia_thue_VTH1000kg_trong_TPHCM() : get_gia_thue_VTH1000kg_ngoai_TPHCM();
    return $listDonGia[$baoGia['chieu_cao']];
}

function getDonGiaMuaVTH500kg($baoGia){
    $listDonGia = $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? get_gia_ban_VTH500kg_trong_TPHCM() : get_gia_ban_VTH500kg_ngoai_TPHCM();
    return $listDonGia[$baoGia['chieu_cao']];
}

function getDonGiaMuaVTH1000kg($baoGia){
    $listDonGia = $baoGia['vi_tri'] === 'Tp Hồ Chí Minh' ? get_gia_ban_VTH1000kg_trong_TPHCM() : get_gia_ban_VTH1000kg_ngoai_TPHCM();
    return $listDonGia[$baoGia['chieu_cao']];
}

function calculateDataForGianGiao($baoGia) {
    $formGianGiao = getGianGiaoFormData();
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
                $baoGia['tong_don_gia' . $index] = number_format(convertToNumber($formGianGiao[$key]['don_gia']) * $value);
                $baoGia['thanh_tien_thue' . $index] = number_format(convertToNumber($formGianGiao[$key]['don_gia_thue']) * $value);
            }
        }
    }

    // Tổng trọng lượng
    $baoGia['tong_trong_luong'] = round(getTotalWeight($baoGia));
    
    // Phí vận chuyển
    $baoGia['phi_van_chuyen'] = number_format(1200 * $baoGia['tong_trong_luong']);
    
    // Tổng đơn giá thiết bị
    $baoGia['tong_don_gia_thiet_bi'] = number_format(getTotalPriceBeforeTax($baoGia));
    
    if($baoGia['hinh_thuc'] == 'Thuê'){
        // Tổng đơn giá thuê thiết bị
        $baoGia['tong_don_gia_thue_thiet_bi'] = number_format(getBorrowTotalPriceBeforeTax($baoGia));

        // Tiền thuê tạm tính
        $baoGia['tien_thue_tam_tinh'] = convertToNumber($baoGia['tong_don_gia_thue_thiet_bi']);

        // Tiền thuê tạm tính cho 1 tháng
        $baoGia['tien_thue_tam_tinh_30ngay'] = number_format($baoGia['tien_thue_tam_tinh']*$baoGia['thoi_gian_thue']*30);

        // Tổng đơn giá thuê trước thuế
        $baoGia['tong_don_gia_thue_truoc_thue'] = number_format(convertToNumber($baoGia['tien_thue_tam_tinh_30ngay']) + convertToNumber($baoGia['phi_van_chuyen']));

        // VAT tổng giá thuê
        $baoGia['vat_thue'] = number_format(convertToNumber($baoGia['tong_don_gia_thue_truoc_thue'])*0.1);

        // Tổng đơn giá thuê sau thuế
        $baoGia['tong_don_gia_thue_sau_thue'] = number_format(convertToNumber($baoGia['vat_thue']) + convertToNumber($baoGia['tong_don_gia_thue_truoc_thue']));
    }

    // Tổng đơn giá trước thuế
    $baoGia['tong_don_gia_truoc_thue'] = number_format(convertToNumber($baoGia['tong_don_gia_thiet_bi']) + convertToNumber($baoGia['phi_van_chuyen']));
    
    // VAT
    $baoGia['vat'] = number_format(convertToNumber($baoGia['tong_don_gia_truoc_thue']) * 0.1);
    
    //Tổng đơn giá sau thuế
    $baoGia['tong_don_gia_sau_thue'] = number_format(convertToNumber($baoGia['tong_don_gia_truoc_thue']) + convertToNumber($baoGia['vat']));

    return $baoGia;
}

// Get total pay before tax
function getTotalPriceBeforeTax($data) {
    $total = 0;
    foreach ($data as $key => $value) {
        if (substr($key, 0, 12) === 'tong_don_gia' && strlen($key) > 12) {
            $total += convertToNumber($value);
        }
    }
    return $total;
}

// Get total pay before tax
function getBorrowTotalPriceBeforeTax($data) {
    $total = 0;
    foreach ($data as $key => $value) {
        if (substr($key, 0, 15) === 'thanh_tien_thue' && strlen($key) > 15) {
            $total += convertToNumber($value);
        }
    }
    return $total;
}

// Get total weight
//*
//INPUT @array
//OUTPUT @float
//*/
function getTotalWeight($data) {
    $totalWeight = 0;
    foreach ($data as $key => $value) {
        if (substr($key, 0, 16) === 'tong_trong_luong' && strlen($key) > 16) {
            $totalWeight += $value;
        }
    }
    return $totalWeight;
}

function getAdditionalInfoForVTH500kg(){
    return array(
        'kiem_dinh_12thang' => '3,000,000',
        'bao_tri' => '1,000,000'
    );
}

function getAdditionalInfoForVTH1000kg(){
    return array(
        'kiem_dinh_12thang' => '3,000,000',
        'bao_tri' => '1,500,000'
    );
}


// Gian giao data structure
function getGianGiaoFormData() {
    return array(
        'so_luong2' => [
            'trong_luong' => 7.4,
            'don_gia' => '178,000',
            'don_gia_thue' => 355
        ],
        'so_luong3' => [
            'trong_luong' => 5.8,
            'don_gia' => '140,000',
            'don_gia_thue' => 278
        ],
        'so_luong4' => [
            'trong_luong' => 4.35,
            'don_gia' => '105,000',
            'don_gia_thue' => 209
        ],
        'so_luong5' => [
            'trong_luong' => 3.15,
            'don_gia' => '76,000',
            'don_gia_thue' => 151
        ],
        'so_luong6' => [
            'trong_luong' => 3.65,
            'don_gia' => '88,000',
            'don_gia_thue' => 176
        ],
        'so_luong7' => [
            'trong_luong' => 1.1,
            'don_gia' => '27,000',
            'don_gia_thue' => 53
        ],
        'so_luong8' => [
            'trong_luong' => 1.34,
            'don_gia' => '33,000',
            'don_gia_thue' => 64
        ],
        'so_luong9' => [
            'trong_luong' => 2.05,
            'don_gia' => '50,000',
            'don_gia_thue' => 98
        ],
        'so_luong10' => [
            'trong_luong' => 2.46,
            'don_gia' => '60,000',
            'don_gia_thue' => 118
        ],
        'so_luong11' => [
            'trong_luong' => 3.02,
            'don_gia' => '73,000',
            'don_gia_thue' => 145
        ],
        'so_luong12' => [
            'trong_luong' => 3.02,
            'don_gia' => '73,000',
            'don_gia_thue' => 206
        ],
        'so_luong13' => [
            'trong_luong' => 8.27,
            'don_gia' => '199,000',
            'don_gia_thue' => 582
        ],
        'so_luong14' => [
            'trong_luong' => 2,
            'don_gia' => '48,000',
            'don_gia_thue' => 96
        ],
        'so_luong15' => [
            'trong_luong' => 2.3,
            'don_gia' => '56,000',
            'don_gia_thue' => 110
        ],
        'so_luong16' => [
            'trong_luong' => 2,
            'don_gia' => '48,000',
            'don_gia_thue' => 96
        ],
        'so_luong17' => [
            'trong_luong' => 2.3,
            'don_gia' => '56,000',
            'don_gia_thue' => 110
        ],
        'so_luong18' => [
            'trong_luong' => 9.17,
            'don_gia' => '221,000',
            'don_gia_thue' => 440
        ],
        'so_luong19' => [
            'trong_luong' => 20.96,
            'don_gia' => '504,000',
            'don_gia_thue' => 1001
        ],
        'so_luong20' => [
            'trong_luong' => 14.80,
            'don_gia' => '386,000',
            'don_gia_thue' => 670
        ],
        'so_luong21' => [
            'trong_luong' => 0.5,
            'don_gia' => '15,000',
            'don_gia_thue' => 50
        ],
        'so_luong22' => [
            'trong_luong' => 4.5,
            'don_gia' => '80,000',
            'don_gia_thue' => 162
        ],
        'so_luong23' => [
            'trong_luong' =>  2.7,
            'don_gia' => '50,000',
            'don_gia_thue' => 90
        ],
        'so_luong24' => [
            'trong_luong' =>  4.5,
            'don_gia' => '90,000',
            'don_gia_thue' => 170
        ],
        'so_luong25' => [
            'trong_luong' => 2.7,
            'don_gia' => '55,000',
            'don_gia_thue' => 110
        ]
    );
}

function getCities() {
    $cities = array(
        'Tp Hồ Chí Minh' => array(
            'Quận 1' => array(11.8, 1),
            'Quận 2' => array(18.5, 1),
            'Quận 3' => array(86, 1),
            'Quận 4' => array(12, 1),
            'Quận 5' => array(9.3, 1),
            'Quận 6' => array(9.1, 1),
            'Quận 7' => array(16.5, 1),
            'Quận 8' => array(13.5, 1),
            'Quận 9' => array(29.4, 1),
            'Quận 10' => array(8.4, 1),
            'Quận 11' => array(8.5, 1),
            'Quận 12' => array(7, 1),
            'Quận Bình Tân' => array(8.9, 1),
            'Quận Bình Thạnh' => array(11.5, 1),
            'Quận Gò Vấp' => array(6.1, 1),
            'Quận Phú Nhuận' => array(7.1, 1),
            'Quận Tân Bình' => array(4.1, 1),
            'Quận Tân Phú' => array(4.2, 1),
            'Quận Thủ Đức' => array(16.4, 1),
            'Huyện Bình Chánh' => array(24.3, 1),
            'Huyện Cần Giờ' => array(72.7, 1),
            'Huyện Củ Chi' => array(27.9, 1),
            'Huyện Hóc Môn' => array(9, 1),
            'Huyện Nhà Bè' => array(19.2, 1)
        ),
        'Đà Nẵng' => array(
            'Huyện Hoàng Sa' => array(866,4),
            'Quận Thanh Khê' => array(853,4),
            'Huyện Hòa Vang'  => array(842,4),
            'Quận Sơn Trà' => array(863,4),
            'Quận Liên Chiểu' => array(855,4),
            'Quận Hải Châu' => array(854,4),
            'Quận Cẩm Lệ' => array(849,4),
            'Quận Ngũ Hành Sơn' => array(855,4)
        ),
        'An Giang' => array(
            'Huyện An Phú' => array(220, 2.5),
            'Huyện Tịnh Biên' => array(254, 2.5),
            'Huyện Châu Phú' => array(229, 2.5),
            'Huyện Phú Tân' => array(186, 2.5),
            'Thành phố Châu Đốc' => array(212, 2.5),
            'Thành phố Long Xuyên' => array(187, 2.5),
            'Huyện Tri Tôn' => array(242, 2.5),
            'Thị xã Tân Châu' => array(202, 2.5),
            'Huyện Thoại Sơn' => array(210, 2.5)
        ),
        'Bạc Liêu' => array(
            'Thành phố Bạc Liêu' => array(266, 2),
            'Huyện Vĩnh Lợi' => array(261, 2),
            'Thị xã Giá Rai' => array(296, 2),
            'Huyện Hồng Dân' => array(260, 2),
            'Huyện Phước Long' => array(262, 2),
            'Huyện Đông Hải' => array(308, 2),
            'Huyện Hoà Bình' => array(376, 2)
        ),
        'Bến Tre' => array(
            'Huyện Bình Đại' => array(123, 2),
            'Huyện Châu Thành' => array(79.7, 2),
            'Huyện Ba Tri' => array(121, 2),
            'Huyện Thạnh Phú' => array(137, 2),
            'Huyện Chợ Lách' => array(116, 2),
            'Huyện Mỏ Cày' => array(101, 2),
            'Huyện Giồng Trôm' => array(103, 2),
            'Thành phố Bến Tre' => array(107, 2)
        ),
        'Bình Dương' => array(
            'Thị xã Thuận An' => array(24.4, 1.5),
            'Thị xã Tân Uyên' => array(39.4, 1.5),
            'Thị xã Dĩ An' => array(21.9, 1.5),
            'Thị xã Bến Cát' => array(39.8, 1.5),
            'Huyện Dầu Tiếng' => array(76.5, 1.5),
            'Huyện Phú Giáo' => array(59.5, 1.5),
            'Thành phố Thủ Dầu Một' => array(24.3, 1.5)
        ),
        'Bình Phước' => array(
            'Huyện Phú Riềng' => array(113, 2),
            'Huyện Bù Đăng' => array(141, 2),
            'Thị xã Đồng Xoài' => array(96.2, 2),
            'Huyện Đồng Phú' => array(106, 2),
            'Thị xã Bình Long' => array(109, 2),
            'Huyện Lộc Ninh' => array(121, 2),
            'Thị xã Phước Long' => array(143, 2),
            'Huyện Chơn Thành' => array(84.7, 2),
            'Huyện Bù Đốp' => array(162, 2),
            'Huyện Bù Gia Mập' => array(174, 2),
            'Huyện Hớn Quản' => array(101, 2)
        ),
        'Bình Thuận' => array(
            'Huyện Bắc Bình' => array(250, 2),
            'Thị xã La Gi' => array(165, 2),
            'Huyện Hàm Thuận Nam' => array(167, 2),
            'Huyện Hàm Tân' => array(144, 2),
            'Huyện Phú Quí' => array(-1, 2),
            'Huyện Tuy Phong' => array(284, 2),
            'Huyện Đức Linh' => array(138, 2),
            'Huyện Tánh Linh' => array(158, 2),
            'Huyện Hàm Thuận Bắc' => array(212, 2),
            'Thành phố Phan Thiết' => array(213, 2)
        ),
        'Bình Định' => array(
            'Huyện Tây Sơn' => array(574, 2.5),
            'Huyện Hoài Ân' => array(730, 2.5),
            'Huyện Vân Canh' => array(664, 2.5),
            'Huyện Hoài Nhơn' => array(735, 2.5),
            'Huyện Tuy Phước' => array(659, 2.5),
            'Thị xã An Nhơn' => array(661, 2.5),
            'Huyện Phù Mỹ' => array(711, 2.5),
            'Thành phố Qui Nhơn' => array(643, 2.5),
            'Huyện Phù Cát' => array(678, 2.5),
            'Huyện An Lão' => array(754, 2.5),
            'Huyện Vĩnh Thạnh' => array(583, 2.5)
        ),
        'Cà Mau' => array(
            'Huyện Đầm Dơi' => array(337, 2),
            'Huyện Cái Nước' => array(345, 2),
            'Huyện U Minh' => array(336, 2),
            'Huyện Thới Bình' => array(300, 2),
            'Huyện Ngọc Hiển' => array(369, 2),
            'Thành phố Cà Mau' => array(309, 2),
            'Huyện Trần Văn Thời' => array(343, 2),
            'Huyện Năm Căn' => array(367, 2),
            'Huyện Phú Tân' => array(355, 2)
        ),
        'Cần Thơ' => array(
            'Huyện Cờ Đỏ' => array(217, 2),
            'Huyện Phong Điền' => array(178, 2),
            'Quận Ô Môn' => array(186, 2),
            'Quận Cái Răng' => array(167, 2),
            'Quận Bình Thuỷ' => array(173, 2),
            'Quận Ninh Kiều' => array(166, 2),
            'Quận Thốt Nốt' => array(208, 2),
            'Huyện Vĩnh Thạnh' => array(193, 2)
        ),
        'Khánh Hòa' => array(
            'Thành phố Cam Ranh' => array(392, 2.5),
            'Huyện Trường Sa' => array(432, 2.5),
            'Thị xã Ninh Hòa' => array(466, 2.5),
            'Huyện Khánh Sơn' => array(424, 2.5),
            'Huyện Khánh Vĩnh' => array(400, 2.5),
            'Huyện Diên Khánh' => array(435, 2.5),
            'Huyện Vạn Ninh' => array(497, 2.5),
            'Huyện Cam Lâm' => array(408, 2.5),
            'Thành phố Nha Trang' => array(434, 2.5)
        ),
        'Gia Lai' => array(
            'Thị xã Ayun Pa' => array(452, 2.5),
            'Thị xã An Khê' => array(555, 2.5),
            'Huyện Phú Thiện' => array(528, 2.5),
            'Huyện Đăk Pơ' => array(543, 2.5),
            'Huyện Ia Pa' => array(-1, 2.5),
            'Huyện Mang Yang' => array(555, 2.5),
            'Huyện Kông Chro' => array(533, 2.5),
            'Huyện Krông Pa' => array(495, 2.5),
            'Huyện KBang' => array(606, 2.5),
            'Huyện Chư Prông' => array(471, 2.5),
            'Huyện Đức Cơ' => array(557, 2.5),
            'Huyện Chư Sê' => array(489, 2.5),
            'Huyện Đăk Đoa' => array(548, 2.5),
            'Huyện Ia Grai' => array(563, 2.5),
            'Huyện Chư Păh' => array(543, 2.5),
            'Thành phố Pleiku' => array(518, 2.5)
        ),
        'Kiên Giang' => array(
            'Huyện Kiên Lương' => array(317, 2),
            'Thành phố Rạch Giá' => array(271, 2),
            'Huyện Châu Thành' => array(256, 2),
            'Huyện Gò Quao' => array(235, 2),
            'Thị xã Hà Tiên' => array(315, 2),
            'Huyện Tân Hiệp' => array(211, 2),
            'Huyện An Minh' => array(292, 2),
            'Huyện Kiên Hải' => array(-1, -1),
            'Huyện Giồng Riềng' => array(233, 2),
            'Huyện Phú Quốc' => array(396, 5),
            'Huyện An Biên' => array(271, 2),
            'Huyện U Minh Thượng' => array(300, 2)
        ),
        'Kon Tum' => array(
            'Huyện Ia H Drai' => array(590, 2.5),
            'Huyện Đắk Glei' => array(682, 2.5),
            'Huyện Ngọc Hồi' => array(636, 2.5),
            'Huyện Đắk Tô' => array(610, 2.5),
            'Huyện Kon Rẫy' => array(604, 2.5),
            'Huyện Kon Plông' => array(640, 2.5),
            'Huyện Đắk Hà' => array(607, 2.5),
            'Huyện Tu Mơ Rông' => array(658, 2.5),
            'Huyện Sa Thầy' => array(596, 2.5),
            'Thành phố Kon Tum' => array(564, 2.5)
        ),
        'Lâm Đồng' => array(
            'Huyện Đức Trọng' => array(265, 2.5),
            'Huyện Đơn Dương' => array(304, 2.5),
            'Thành phố Bảo Lộc' => array(205, 2.5),
            'Huyện Đạ Tẻh' => array(181, 2.5),
            'Huyện Bảo Lâm' => array(227, 2.5),
            'Huyện Đạ Huoai' => array(157, 2.5),
            'Huyện Lạc Dương' => array(336, 2.5),
            'Huyện Cát Tiên' => array(210, 2.5),
            'Huyện Lâm Hà' => array(275, 2.5),
            'Huyện Di Linh' => array(240, 2.5),
            'Thành phố Đà Lạt' => array(310, 2.5),
            'Huyện Đam Rông' => array(319, 2.5)
        ),
        'Long An' => array(
            'Huyện Tân Thạnh' => array(93.3, 1.5),
            'Huyện Tân Trụ' => array(54.6, 1.5),
            'Huyện Mộc Hóa' => array(113, 1.5),
            'Huyện Đức Hòa' => array(34.1, 1.5),
            'Huyện Vĩnh Hưng' => array(136, 1.5),
            'Huyện Cần Đước' => array(37.7, 1.5),
            'Huyện Đức Huệ' => array(55, 1.5),
            'Huyện Bến Lức' => array(34, 1.5),
            'Huyện Thạnh Hóa' => array(104, 1.5),
            'Huyện Cần Giuộc' => array(35.8, 1.5),
            'Huyện Thủ Thừa' => array(72.6, 1.5),
            'Huyện Châu Thành' => array(66.7, 1.5),
            'Huyện Tân Hưng' => array(144, 1.5),
            'Thành phố Tân An' => array(51.9, 1.5)
        ),
        'Ninh Thuận' => array(
            'Huyện Bác Ái' => array(383, 2),
            'Huyện Ninh Hải' => array(373, 2),
            'Huyện Ninh Phước' => array(340, 2),
            'Huyện Ninh Sơn' => array(372, 2),
            'Huyện Thuận Bắc' => array(363, 2),
            'Thành phố Phan Rang-Tháp Chàm' => array(339, 2)
        ),
        'Phú Yên' => array(
            'Huyện Sông Hinh' => array(461, 2.5),
            'Huyện Tây Hoà' => array(558, 2.5),
            'Huyện Tuy An' => array(573, 2.5),
            'Thị xã Sông Cầu' => array(621, 2.5),
            'Huyện Đồng Xuân' => array(547, 2.5),
            'Huyện Sơn Hòa' => array(492, 2.5),
            'Thành phố Tuy Hoà' => array(551, 2.5),
            'Huyện Phú Hoà' => array(561, 2.5),
            'Huyện Đông Hòa' => array(532, 2.5)
        ),
        'Quảng Nam' => array(
            'Huyện Hiệp Đức' => array(781,4),
            'Huyện Đông Giang' => array(862,4),
            'Huyện Tây Giang' => array(878,4),
            'Huyện Bắc Trà My' => array(753,4),
            'Thành phố Hội An' => array(845,4),
            'Thành phố Tam Kỳ' => array(798,4),
            'Huyện Đại Lộc' => array(824,4),
            'Thị xã Điện Bàn' => array(838,4),
            'Huyện Tiên Phước' => array(779,4),
            'Huyện Nam Trà My' => array(690,4),
            'Huyện Quế Sơn' => array(810,4),
            'Huyện Núi Thành' => array(812,4),
            'Huyện Thăng Bình' => array(821,4),
            'Huyện Phước Sơn' => array(744,4),
            'Huyện Duy Xuyên' => array(847,4),
            'Huyện Nam Giang' => array(805,4),
            'Huyện Phú Ninh' => array(794,4),
            'Huyện Nông Sơn' => array(837,4)
        ),
        'Quảng Ngãi' => array(
            'Huyện Minh Long' => array(727,3),
            'Huyện Tây Trà' => array(759,3),
            'Huyện Trà Bồng' => array(867,3),
            'Huyện Bình Sơn' => array(843,3),
            'Huyện Đức Phổ' => array(774,3),
            'Huyện Lý Sơn' => array(-1,3),
            'Huyện Ba Tơ' => array(699,3),
            'Huyện Mộ Đức' => array(799,3),
            'Huyện Nghĩa Hành' => array(822,3),
            'Huyện Tư Nghĩa' => array(822,3),
            'Huyện Sơn Tịnh' => array(830,3),
            'Huyện Sơn Tây' => array(746,3),
            'Thành phố Quảng Ngãi' => array(763,3),
            'Huyện Sơn Hà' => array(717,3)
        ),
        'Sóc Trăng' => array(
            'Huyện Thạnh Trị' => array(254, 2),
            'Huyện Mỹ Xuyên' => array(251, 2),
            'Huyện Long Phú' => array(234, 2),
            'Thị xã Vĩnh Châu' => array(259, 2),
            'Huyện Mỹ Tú' => array(224, 2),
            'Huyện Kế Sách' => array(196, 2),
            'Huyện Cù Lao Dung' => array(188, 2),
            'Thị xã Ngã Năm' => array(239, 2),
            'Thành phố Sóc Trăng' => array(221, 2),
            'Huyện Châu Thành' => array(212, 2),
            'Huyện Trần Đề' => array(240, 2)
        ),
        'Tây Ninh' => array(
            'Huyện Dương Minh Châu' => array(84.1, 1.5),
            'Huyện Bến Cầu' => array(77.6, 1.5),
            'Huyện Châu Thành' => array(97, 1.5),
            'Huyện Gò Dầu' => array(59, 1.5),
            'Huyện Hòa Thành' => array(81.5, 1.5),
            'Huyện Tân Châu' => array(113, 1.5),
            'Huyện Trảng Bàng' => array(38.7, 1.5),
            'Huyện Tân Biên' => array(119, 1.5),
            'Thành phố Tây Ninh' => array(87.9, 1.5)
        ),
        'Tiền Giang' => array(
            'Huyện Châu Thành' => array(79.4, 2),
            'Huyện Tân Phú Đông'=> array(-1, 2),
            'Thị xã Gò Công' => array(60.6, 2),
            'Huyện Tân Phước' => array(71.3, 2),
            'Huyện Gò Công Tây' => array(70.9, 2),
            'Huyện Cai Lậy' => array(91.2, 2),
            'Huyện Gò Công Đông' => array(68.8, 2),
            'Huyện Chợ Gạo' => array(83.7, 2),
            'Huyện Cái Bè' => array(112, 2),
            'Thành phố Mỹ Tho' => array(39.9, 2)
        ),
        'Trà Vinh' => array(
            'Thị xã Duyên Hải' => array(181, 2),
            'Huyện Châu Thành' => array(147, 2),
            'Huyện Cầu Kè' => array(154, 2),
            'Huyện Càng Long' => array(129, 2),
            'Huyện Cầu Ngang' => array(159, 2),
            'Huyện Duyên Hải' => array(181, 2),
            'Huyện Tiểu Cần' => array(153, 2),
            'Huyện Trà Cú' => array(165, 2),
            'Thành phố Trà Vinh' => array(150, 2)
        ),
        'Vĩnh Long' => array(
            'Huyện Mang Thít' => array(151, 2),
            'Huyện Vũng Liêm' => array(146, 2),
            'Thị xã Bình Minh' => array(155, 2),
            'Huyện Tam Bình' => array(154, 2),
            'Huyện Long Hồ' => array(137, 2),
            'Thành phố Vĩnh Long' => array(132, 2),
            'Huyện Bình Tân' => array(151, 2),
            'Huyện Trà Ôn' => array(175, 2)
        ),
        'Đắk Lắk' => array(
            'Huyện Krông A Na' => array(352, 2.5),
            'Thành phố Buôn Ma Thuột' => array(334, 2.5),
            'Huyện Cư Kuin' => array(360, 2.5),
            'Huyện Cư M gar' => array(360, 2.5),
            'Huyện Ea Súp' => array(407, 2.5),
            'Huyện Krông Năng' => array(408, 2.5),
            'Huyện Ea H leo' => array(417, 2.5),
            'Huyện Krông Búk' => array(395, 2.5),
            'Huyện Buôn Đôn' => array(351, 2.5),
            'Huyện Lắk' => array(323, 2.5),
            'Huyện Krông Pắc' => array(375, 2.5),
            'Huyện Krông Bông' => array(373, 2.5),
            'Huyện Ea Kar' => array(400, 2.5),
            'Huyện M Đrắk' => array(429, 2.5)
        ),
        'Đắk Nông' => array(
            'Huyện Đắk Mil' => array(278, 2.5),
            'Huyện Cư Jút' => array(325, 2.5),
            'Huyện Đăk Glong' => array(235, 2.5),
            'Huyện Đắk R Lấp' => array(193, 2.5),
            'Huyện Krông Nô' => array(305, 2.5),
            'Huyện Đắk Song' => array(246, 2.5),
            'Huyện Tuy Đức' => array(218, 2.5),
            'Thị xã Gia Nghĩa' => array(213, 2.5)
        ),
        'Đồng Nai' => array(
            'Huyện Định Quán' => array(115, 1.5),
            'Huyện Long Thành' => array(50.8, 1.5),
            'Huyện Cẩm Mỹ' => array(102, 1.5),
            'Thành phố Biên Hòa' => array(35.2, 1.5),
            'Huyện Thống Nhất' => array(84.9, 1.5),
            'Huyện Nhơn Trạch' => array(58.5, 1.5),
            'Huyện Vĩnh Cửu' => array(95.2, 1.5),
            'Huyện Xuân Lộc' => array(107, 1.5),
            'Huyện Trảng Bom' => array(55.8, 1.5),
            'Huyện Tân Phú' => array(156, 1.5),
            'Thị xã Long Khánh' => array(84.2, 1.5)
        ),
        'Đồng Tháp' => array(
            'Huyện Tân Hồng' => array(173, 2),
            'Thành phố Sa Đéc' => array(143, 2),
            'Huyện Lai Vung' => array(158, 2),
            'Huyện Châu Thành' => array(144, 2),
            'Huyện Lấp Vò' => array(163, 2),
            'Huyện Cao Lãnh' => array(145, 2),
            'Huyện Tháp Mười' => array(118, 2),
            'Huyện Thanh Bình' => array(157, 2),
            'Huyện Tam Nông' => array(175, 2),
            'Huyện Hồng Ngự' => array(178, 2),
            'Thành phố Cao Lãnh' => array(145, 2)
        )
    );

    return $cities;
}

function get_gia_ban_VTH500kg_trong_TPHCM(){
    return array(
        6 => array(
            'don_gia' => '47,600,000',
            'thanh_giang' => 1,
            'khung_van_thang' => 3
        ),
        8 => array(
            'don_gia' => '49,800,000',
            'thanh_giang' => 1,
            'khung_van_thang' => 4
        ),
        10 => array(
            'don_gia' => '52,000,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 5
        ),
        12 => array(
            'don_gia' => '54,200,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 6
        ),
        14 => array(
            'don_gia' => '56,400,000',
            'thanh_giang' => 12,
            'khung_van_thang' => 7
        ),
        16 => array(
            'don_gia' => '58,600,000',
            'thanh_giang' => 3,
            'khung_van_thang' => 8
        ),
        18 => array(
            'don_gia' => '60,800,000',
            'thanh_giang' => 3,
            'khung_van_thang' => 9
        ),
        20 => array(
            'don_gia' => '63,000,000',
            'thanh_giang' => 4,
            'khung_van_thang' => 10
        ),
        22 => array(
            'don_gia' => '65,200,000',
            'thanh_giang' => 5,
            'khung_van_thang' => 11
        ),
        24 => array(
            'don_gia' => '67,400,000',
            'thanh_giang' => 5,
            'khung_van_thang' => 12
        ),
        26 => array(
            'don_gia' => '69,600,000',
            'thanh_giang' => 6,
            'khung_van_thang' => 13
        ),
        28 => array(
            'don_gia' => '71,800,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 14
        ),
        30 => array(
            'don_gia' => '74,000,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 15
        ),
        32 => array(
            'don_gia' => '76,200,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 16
        ),
        34 => array(
            'don_gia' => '78,400,000',
            'thanh_giang' => 8,
            'khung_van_thang' => 17
        ),
        36 => array(
            'don_gia' => '80,600,000',
            'thanh_giang' => 9,
            'khung_van_thang' => 18
        ),
        38 => array(
            'don_gia' => '82,800,000',
            'thanh_giang' => 9,
            'khung_van_thang' => 19
        ),
        40 => array(
            'don_gia' => '85,000,000',
            'thanh_giang' => 10,
            'khung_van_thang' => 20
        ),
        42 => array(
            'don_gia' => '87,200,000',
            'thanh_giang' => 11,
            'khung_van_thang' => 21
        ),
        44 => array(
            'don_gia' => '89,400,000',
            'thanh_giang' => 11,
            'khung_van_thang' => 24
        ),
        46 => array(
            'don_gia' => '91,600,000',
            'thanh_giang' => 12,
            'khung_van_thang' => 25
        ),
        48 => array(
            'don_gia' => '93,800,000',
            'thanh_giang' => 13,
            'khung_van_thang' => 26
        ),
        50 => array(
            'don_gia' => '96,000,000',
            'thanh_giang' => 13,
            'khung_van_thang' => 27
        ),
        52 => array(
            'don_gia' => '98,200,000',
            'thanh_giang' => 14,
            'khung_van_thang' => 28
        ),
        54 => array(
            'don_gia' => '100,400,000',
            'thanh_giang' => 15,
            'khung_van_thang' => 29
        ),
        56 => array(
            'don_gia' => '102,600,000',
            'thanh_giang' => 15,
            'khung_van_thang' => 30
        ),
        58 => array(
            'don_gia' => '104,800,000',
            'thanh_giang' => 16,
            'khung_van_thang' => 29
        ),
        60 => array(
            'don_gia' => '107,000,000',
            'thanh_giang' => 17,
            'khung_van_thang' => 30
        ),
    );
}

function get_gia_ban_VTH500kg_ngoai_TPHCM(){
    return array(
        6 => array(
            'don_gia' => '60,000,000',
            'thanh_giang' => 1,
            'khung_van_thang' => 3
        ),
        8 => array(
            'don_gia' => '62,500,000',
            'thanh_giang' => 1,
            'khung_van_thang' => 4
        ),
        10 => array(
            'don_gia' => '65,000,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 5
        ),
        12 => array(
            'don_gia' => '67,500,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 6
        ),
        14 => array(
            'don_gia' => '70,000,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 7
        ),
        16 => array(
            'don_gia' => '72,500,000',
            'thanh_giang' => 3,
            'khung_van_thang' => 8
        ),
        18 => array(
            'don_gia' => '75,000,000',
            'thanh_giang' => 3,
            'khung_van_thang' => 9
        ),
        20 => array(
            'don_gia' => '77,500,000',
            'thanh_giang' => 4,
            'khung_van_thang' => 10
        ),
        22 => array(
            'don_gia' => '80,000,000',
            'thanh_giang' => 5,
            'khung_van_thang' => 11
        ),
        24 => array(
            'don_gia' => '82,500,000',
            'thanh_giang' => 5,
            'khung_van_thang' => 12
        ),
        26 => array(
            'don_gia' => '85,000,000',
            'thanh_giang' => 6,
            'khung_van_thang' => 13
        ),
        28 => array(
            'don_gia' => '87,500,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 14
        ),
        30 => array(
            'don_gia' => '90,000,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 15
        ),
        32 => array(
            'don_gia' => '92,500,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 16
        ),
        34 => array(
            'don_gia' => '95,000,000',
            'thanh_giang' => 8,
            'khung_van_thang' => 17
        ),
        36 => array(
            'don_gia' => '97,500,000',
            'thanh_giang' => 9,
            'khung_van_thang' => 18
        ),
        38 => array(
            'don_gia' => '100,000,000',
            'thanh_giang' => 9,
            'khung_van_thang' => 19
        ),
        40 => array(
            'don_gia' => '102,500,000',
            'thanh_giang' => 10,
            'khung_van_thang' => 20
        ),
        42 => array(
            'don_gia' => '105,000,000',
            'thanh_giang' => 11,
            'khung_van_thang' => 21
        ),
        44 => array(
            'don_gia' => '107,500,000',
            'thanh_giang' => 11,
            'khung_van_thang' => 22
        ),
        46 => array(
            'don_gia' => '110,000,000',
            'thanh_giang' => 12,
            'khung_van_thang' => 23
        ),
        48 => array(
            'don_gia' => '112,500,000',
            'thanh_giang' => 13,
            'khung_van_thang' => 24
        ),
        50 => array(
            'don_gia' => '115,000,000',
            'thanh_giang' => 13,
            'khung_van_thang' => 25
        ),
        52 => array(
            'don_gia' => '117,500,000',
            'thanh_giang' => 14,
            'khung_van_thang' => 26
        ),
        54 => array(
            'don_gia' => '120,000,000',
            'thanh_giang' => 15,
            'khung_van_thang' => 27
        ),
        56 => array(
            'don_gia' => '122,500,000',
            'thanh_giang' => 15,
            'khung_van_thang' => 28
        ),
        58 => array(
            'don_gia' => '125,000,000',
            'thanh_giang' => 16,
            'khung_van_thang' => 29
        ),
        60 => array(
            'don_gia' => '127,500,000',
            'thanh_giang' => 17,
            'khung_van_thang' => 30
        ),
    );
}

function get_gia_ban_VTH1000kg_trong_TPHCM(){
    return array(
        6 => array(
            'don_gia' => '55,000,000',
            'thanh_giang' => 1,
            'khung_van_thang' => 3
        ),
        8 => array(
            'don_gia' => '57,500,000',
            'thanh_giang' => 1,
            'khung_van_thang' => 4
        ),
        10 => array(
            'don_gia' => '60,000,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 5
        ),
        12 => array(
            'don_gia' => '62,500,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 6
        ),
        14 => array(
            'don_gia' => '65,000,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 7
        ),
        16 => array(
            'don_gia' => '67,500,000',
            'thanh_giang' => 3,
            'khung_van_thang' => 8
        ),
        18 => array(
            'don_gia' => '70,000,000',
            'thanh_giang' => 3,
            'khung_van_thang' => 9
        ),
        20 => array(
            'don_gia' => '72,500,000',
            'thanh_giang' => 4,
            'khung_van_thang' => 10
        ),
        22 => array(
            'don_gia' => '75,000,000',
            'thanh_giang' => 5,
            'khung_van_thang' => 11
        ),
        24 => array(
            'don_gia' => '77,500,000',
            'thanh_giang' => 5,
            'khung_van_thang' => 12
        ),
        26 => array(
            'don_gia' => '80,000,000',
            'thanh_giang' => 6,
            'khung_van_thang' => 13
        ),
        28 => array(
            'don_gia' => '82,500,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 14
        ),
        30 => array(
            'don_gia' => '85,000,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 15
        ),
        32 => array(
            'don_gia' => '87,500,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 16
        ),
        34 => array(
            'don_gia' => '90,000,000',
            'thanh_giang' => 8,
            'khung_van_thang' => 17
        ),
        36 => array(
            'don_gia' => '92,500,000',
            'thanh_giang' => 9,
            'khung_van_thang' => 18
        ),
        38 => array(
            'don_gia' => '92,500,000',
            'thanh_giang' => 9,
            'khung_van_thang' => 19
        ),
        40 => array(
            'don_gia' => '95,000,000',
            'thanh_giang' => 10,
            'khung_van_thang' => 20
        ),
        42 => array(
            'don_gia' => '97,500,000',
            'thanh_giang' => 11,
            'khung_van_thang' => 21
        ),
        44 => array(
            'don_gia' => '100,000,000',
            'thanh_giang' => 11,
            'khung_van_thang' => 22
        ),
        46 => array(
            'don_gia' => '102,500,000',
            'thanh_giang' => 12,
            'khung_van_thang' => 23
        ),
        48 => array(
            'don_gia' => '105,000,000',
            'thanh_giang' => 13,
            'khung_van_thang' => 24
        ),
        50 => array(
            'don_gia' => '107,500,000',
            'thanh_giang' => 13,
            'khung_van_thang' => 25
        ),
        52 => array(
            'don_gia' => '110,000,000',
            'thanh_giang' => 14,
            'khung_van_thang' => 26
        ),
        54 => array(
            'don_gia' => '112,500,000',
            'thanh_giang' => 15,
            'khung_van_thang' => 27
        ),
        56 => array(
            'don_gia' => '115,000,000',
            'thanh_giang' => 15,
            'khung_van_thang' => 28
        ),
        58 => array(
            'don_gia' => '117,500,000',
            'thanh_giang' => 16,
            'khung_van_thang' => 29
        ),
        60 => array(
            'don_gia' => '120,000,000',
            'thanh_giang' => 17,
            'khung_van_thang' => 30
        ),
    );
}

function get_gia_ban_VTH1000kg_ngoai_TPHCM(){
    return array(
        6 => array(
            'don_gia' => '72,400,000',
            'thanh_giang' => 1,
            'khung_van_thang' => 3
        ),
        8 => array(
            'don_gia' => '74,900,000',
            'thanh_giang' => 1,
            'khung_van_thang' => 4
        ),
        10 => array(
            'don_gia' => '77,400,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 5
        ),
        12 => array(
            'don_gia' => '79,900,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 6
        ),
        14 => array(
            'don_gia' => '82,400,000',
            'thanh_giang' => 2,
            'khung_van_thang' => 7
        ),
        16 => array(
            'don_gia' => '84,900,000',
            'thanh_giang' => 3,
            'khung_van_thang' => 8
        ),
        18 => array(
            'don_gia' => '87,400,000',
            'thanh_giang' => 3,
            'khung_van_thang' => 9
        ),
        20 => array(
            'don_gia' => '89,900,000',
            'thanh_giang' => 4,
            'khung_van_thang' => 10
        ),
        22 => array(
            'don_gia' => '92,400,000',
            'thanh_giang' => 5,
            'khung_van_thang' => 11
        ),
        24 => array(
            'don_gia' => '94,900,000',
            'thanh_giang' => 5,
            'khung_van_thang' => 12
        ),
        26 => array(
            'don_gia' => '97,400,000',
            'thanh_giang' => 6,
            'khung_van_thang' => 13
        ),
        28 => array(
            'don_gia' => '99,900,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 14
        ),
        30 => array(
            'don_gia' => '102,400,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 15
        ),
        32 => array(
            'don_gia' => '104,900,000',
            'thanh_giang' => 7,
            'khung_van_thang' => 16
        ),
        34 => array(
            'don_gia' => '107,400,000',
            'thanh_giang' => 8,
            'khung_van_thang' => 17
        ),
        36 => array(
            'don_gia' => '109,900,000',
            'thanh_giang' => 9,
            'khung_van_thang' => 18
        ),
        38 => array(
            'don_gia' => '112,400,000',
            'thanh_giang' => 9,
            'khung_van_thang' => 19
        ),
        40 => array(
            'don_gia' => '114,900,000',
            'thanh_giang' => 10,
            'khung_van_thang' => 20
        ),
        42 => array(
            'don_gia' => '117,400,000',
            'thanh_giang' => 11,
            'khung_van_thang' => 21
        ),
        44 => array(
            'don_gia' => '119,900,000',
            'thanh_giang' => 11,
            'khung_van_thang' => 22
        ),
        46 => array(
            'don_gia' => '122,400,000',
            'thanh_giang' => 12,
            'khung_van_thang' => 23
        ),
        48 => array(
            'don_gia' => '124,900,000',
            'thanh_giang' => 13,
            'khung_van_thang' => 24
        ),
        50 => array(
            'don_gia' => '127,400,000',
            'thanh_giang' => 13,
            'khung_van_thang' => 25
        ),
        52 => array(
            'don_gia' => '129,900,000',
            'thanh_giang' => 14,
            'khung_van_thang' => 26
        ),
        54 => array(
            'don_gia' => '132,400,000',
            'thanh_giang' => 15,
            'khung_van_thang' => 27
        ),
        56 => array(
            'don_gia' => '134,900,000',
            'thanh_giang' => 15,
            'khung_van_thang' => 28
        ),
        58 => array(
            'don_gia' => '137,400,000',
            'thanh_giang' => 16,
            'khung_van_thang' => 29
        ),
        60 => array(
            'don_gia' => '139,900,000',
            'thanh_giang' => 17,
            'khung_van_thang' => 30
        ),
    );
}


function get_gia_thue_VTH500kg_trong_TPHCM(){
    return array(
        20 => array(
            'don_gia' => '6,000,000',
            'lap_dat' => '4,000,000',
            'van_chuyen' => '4,000,000'
        ),
        22 => array(
            'don_gia' => '6,000,000',
            'lap_dat' => '4,000,000',
            'van_chuyen' => '4,000,000'
        ),
        24 => array(
            'don_gia' => '6,000,000',
            'lap_dat' => '4,000,000',
            'van_chuyen' => '4,000,000'
        ),
        26 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '5,000,000',
            'van_chuyen' => '5,000,000'
        ),
        28 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '5,000,000',
            'van_chuyen' => '5,000,000'
        ),
        30 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '5,000,000',
            'van_chuyen' => '5,000,000'
        ),
        32 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        34 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        36 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        38 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        40 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        42 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        44 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        46 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        48 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        50 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        52 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        54 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        56 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        58 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        60 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
    );
}


function get_gia_thue_VTH500kg_ngoai_TPHCM(){
    return array(
        20 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        22 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        24 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        26 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        28 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        30 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        32 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        34 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        36 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        38 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        40 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        42 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        44 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        46 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        48 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        50 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        52 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        54 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        56 => array(
            'don_gia' => '12,000,000',
            'lap_dat' => '10,000,000',
            'van_chuyen' => '10,000,000'
        ),
        58 => array(
            'don_gia' => '12,000,000',
            'lap_dat' => '10,000,000',
            'van_chuyen' => '10,000,000'
        ),
        60 => array(
            'don_gia' => '12,000,000',
            'lap_dat' => '10,000,000',
            'van_chuyen' => '10,000,000'
        ),
    );
}

function get_phan_tram_theo_thang_thue(){
    return array(
        1 => 20,
        2 => 10
    );
}

function get_gia_thue_VTH1000kg_trong_TPHCM(){
      return array(
        20 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '4,000,000',
            'van_chuyen' => '4,000,000'
        ),
        22 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '4,000,000',
            'van_chuyen' => '4,000,000'
        ),
        24 => array(
            'don_gia' => '7,000,000',
            'lap_dat' => '4,000,000',
            'van_chuyen' => '4,000,000'
        ),
        26 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '5,000,000',
            'van_chuyen' => '5,000,000'
        ),
        28 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '5,000,000',
            'van_chuyen' => '5,000,000'
        ),
        30 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '5,000,000',
            'van_chuyen' => '5,000,000'
        ),
        32 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '5,000,000',
            'van_chuyen' => '5,000,000'
        ),
        34 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        36 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        38 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        40 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        42 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        44 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        46 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        48 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        50 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        52 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        54 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        56 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        58 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        60 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
    );
}

function get_gia_thue_VTH1000kg_ngoai_TPHCM(){
      return array(
        20 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        22 => array(
            'don_gia' => '78,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        24 => array(
            'don_gia' => '8,000,000',
            'lap_dat' => '6,000,000',
            'van_chuyen' => '6,000,000'
        ),
        26 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        28 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        30 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        32 => array(
            'don_gia' => '9,000,000',
            'lap_dat' => '7,000,000',
            'van_chuyen' => '7,000,000'
        ),
        34 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        36 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        38 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        40 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        42 => array(
            'don_gia' => '10,000,000',
            'lap_dat' => '8,000,000',
            'van_chuyen' => '8,000,000'
        ),
        44 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        46 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        48 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        50 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        52 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        54 => array(
            'don_gia' => '11,000,000',
            'lap_dat' => '9,000,000',
            'van_chuyen' => '9,000,000'
        ),
        56 => array(
            'don_gia' => '12,000,000',
            'lap_dat' => '10,000,000',
            'van_chuyen' => '10,000,000'
        ),
        58 => array(
            'don_gia' => '12,000,000',
            'lap_dat' => '10,000,000',
            'van_chuyen' => '10,000,000'
        ),
        60 => array(
            'don_gia' => '12,000,000',
            'lap_dat' => '10,000,000',
            'van_chuyen' => '10,000,000'
        ),
    );
}