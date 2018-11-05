<?php
    $action = 'view';
    global $wpdb;

    if (isset ( $_GET ['action'] ) and $_GET ['action'] != '') {
        $action = trim ( $_GET ['action'] );

        //delete a video
        if (strtolower ( $action ) == strtolower ( 'delete' )) {
            $retrieved_nonce = '';

        if(isset($_GET['nonce']) and $_GET['nonce']!=''){

            $retrieved_nonce=$_GET['nonce'];

        }

        if (!wp_verify_nonce($retrieved_nonce, 'delete_video' ) ){
            wp_die('Security check fail');
        }

        $uploads = wp_upload_dir();
        $baseDir = $uploads ['basedir'];
        $baseDir = str_replace ( "\\", "/", $baseDir );
        $pathToVideosFolder = $baseDir . '/uploaded-videos';

        $location = "admin.php?page=manage-videos";
        $deleteId = ( int ) htmlentities(strip_tags($_GET ['id']),ENT_QUOTES);

         try {

                 $query = "SELECT * FROM " . $wpdb->prefix . "videos WHERE id=$deleteId";
                 $myrow = $wpdb->get_row ( $query );

                 if (is_object ( $myrow )) {

                         $video_name = $myrow->download_name;
                         $wpcurrentdir = dirname ( __FILE__ );
                         $wpcurrentdir = str_replace ( "\\", "/", $wpcurrentdir );
                         $videoToDel = $pathToVideosFolder . '/' . $video_name;
                         $imageToDel = $pathToVideosFolder . '/' . $myrow->thumbnail;
                         @unlink ($videoToDel);
                         @unlink ($imageToDel);

                         $query = "DELETE FROM  " . $wpdb->prefix . "videos WHERE id=$deleteId";
                         $wpdb->query ( $query );
                         
                         //delete associated post
                         wp_delete_post($myrow->post_id, true);

                 }
         } catch ( Exception $e ) {

                 $responsive_video_grid_messages = array();
                 $responsive_video_grid_messages ['type'] = 'err';
                 $responsive_video_grid_messages ['message'] = 'Error while deleting video.';
         }
            echo "<script type='text/javascript'> location.href='$location';</script>";
            exit();

        //delete mutilple videos
        } else if (strtolower ( $action ) == strtolower ( 'deleteselected' )) {


//              if(!check_admin_referer('action_settings_mass_delete','mass_delete_nonce')){
//
//                    wp_die('Security check fail');
//               }

		$location = "admin.php?page=manage-videos";

		if (isset ( $_POST ) and isset ( $_POST ['deleteselected'] ) and $_POST ['action_upper'] == 'delete') {

			$uploads = wp_upload_dir();
			$baseDir = $uploads ['basedir'];
			$baseDir = str_replace ( "\\", "/", $baseDir );
			$pathToVideosFolder = $baseDir . '/uploaded-videos';

			if (sizeof ( $_POST ['thumbnails'] ) > 0) {
				$deleteto = $_POST ['thumbnails'];
				$implode = implode ( ',', $deleteto );

				try {

					foreach ( $deleteto as $video ) {

						$query = "SELECT * FROM " . $wpdb->prefix . "videos WHERE id=$video";
						$myrow = $wpdb->get_row ( $query );

						if (is_object ( $myrow )) {

							$video_name = $myrow->download_name;
							$wpcurrentdir = dirname ( __FILE__ );
							$wpcurrentdir = str_replace ( "\\", "/", $wpcurrentdir );
                                                        $videotoDel = $pathToVideosFolder . '/' . $video_name;
                                                        $imageToDel = $pathToVideosFolder . '/' . $myrow->thumbnail;

                                                        @unlink ( $videotoDel );
                                                        @unlink ($imageToDel);

							$query = "DELETE FROM " . $wpdb->prefix . "videos WHERE id=$video";
							$wpdb->query ( $query );
                                                        //delete associated post
                                                        
                                                        wp_delete_post($myrow->post_id, true);
                                                        
							$responsive_video_grid_messages = array();
							$responsive_video_grid_messages ['type'] = 'succ';
							$responsive_video_grid_messages ['message'] = 'selected videos deleted successfully.';
						}
					}
				} catch ( Exception $e ) {

					$responsive_video_grid_messages = array();
					$responsive_video_grid_messages ['type'] = 'err';
					$responsive_video_grid_messages ['message'] = 'Error while deleting videos.';
				}

				echo "<script type='text/javascript'> location.href='$location';</script>";
				exit();
			} else {

				echo "<script type='text/javascript'> location.href='$location';</script>";
				exit();
			}
                }
        }else if (strtolower ( $action ) == strtolower ( 'changepublishstatus' )){
                $location = "admin.php?page=manage-videos";
                $videoId = ( int ) htmlentities(strip_tags($_GET ['id']),ENT_QUOTES);

                 try {

                         $query = "SELECT * FROM " . $wpdb->prefix . "videos WHERE id=$videoId";
                         $myrow = $wpdb->get_row ( $query );

                         if (is_object ( $myrow )) {

                                 $query = "UPDATE " . $wpdb->prefix . "videos SET is_published = NOT is_published WHERE id=$videoId";
                                 $wpdb->query ( $query );
                         }
                 } catch ( Exception $e ) {

                         $responsive_video_grid_messages = array();
                         $responsive_video_grid_messages ['type'] = 'err';
                         $responsive_video_grid_messages ['message'] = 'Error while editting video.';
                 }
                    echo "<script type='text/javascript'> location.href='$location';</script>";
                    exit();
        }
    }

