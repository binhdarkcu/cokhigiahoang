<?php
require_once('../../../../wp-load.php');
if(current_user_can('manage_options')){
    $_table = $wpdb->prefix."bao_gia";
    $query = "DELETE FROM $_table WHERE is_deleted = 1";
    $result = $wpdb->query($query);
    
    if(false === $result){
        header('HTTP/1.0 500 Internal Server Error');
        die();
    }else{
        echo json_encode(array('total' => $result));
        die();
    }
}else{
    header('HTTP/1.0 401 Unauthorized');
    die();
}