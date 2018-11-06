
<div id="video-list">
    <h2>Báo giá</h2>
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
                        <th><span><?php echo _('Họ tên')?></span></th>
                        <th><span><?php echo _('Số điện thoại');?></span></th>
                        <th><span><?php echo _('Email');?></span></th>
                        <th><span><?php echo _('Công ty'); ?></span></th>
                        <th><span><?php echo _('Trạng thái');?></span></th>
                        <th><span><?php echo _('Ngày tạo'); ?></span></th>
                        <th><span><?php echo _('Xem chi tiết');?></span></th>
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
</div>
