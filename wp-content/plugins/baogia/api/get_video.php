<?php
//require libs
require_once('../../../../wp-load.php');
require_once('../includes/VideoStream.php');

if(isset($_GET) && isset($_GET['vid'])){
    
    $videoId = ( int ) htmlentities(strip_tags($_GET ['vid']),ENT_QUOTES);
    
    try {
        $query = "SELECT * FROM " . $wpdb->prefix . "videos WHERE id=$videoId";
        
        //If not admin, only show videos have been published
        if(!current_user_can('administrator')){
            $query.=" AND is_published = TRUE";
        }
        
        $myrow = $wpdb->get_row ( $query );

        if (is_object ( $myrow )) {
                $uploads = wp_upload_dir();
                $baseDir = $uploads ['basedir'];
                $baseDir = str_replace ( "\\", "/", $baseDir );
                $pathToVideosFolder = $baseDir . '/uploaded-videos';
                $video_name = $myrow->download_name;
                $videoToStream = $pathToVideosFolder . '/' . $video_name;
                $stream = new VideoStream($videoToStream);
                $stream->start();
        }else{
            header('HTTP/1.0 404 Not Found', true, 404);
            die();
        }
    } catch ( Exception $e ) {
        header('HTTP/1.0 404 Not Found', true, 404);
        die();
    }
}
