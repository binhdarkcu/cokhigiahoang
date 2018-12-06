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

        <div id="content" class="eightcol first productPage">

            <div class="post-544 page type-page status-publish hentry">

                <div class="item_inn tranz p-border ghost">

                    <div class="entry pageentry" style="padding: 0!important;">
                        <div class="col-sm-12">
                            <div class="product-information">
                                <div class="twelvecol" style="padding-left: 0;">

                                    <?php  get_template_part("template-parts/what-we", "do");  ?>
                                    <?php  if($_GET["slug"] == 'gian-giao-nem') {
                                        get_template_part("template-parts/lastest", "news");
                                    } elseif(empty($_GET["slug"])) {
                                        get_template_part("template-parts/lastest", "news"); 
                                    }

                                     ?>
                                </div>
                                <div class="clear"></div>

                            </div>

                        </div>
                    </div>

                    <div class="clearfix"></div>


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
