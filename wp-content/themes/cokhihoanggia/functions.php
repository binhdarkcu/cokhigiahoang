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
        if($action == 'delete'){
            $query = "UPDATE " . $wpdb->prefix . "bao_gia SET is_deleted=1 WHERE id=" . $id;
        }else if($action == 'update' && $status){
            $query = "UPDATE " . $wpdb->prefix . "bao_gia SET status = '" . $status . "' WHERE id=" . $id;
        }
        $wpdb->query($query);
        $response['status'] = $query;
    }
    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    wp_die();
}
