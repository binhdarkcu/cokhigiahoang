<?php
$query = new WP_Query(array(
    'post_type' => 'slider',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'ASC',
));
?>
<div class="mainflex flexslider loading">
    <div class="loading-inn"><i class="fa fa-circle-o-notch fa-spin"></i></div>
    <ul class="slides" >
        <?php while ($query->have_posts()): ?>
            <?php
            $query->the_post();
            $post_id = get_the_ID();
            $post_content = get_the_content();
            $image_url = wp_extract_urls($post_content);
            $url_slider = get_post_custom_values('wpcf-url-cua-slider', $post_id);
            $url_1 = get_post_custom_values('wpcf-url-1', $post_id);
            $url_2 = get_post_custom_values('wpcf-url-2', $post_id);
            $url_1_name = get_post_custom_values('wpcf-noi-dung-url-1', $post_id);
            $url_2_name = get_post_custom_values('wpcf-noi-dung-url-2', $post_id);
            $subheading = get_post_custom_values('wpcf-tieu-de-phu-cua-slider', $post_id);
            $slider_description = get_post_custom_values('wpcf-mo-ta-cua-slider', $post_id);
            ?>
            <li>
                <a href="<?php echo $url_slider[0]; ?>" title="<?php echo $subheading[0];?>" >
                    <img width="1600" height="620" src="<?php echo $image_url[0];?>" class="tranz wp-post-image" alt="" />
                </a>
                <?php if($subheading || $slider_description): ?>
                    <div class="flexinside rad tranz content_Left">
                        <h2><a href="" title="<?php echo $subheading[0]; ?>" > <?php echo $subheading[0]; ?> </a></h2>
                        <div class="flexinside-inn">
                            <p> <?php echo $slider_description[0]; ?></p>
                            <p>&nbsp;</p>
                            <a href="<?php echo $url_1[0]; ?>" class="su-button su-button-style-flat bold" style="color:#343434;background-color:#fec24b;border-color:#cb9b3c;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px" target="_self"><span style="color:#343434;padding:6px 16px;font-size:13px;line-height:20px;border-color:#fed481;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"><i class="fa fa-clock-o" style="font-size:13px;color:#414141"></i> <?php echo $url_1_name[0];?> </span></a>
                            <a href="<?php echo $url_2[0]; ?>" class="su-button su-button-style-flat bold" style="color:#535353;background-color:#EFEFEF;border-color:#bfbfbf;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px" target="_self"><span style="color:#535353;padding:6px 16px;font-size:13px;line-height:20px;border-color:#f4f4f4;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;text-shadow:none;-moz-text-shadow:none;-webkit-text-shadow:none"><i class="fa fa-desktop" style="font-size:13px;color:#414141"></i> <?php echo $url_2_name[0];?></span></a>
                        </div>
                    </div>
                <?php endif;?>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<?php wp_reset_query();?>