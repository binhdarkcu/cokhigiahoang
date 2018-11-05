<?php
global $wpdb;
$query = "SELECT * FROM " . $wpdb->prefix . "videos  ORDER BY created_date desc";
$rows = $wpdb->get_results ( $query, 'ARRAY_A' );
$rowCount = sizeof ( $rows );

$uploadUri = site_url().'/wp-content/uploads/uploaded-videos/';
?>
<div id="video-grid-view">
    <?php foreach ($rows as $row):?>
    <div class="video-item">
        
    </div>
    <?php endforeach;?>
</div>


<!--<video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
       poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
    <source src="" type='video/mp4'>
    <source src="MY_VIDEO.webm" type='video/webm'>
    <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a web browser that
        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
</video>-->