<?php
$my_postid = get_the_ID();//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
//echo $content;
?>

<?php get_header();?>
<?php
    while ( have_posts() ) : the_post();
        $meta_values = get_post_type( $my_postid );
        $post = get_post(get_the_ID());
        $bigImg = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
?>
<body class="home page-template page-template-homepage page-template-homepage-php page page-id-596 woocommerce-no-js">

    <div class="wrapper upper modern-header">

        <?php get_template_part("template-parts/header") ?>
        <div class="page-header p-border">
              <div class="titlewrap container">

                  <h1 class="entry-title dekoline"><?php the_title();?></h1>

                  <div class="page-crumbs">
                      <a href="<?php echo HOME_URL;?>"><i class="icon-home"></i>  <i class='fa fa-angle-right'></i>
        Trang chủ<i class='fa fa-angle-right'></i></a> <i class='fa fa-angle-right'></i> <a href="<?php echo HOME_URL?>/san-pham">Sản phẩm</a>
        <i class='fa fa-angle-right'></i>
        <?php if($meta_values === 'van-thang') {
            echo 'Vận Thăng';
        } else if($meta_values === 'gian-giao-nem'){
            echo 'Giàn giáo';
        }
        ?></div>

              </div>

          </div>

        <div class="container container_alt">

        <div id="core">

        <div class="postbarLeft">

        <div id="content" class="eightcol first">

            <div class="post-544 page type-page status-publish hentry">

                <div class="item_inn tranz p-border ghost">

                    <div class="entry pageentry" style="padding-top: 0!important;">
                        <div class="col-sm-12">
                            <div class="product-information">
                                <h2 class="box-title" style="background-color: #017bc4;color: #fff;line-height: 35px;padding-left: 10px;font-family: roboto;font-weight: 700;font-size: 17px;margin-bottom: 20px;text-transform: uppercase;">Chi tiết sản phẩm</h2>
                                <div class="fourcol">
                                    <div class="row">
                                        <div class="product-img">
                                            <div class="product-img-thumbnail">
                                                <a class="fancybox" href="<?php echo $bigImg;?>" title="Bảng báo giá phụ kiện hệ giàn giáo Ringlock"><img src="<?php echo $bigImg;?>" alt="Bảng báo giá phụ kiện hệ giàn giáo Ringlock"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="eightcol" style="padding-left: 20px;">
                                    <h1 style="margin-top: 0; color: #017bc4;font-size: 30px;"><?php the_title();?></h1>
                                    <p><b>Mã sản phẩm:</b> 000100</p>
                                    <span class="product-infomation-price">
                                        <span style="color: #017bc4;float: left; width: 100%; padding-bottom: 15px;font-family: Roboto,sans-serif;font-size: 25px;font-weight: 700;margin-right: 20px;">Giá: LIÊN HỆ</span>
                                    </span>
                                    <p><b>Trạng thái:</b> Còn hàng</p>
                                    <p><b>Xuất xứ:</b> Trung Quốc</p>
                                    <p><b>Loại sản phẩm:</b><?php if($meta_values === 'van-thang') {
                                        echo 'Vận Thăng';
                                    } else if($meta_values === 'gian-giao-nem'){
                                        echo 'Giàn giáo';
                                    } ?> </p>
                                    <div class="share-button">
                                        <div class="addthis_native_toolbox" data-url="<?php the_permalink();?>" data-title="<?php the_title();?>" data-description="<?php echo wp_trim_words( get_the_content(the_ID()), 20, '...' );?>"><div id="atstbx" class="at-share-tbx-element at-share-tbx-native addthis_default_style addthis_20x20_style addthis-smartlayers addthis-animated at4-show"><a class="addthis_button_tweet at_native_button at300b"><div class="tweet_iframe_widget" style="width: 62px; height: 25px;"><span>
                                            <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" style="position: static; visibility: visible; width: 60px; height: 20px;" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.53652c702a2e752df1a75e4b2ec51f45.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=<?php the_permalink();?>&amp;size=m&amp;text=B%E1%BA%A3ng%20b%C3%A1o%20gi%C3%A1%20ph%E1%BB%A5%20ki%E1%BB%87n%20h%E1%BB%87%20gi%C3%A0n%20gi%C3%A1o%20Ringlock%3A&amp;time=1541406772560&amp;type=share&amp;url=http%3A%2F%2Fcokhigiahoang.com%2Fsan-pham%2Fgian-giao-xay-dung-8%2Fbang-bao-gia-phu-kien-he-gian-giao-ringlock-100%23.W-AAFJK-jjg.twitter" data-url="<?php the_permalink();?>#.W-AAFJK-jjg.twitter"></iframe></span></div></a><a class="addthis_button_facebook_like at_native_button at300b" fb:like:layout="button_count"><div class="fb-like fb_iframe_widget" data-layout="button_count" data-show_faces="false" data-share="false" data-action="like" data-width="90" data-height="25" data-font="arial" data-href="<?php the_permalink();?>" data-send="false" style="height: 25px;" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=172525162793917&amp;container_width=0&amp;font=arial&amp;height=25&amp;href=http%3A%2F%2Fcokhigiahoang.com%2Fsan-pham%2Fgian-giao-xay-dung-8%2Fbang-bao-gia-phu-kien-he-gian-giao-ringlock-100&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90"><span style="vertical-align: bottom; width: 67px; height: 20px;">

                                                <iframe name="f223b79daaba7e8" width="90px" height="25px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.6/plugins/like.php?action=like&amp;app_id=172525162793917&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F__Bz3h5RzMx.js%3Fversion%3D42%23cb%3Df189a2c904fdbe4%26domain%3Dwww.cokhigiahoang.com%26origin%3Dhttp%253A%252F%252Fwww.cokhigiahoang.com%252Ff15690a65d82c68%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;height=25&amp;href=http%3A%2F%2Fcokhigiahoang.com%2Fsan-pham%2Fgian-giao-xay-dung-8%2Fbang-bao-gia-phu-kien-he-gian-giao-ringlock-100&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90" style="border: none; visibility: visible; width: 67px; height: 20px;" class=""></iframe></span></div></a><a class="addthis_button_google_plusone at_native_button at300b" g:plusone:size="medium"><div class="google_plusone_iframe_widget" style="width: 90px; height: 25px;"><span><div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1541406772365" name="I0_1541406772365" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;hl=en-US&amp;origin=http%3A%2F%2Fwww.cokhigiahoang.com&amp;url=http%3A%2F%2Fcokhigiahoang.com%2Fsan-pham%2Fgian-giao-xay-dung-8%2Fbang-bao-gia-phu-kien-he-gian-giao-ringlock-100&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.6bGVJre0rgM.O%2Fam%3DQQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPstdIIqEPSDP83kdMsJYTx3TNRVQ%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh&amp;id=I0_1541406772365&amp;_gfid=I0_1541406772365&amp;parent=http%3A%2F%2Fwww.cokhigiahoang.com&amp;pfname=&amp;rpctoken=12330904" data-gapiattached="true" title="G+"></iframe></div></span></div></a><div class="atclear"></div></div></div>
                                    </div>

                                </div>
                                <div class="clear"></div>
                                <div class="features_items" style="margin-top: 20px;">
                                    <h2 class="box-title" style="text-transform: uppercase;background-color: #017bc4;color: #fff;line-height: 35px;padding-left: 10px;font-family: roboto;font-weight: 700;font-size: 17px;margin: 0;">Thông tin sản phẩm</h2>
                                    <?php echo get_the_content(get_the_ID());?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="clearfix"></div>




        <div id="comments">

        <p class="nocomments">Comments are closed.</p>



        </div><!-- #comments -->

                </div><!-- .item_inn tranz p-border ghost -->

            </div>



                    <div class="clearfix"></div>

        </div><!-- #content -->

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
                            <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544 current_page_item menu-item-783"><a>SẢN PHẨM</a></li>
                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/van-thang/van-thang-long">Vận thăng lồng (<?php echo count($query_van_thang_long);?>)</a></li>
                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/van-thang/van-thang-hang">Vận thăng hàng (<?php echo count($query_van_thang_hang);?>)</a></li>
                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/gian-giao-nem">Giàn giáo xây dựng (<?php echo $query_gian_giao;?>)</a></li>

                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841">&nbsp;</li>
                            <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544 current_page_item menu-item-783"><a>HỖ TRỢ ONLINE</a></li>
                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="tel: 0903370117"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/so_phone.png" style="height: 40px;width: 40px;float: left;margin-right: 5px;padding: 2px;"/>Mr. Hòa <br/>(090.337.0117)</a></li>
                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="tel: 0938679117"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/so_phone.png" style="height: 40px;width: 40px;float: left;margin-right: 5px;padding: 2px;"/>Ms. Minh <br/>(0938 679 117)</a></li>

                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841">&nbsp;</li>
                            <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544 current_page_item menu-item-783"><a>DỊCH VỤ</a></li>
                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/van-thang/van-thang-hang"><img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/3.jpg"/></a></li>

                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841">&nbsp;</li>
                            <li id="menu-item-783" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-544 current_page_item menu-item-783"><a>TIN TỨC</a></li>
                            <li id="menu-item-841" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-841"><a href="<?php echo HOME_URL?>/van-thang/van-thang-hang">Updading...</li>
                        </ul>
    </div>
                </div>


        </div><!-- #sidebar -->

        </div><!-- .postbarLeft -->

        </div>


        </div><!-- /.container -->
    </div>
</body>
<?php endwhile; ?>

<style>
    .tweet_iframe_widget, .fb-like.fb_iframe_widget,.google_plusone_iframe_widget {
        float: left;
        margin-right: 5px;
    }
</style>
<?php get_template_part("template-parts/footer"); ?>
<?php get_footer();?>
