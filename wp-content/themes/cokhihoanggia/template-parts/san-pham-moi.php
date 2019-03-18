<div id="ml-block-824-10" class="ml-block ml-block-ml_blog ml_span12 ml-first clearfix">
                    <div class="widgetwrap widgetwrap-alt homeblog" style="<?php if(!is_page('san-pham')) {echo 'padding:60px 0;';}?>">
                        <?php if(!is_page('san-pham')) {?>
                        <div class="block_bg" style="background-color:#eaeaea;"></div>
                        <?php }?>
                        <h2 class="block"  style="color:#222;">

                            <span class="subtitle" style="color:#222;">Các sản phẩm giàn giáo</span>

                            <span class="maintitle" style="background-color:#eaeaea;">GIÀN GIÁO XÂY DỰNG</span>

                        </h2>
                        <!-- end title section-->

                        <div class="blogger">

                            <?php
                                $args = array(
                                    'post_type'           => 'gian-giao-nem',
                                    'post_status'         => 'publish',
                                    'posts_per_page'      => 16,
                                );
                                    $loop = new WP_Query( $args );
                                    if ( $loop->have_posts() ) {
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                        $feature_image_id = get_post_thumbnail_id(get_the_ID());
                                        $feature_image_meta = wp_get_attachment_image_src($feature_image_id, '32');
                              ?>

                            <div class="item classic-small ghost p-border tranz post-587 post type-post status-publish format-standard has-post-thumbnail hentry category-news">

                                <div class="entryhead">


                                    <div class="imgwrap">




                                        <a href="<?php echo get_the_permalink(get_the_ID())?>">
                                            <img width="353" height="297" src="<?php echo $feature_image_meta[0] ?>" class="standard grayscale grayscale-fade wp-post-image" alt="" />                            </a>


                                    </div>

                                </div><!-- end .entryhead -->

                                <div class="item_inn tranz">


                                    <p class="meta cat tranz ">

                                    <h3><a href="<?php echo get_the_permalink(get_the_ID())?>"><b><?php echo get_the_title(get_the_ID())?></b></a></h3>

                                    <p class="teaser"> <?php
                                         echo wp_trim_words( get_the_content(get_the_ID()), 20, '...' );
                                     ?></p>


                                    <p class="meta_more">
                                        <a href="<?php echo get_the_permalink(get_the_ID())?>">Chi tiết</a>
                                    </p>

                                </div>

                            </div>
                        <?php endwhile;
                          } else {
                            echo __( 'No products found' );
                          }
                          wp_reset_postdata();
                        ?>



                        </div><!-- end latest posts section-->

                        <div class="clearfix"></div>

                    </div><!-- end #core -->

                    <div class="clearfix"></div>

                </div>
