<?php
require_once('../../../../wp-load.php');
$data = [];
if(current_user_can('manage_options')){
    $length = filter_input(INPUT_GET, "length", FILTER_SANITIZE_STRING);
    $start = filter_input(INPUT_GET, "start", FILTER_SANITIZE_STRING);
    $draw = (int)filter_input(INPUT_GET, "draw", FILTER_SANITIZE_STRING);
    $search = filter_input(INPUT_GET, "search", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $order = filter_input(INPUT_GET, "order", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    
    // Query
    $where = '';
    $order_by = '';
    
    $order_options = array(
        '1' => 'full_name',
        '2' => 'phone_number',
        '3' => 'email',
        '4' => 'company',
        '5' => 'created_date',
        '6' => 'status'
    );
//    echo json_encode($length);
//    die();
    
    $_table = $wpdb->prefix . "bao_gia";
    $query = "SELECT * FROM $_table WHERE is_deleted = 0 ";
    
    if($order[0]['column'] && $order[0]['dir']){
        $_o = $order_options[$order[0]['column']];
        $_dir = strtolower($order[0]['dir']) === 'asc' ? 'ASC':'DESC';
        $order_by = " ORDER BY $_o $_dir";
    }
    
    if(trim($search['value'])){
        $_s = $search['value'];
        $where = " AND (full_name LIKE '%$_s%' OR phone_number LIKE '%$_s%' OR company LIKE '%$_s%' OR email LIKE '%$_s%' OR status LIKE '%$_s%') ";
    }
    
 
    $limit = " LIMIT $length OFFSET $start";
    
    $query = $query.$where.$order_by.$limit;
    
//    echo $query;
//    die();
    
    $count_query = "SELECT (SELECT COUNT(*) FROM $_table WHERE is_deleted = 0 $where) AS records_filtered, COUNT(*) AS records_total FROM $_table WHERE is_deleted = 0 ";
    $wpdb->query($count_query);
    $num_rows = $wpdb->get_results($count_query, 'ARRAY_A');

    
    $wpdb->query($query);
    $rows = $wpdb->get_results($query, 'ARRAY_A');
    
    $data = array(
        'draw' => $draw,
        'recordsTotal' => $num_rows[0]['records_total'],
        'recordsFiltered' => $num_rows[0]['records_filtered'],
        'data' => $rows
    );
    
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
die();
