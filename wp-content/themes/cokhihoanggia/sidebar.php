<div id="sidebar"  class="fourcol woocommerce">


        <div class="widgetable">
            <?php
                global $wpdb;
                $query_van_thang_long = $wpdb->get_results("SELECT * FROM wp_postmeta WHERE (meta_key = 'wpcf-loai-van-thang' AND meta_value = 2)");
                $query_van_thang_hang = $wpdb->get_results("SELECT * FROM wp_postmeta WHERE (meta_key = 'wpcf-loai-van-thang' AND meta_value = 1)");
                $query_gian_giao = wp_count_posts( 'gian-giao-nem' )->publish;
            ?>
            <div class="menu-services-menu-container">
                <ul id="menu-services-menu" class="menu">
                    <?php
                    $isInfoTemplate = is_page_template( 'page-thong-tin-cong-ty.php' );
                    if($isInfoTemplate) {
                    ?>
                    <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544 menu-item-783"><a>THÔNG TIN CÔNG TY</a></li>
                    <?php
                    if ( $page = get_page_by_path( 'thong-tin-cong-ty' ) ){
                      wp_list_pages( 'orderby=name&depth=1&order=DESC&show_count=0&child_of=' .$page->ID . '&title_li=' );
                    }
                    ?>
                    <?php }?>
                    <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544 menu-item-783"><a>SẢN PHẨM</a></li>
                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/san-pham/?slug=van-thang-long">Vận thăng lồng (<?php echo count($query_van_thang_long);?>)</a></li>
                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/san-pham/?slug=van-thang-hang">Vận thăng hàng (<?php echo count($query_van_thang_hang);?>)</a></li>
                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/san-pham/?slug=gian-giao-nem">Giàn giáo xây dựng (<?php echo $query_gian_giao;?>)</a></li>

                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841">&nbsp;</li>
                    <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544  menu-item-783"><a>HỖ TRỢ ONLINE</a></li>
                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="tel: 0903370117"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/so_phone.png" style="height: 40px;width: 40px;float: left;margin-right: 5px;padding: 2px;"/>Mr. Hòa <br/>(090.337.0117)</a></li>

                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841">&nbsp;</li>
                    <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544 menu-item-783"><a>DỊCH VỤ</a></li>
                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/san-pham/?slug=van-thang-hang"><img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/3.jpg"/></a></li>

                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841">&nbsp;</li>
                    <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544 current_page_item menu-item-783"><a>TIN TỨC</a></li>
                    <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/san-pham/?slug=van-thang-hang">Updading...</a></li>
                </ul>
</div>
        </div>


</div><!-- #sidebar -->
