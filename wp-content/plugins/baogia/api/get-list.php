<?php
require_once('../../../../wp-load.php');
$data = [];
if(current_user_can('manage_options')){
    $length = filter_input(INPUT_GET, "length", FILTER_SANITIZE_STRING);
    $start = filter_input(INPUT_GET, "start", FILTER_SANITIZE_STRING);
    $draw = (int)filter_input(INPUT_GET, "draw", FILTER_SANITIZE_STRING);
    $search = filter_input(INPUT_GET, "search", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $order = filter_input(INPUT_GET, "order", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $dontShowSeen = filter_input(INPUT_GET, "dontShowSeen", FILTER_SANITIZE_STRING);
    $dontShowDone = filter_input(INPUT_GET, "dontShowDone", FILTER_SANITIZE_STRING);
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



    $_table = $wpdb->prefix . "bao_gia";
    $query = "SELECT * FROM $_table WHERE is_deleted = 0 ";
    
    if($order[0]['column'] && $order[0]['dir']){
        $_o = $order_options[$order[0]['column']];
        $_dir = strtolower($order[0]['dir']) === 'asc' ? 'ASC':'DESC';
        $order_by = " ORDER BY $_o $_dir";
    }
    // Filter out Seen and Done orders
    $dontShowDone &&  $where.= " AND status != 'Hoàn thành' ";
    $dontShowSeen && $where.= " AND status != 'Đã xem' ";
    
    if(trim($search['value'])){
        $_s = '%'.$search['value'].'%';
        $where .= $wpdb->prepare(" AND (full_name LIKE %s OR phone_number LIKE %s OR company LIKE %s OR email LIKE %s OR status LIKE %s) ", $_s, $_s,$_s,$_s,$_s);
    }
    
    // Limit length of data to 100
    if($length > 100){
        $length = 100;
    }
    
    $limit = $wpdb->prepare(" LIMIT %d OFFSET %d", $length, $start);

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
