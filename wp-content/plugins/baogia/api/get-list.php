<?php
require_once('../../../../wp-load.php');
//$data = [
//    'draw' => 1,
//    'recordsTotal' => 1000,
//    'recordsFiltered' => 1000,
//    'data' => array(
//        array('hoten', 'sdt', 'email', 'cty', '2019-03-05', 'Đã xem', 'aaa'),
//        array('hoten', 'sdt', 'email', 'cty', '2019-03-05', 'Đã xem', 'aaa'),
//        array('hoten', 'sdt', 'email', 'cty', '2019-03-05', 'Đã xem', 'aaa'),
//        array('hoten', 'sdt', 'email', 'cty', '2019-03-05', 'Đã xem', 'aaa'),
//    )
//];

$data = [];
if(current_user_can('manage_options')){
    $length = filter_input(INPUT_GET, "length", FILTER_SANITIZE_STRING);
    $start = filter_input(INPUT_GET, "start", FILTER_SANITIZE_STRING);
    $draw = (int)filter_input(INPUT_GET, "draw", FILTER_SANITIZE_STRING);
    $search_value = filter_input(INPUT_GET,"search[value]", FILTER_SANITIZE_STRING);
    
    $query = "SELECT * FROM " . $wpdb->prefix . "bao_gia WHERE is_deleted = 0 ORDER BY created_date DESC";
    $wpdb->query($query);

    $rows = $wpdb->get_results($query, 'ARRAY_A');
    
    $data = array(
        'draw' => $draw,
        'recordsTotal' => 20,
        'recordsFiltered' => 20,
        'data' => $rows
    );
    
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
die();
