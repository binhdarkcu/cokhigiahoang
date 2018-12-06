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
                      <a href="<?php echo HOME_URL;?>"><i class="fa fa-home"></i>  <i class='fa fa-angle-right'></i>
        Trang chủ<i class='fa fa-angle-right'></i></a> <i class='fa fa-angle-right'></i> <?php the_title();?></div>

              </div>

          </div>

        <div class="container container_alt">

        <div id="core">

        <div class="postbarLeft">

        <div id="content" class="eightcol first">

            <div class="post-544 page type-page status-publish hentry">

                <div class="item_inn tranz p-border ghost">

                    <div class="entry pageentry" style="padding: 0 16px!important;">
                        <div class="col-sm-12">

                            <div class="product-information response-area">

                                <h2 class="box-title" style="background-color: #017bc4;color: #fff;line-height: 35px;padding-left: 10px;font-weight: 700;font-size: 17px;margin-bottom: 20px;text-transform: uppercase;"><?php the_title();?></h2>

                                <div class="twelvecol" style="padding-left: 0;">
                                    <ul class="media">
                                        <?php
                                            $args = array(
                                                'post_type'           => 'cac-tin-tuc',
                                                'post_status'         => 'publish',
                                                'posts_per_page'      => 10
                                            );
                                                $loop = new WP_Query( $args );
                                                if ( $loop->have_posts() ) {
                                                    while ( $loop->have_posts() ) : $loop->the_post();
                                                    $feature_image_id = get_post_thumbnail_id(get_the_ID());
                                                    $feature_image_meta = wp_get_attachment_image_src($feature_image_id, '32');
                                          ?>
                                        <li class="media"><a class="pull-left" href="<?php echo get_the_permalink(get_the_ID())?>"><img class="media-object" src="<?php echo $feature_image_meta[0] ?>" alt="<?php echo get_the_title(get_the_ID())?>"></a><div class="media-body">
                                            <ul class="sinlge-post-meta"><div class="other-blog-title"><strong>
                                                <a href="<?php echo get_the_permalink(get_the_ID())?>"><?php echo get_the_title(get_the_ID())?></a></strong></div>
                                                <li><i class="fa fa-user"></i> <?php echo get_the_author(get_the_ID())?></li><li><i class="fa fa-clock-o"></i><?php echo get_the_time( 'H:i:s A', get_the_ID()); ?></li><li><i class="fa fa-calendar"></i><?php echo get_the_date('d/m/Y', get_the_ID());?></li></ul>
                                                <p>    <?php
                                                        echo wp_trim_words( get_the_content(get_the_ID()), 30, '...' );
                                                    ?></p></div></li>
                                    <?php endwhile;
                                      } else {
                                        echo __( 'No products found' );
                                      }
                                      wp_reset_postdata();
                                ?>
                                    </ul>
                                </div>
                                <div class="clear"></div>
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

        <?php get_sidebar();?>

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