?>

<script type="text/javascript">
function  confirmDelete_bulk(){
    var topval=document.getElementById("action_upper").value;
    if(topval=='delete'){
    var agree=confirm("Are you sure you want to delete selected videos ?");
    if (agree)
        return true ;
    else
        return false;
    }
}

function  confirmDelete(){
    var agree=confirm("Are you sure you want to delete this video ?");
    if (agree)
        return true ;
    else
        return false;
}
jQuery(document).ready(function(){
    // jQuery('#video-player').mediaelementplayer(/* Options */);

    jQuery ('.show-video').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in',
            callbacks: {
                close: function() {
                    jQuery('.mejs-offscreen, .mejs-container').remove();
                },
                beforeOpen: function(){
                    var videoSrc = this.st.el.data('src');
                    jQuery('<video>', {
                        id: 'video-player',
                        src: videoSrc,
                        width: 640,
                        height: 360
                    }).appendTo('#video-player-popup');

                    jQuery('#video-player').mediaelementplayer();
                }
            }
    });
})
</script>
<div id="video-list">
    <h2>Uploaded Videos</h2>
    <form method="POST" action="admin.php?page=manage-videos&action=deleteselected">
        <div class="alignleft actions">
            <select name="action_upper" id="action_upper">
                    <option selected="selected" value="-1">Bulk Actions</option>
                    <option value="delete">delete</option>
            </select>
            <input type="submit" value="Apply"
                    class="button-secondary action" id="deleteselected"
                    name="deleteselected" onclick="return confirmDelete_bulk();">
        </div>
    <br class="clear"/>
    <br/>
    <div id="no-more-tables">
    <table cellspacing="0" id="gridTbl" class="table-bordered table-striped table-condensed cf">
            <thead>
                    <tr>
                        <th class="manage-column column-cb check-column" scope="col"><input type="checkbox"></th>
                        <th>Renter Name</th>
                        <th><span><?php echo _('Video Title')?></span></th>
                        <th><span><?php echo _('Thumbnail');?></span></th>
                        <th><span><?php echo _('Video Format');?></span></th>
                        <th><span><?php echo _('Duration'); ?></span></th>
                        <th><span><?php echo _('Created date');?></span></th>
                        <th><span><?php echo _('Publish action'); ?></span></th>
                        <th><span><?php echo _('Action');?></span></th>
                    </tr>
            </thead>

            <tbody id="the-list">
        <?php
            global $wpdb;

            $current_user = wp_get_current_user();
            if(current_user_can('administrator')) {
                $query = "SELECT * FROM " . $wpdb->prefix . "videos  ORDER BY created_date desc";
            } else {
                $query = "SELECT * FROM " . $wpdb->prefix . "videos  WHERE user_id = $current_user->ID ORDER BY created_date desc";
            }
            $rows = $wpdb->get_results ( $query, 'ARRAY_A' );

            $delRecNonce = wp_create_nonce('delete_video');
            $publishVideoNonce = wp_create_nonce('publish_video_nonce');
            $uploadUri = site_url().'/wp-content/uploads/uploaded-videos/';
            $videoUrl = site_url().'/wp-content/plugins/video-management/api/get_video.php';
        ?>

        <?php foreach ($rows as $row) :
            if($row["user_id"] !=0) {
                $userInfo = get_userdata($row["user_id"]);
            } else {
                $userInfo = get_userdata(1);
            }
        ?>
            <tr valign="top" class="" id="">
                <td class="alignCenter check-column" data-title="Select Record"><input
                        type="checkbox" value="<?php echo $row['id'] ?>"
                        name="thumbnails[]"></td>
                <td data-title="Id" class="alignCenter"><?php echo $userInfo->user_nicename; ?></td>
                <td data-title="Name" class="alignCenter"><a href="#video-player-popup" class="show-video" data-src="<?php echo $videoUrl.'?vid='.$row['id'];?>"><?php echo $row['display_name'] ;?></a></td>
                <td data-title="Thumbnail" class="alignCenter"><img class="admin-video-thumbnail" src="<?php echo $uploadUri.$row['thumbnail'];?>"/></td>
                <td data-title="Format" class="alignCenter"><?php echo $row['video_format']; ?></td>
                <td data-title="Duration" class="alignCenter"><?php echo $row['duration']; ?></td>
                <td data-title="Updated Date" class="alignCenter"><?php echo $row['created_date']; ?></td>
                <td data-title="Publish action" class="alignCenter"><a href="<?php echo "admin.php?page=manage-videos&action=changePublishStatus&id=".$row['id']."&nonce=$publishVideoNonce"?>" title="<?php echo $row['is_published'] ? _e('Unpublish'):_e('Publish');?> <?php echo _e('this video')?>"><?php echo $row['is_published'] ? _e('Unpublish'):_e('Publish');?></a></td>
                <td data-title="Delete" class="alignCenter"><a href="<?php echo "admin.php?page=manage-videos&action=delete&id=".$row['id']."&nonce=$delRecNonce"?>" onclick="return confirmDelete();" title="delete">Delete</a></td>
            </tr>

        <?php endforeach;?>

         </tbody>
        </table>
    </form>
</div>
    <div id="video-player-popup" class="mfp-hide">
<!--        <video id="video-player" width="640" height="360" src=""></video>-->
    </div>
</div>
