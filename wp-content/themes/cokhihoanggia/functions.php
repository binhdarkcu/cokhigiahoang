<?php

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
    var_dump($bao_gia);
    die();
    //default messages
    $result = array(
        'message' => $test,
        'status' => 'OK'
    );

    echo json_encode($result);
    // Don't forget to stop execution afterward.
    wp_die();
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

    if ($baoGia['loai_sp'] === 'Giàn giáo') {
        $baoGia = calculateDataForGianGiao($baoGia);
    }

    echo json_encode($baoGia, JSON_UNESCAPED_UNICODE);
    wp_die();
}

//*
// SUPPORT FUNCTIONS
//*/


function convertToNumber($string) {
    return (int) str_replace(',', '', $string);
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
                $baoGia['tong_don_gia' . $index] = number_format(convertToNumber($formGianGiao[$key]['don_gia']) * $value);
            }
        }
    }

    $baoGia['tong_trong_luong'] = getTotalWeight($baoGia);
    $baoGia['phi_van_chuyen'] = number_format(1200 * $baoGia['tong_trong_luong']);
    $baoGia['tong_don_gia_thiet_bi'] = number_format(getTotalPriceBeforeTax($baoGia));
    $baoGia['tong_don_gia_truoc_thue'] = number_format(convertToNumber($baoGia['tong_don_gia_thiet_bi']) + convertToNumber($baoGia['phi_van_chuyen']));
    $baoGia['vat'] = number_format(convertToNumber($baoGia['tong_don_gia_truoc_thue']) * 0.1);
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

// Get total weight
function getTotalWeight($data) {
    $totalWeight = 0;
    foreach ($data as $key => $value) {
        if (substr($key, 0, 16) === 'tong_trong_luong' && strlen($key) > 16) {
            $totalWeight += $value;
        }
    }
    return $totalWeight;
}

// Gian giao data structure
function getGianGiaoFormData() {
    return array(
        'so_luong2' => [
            'trong_luong' => 7.4,
            'don_gia' => '148,000'
        ],
        'so_luong3' => [
            'trong_luong' => 5.8,
            'don_gia' => '116,000'
        ],
        'so_luong4' => [
            'trong_luong' => 4.35,
            'don_gia' => '87,000'
        ],
        'so_luong5' => [
            'trong_luong' => 3.15,
            'don_gia' => '63,000'
        ],
        'so_luong6' => [
            'trong_luong' => 1.1,
            'don_gia' => '22,000'
        ],
        'so_luong7' => [
            'trong_luong' => 1.34,
            'don_gia' => '27,000'
        ],
        'so_luong8' => [
            'trong_luong' => 2.05,
            'don_gia' => '41,000'
        ],
        'so_luong9' => [
            'trong_luong' => 2.46,
            'don_gia' => '50,000'
        ],
        'so_luong10' => [
            'trong_luong' => 3.02,
            'don_gia' => '61,000'
        ],
        'so_luong11' => [
            'trong_luong' => 3.02,
            'don_gia' => '61,000'
        ],
        'so_luong12' => [
            'trong_luong' => 8.27,
            'don_gia' => '166,000'
        ],
        'so_luong13' => [
            'trong_luong' => 2,
            'don_gia' => '40,000'
        ],
        'so_luong14' => [
            'trong_luong' => 2.3,
            'don_gia' => '46,000'
        ],
        'so_luong15' => [
            'trong_luong' => 2,
            'don_gia' => '40,000'
        ],
        'so_luong16' => [
            'trong_luong' => 2.3,
            'don_gia' => '46,000'
        ],
        'so_luong17' => [
            'trong_luong' => 9.17,
            'don_gia' => '184,000'
        ],
        'so_luong18' => [
            'trong_luong' => 20.96,
            'don_gia' => '420,000'
        ],
        'so_luong19' => [
            'trong_luong' => 14.08,
            'don_gia' => '386,000'
        ],
        'so_luong20' => [
            'trong_luong' => 0.5,
            'don_gia' => '15,000'
        ],
    );
}
