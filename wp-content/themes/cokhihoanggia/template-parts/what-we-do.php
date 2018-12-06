<div id="ml-block-824-2" class="ml-block ml-block-ml_mp_services ml_span12 ml-first clearfix">


                    <div class="widgetwrap" style="<?php if(is_page('san-pham')) {echo 'padding:0;';} else {echo 'padding: 60px 0;';}?>">

                        <div class="block_bg"  style="background-color:#F2F2F2;"></div>

                        <div class="container">

                            <h2 class="block"  style="color:#000;">

                                <span class="subtitle" style="color:#000;">Các sản phẩm nổi bật</span>

                                <span class="maintitle" style="background-color:#F2F2F2;">Vận Thăng Lồng</span>

                            </h2>
                            <!-- end title section-->

                            <div class="mp-wrap">
                                <ul class="mpbox col4  boxed">

                                    <?php
                                		$args = array(
                                			'post_type'           => 'van-thang',
                                			'post_status'         => 'publish',
                                            'posts_per_page'      => 10,
                                            'meta_query' => array(
                                                array(
                                                    'key'     => 'wpcf-loai-van-thang',
                                                    'value'   => 2,
                                                    'compare' => '='
                                                )
                                            )
                                    	);
                                    		$loop = new WP_Query( $args );
                                    		if ( $loop->have_posts() ) {
                                          	    while ( $loop->have_posts() ) : $loop->the_post();
                                                $feature_image_id = get_post_thumbnail_id(get_the_ID());
                                                $feature_image_meta = wp_get_attachment_image_src($feature_image_id, '32');
                                      ?>
                                        <li class="mp-services tranz">
                                            <div class="mp-inner tranz ">
                                                <h3>
                                                    <a href="<?php echo get_the_permalink(get_the_ID())?>"><b><?php echo get_the_title(get_the_ID())?></b></a>
                                                </h3>
                                                <div class="mp-service-media">
                                                    <a href="<?php echo get_the_permalink(get_the_ID())?>"><img width="255" height="197" src="<?php echo $feature_image_meta[0] ?>" class="service-thumb wp-post-image" alt="" /></a>
                                                </div>
                                                <p class="desc">
                                                <?php
                                                    echo wp_trim_words( get_the_content(get_the_ID()), 30, '...' );
                                                ?>
                                                </p>
                                                <a class="mp-more rad ribbon tranz" href="<?php echo get_the_permalink(get_the_ID())?>">Xem chi tiết <i class="fa fa-angle-right"></i>
                                                </a>

                                            </div>

                                        </li>
                                    <?php endwhile;
                                      } else {
                                        echo __( 'No products found' );
                                      }
                                      wp_reset_postdata();
                                ?>

                                </ul>
                            </div>
                            <div class="clearfix"></div>

                            <h2 class="block"  style="color:#000;">
                                <span class="maintitle" style="background-color:#F2F2F2;">Vận Thăng Hàng</span>
                            </h2>
                            <!-- end title section-->

                            <div class="mp-wrap">
                                <ul class="mpbox col4  boxed">

                                    <?php
                                		$args = array(
                                			'post_type'           => 'van-thang',
                                			'post_status'         => 'publish',
                                            'posts_per_page'      => 10,
                                            'meta_query' => array(
                                                array(
                                                    'key'     => 'wpcf-loai-van-thang',
                                                    'value'   => 1,
                                                    'compare' => '='
                                                )
                                            )
                                    	);
                                    		$loop = new WP_Query( $args );
                                    		if ( $loop->have_posts() ) {
                                          	    while ( $loop->have_posts() ) : $loop->the_post();
                                                $feature_image_id = get_post_thumbnail_id(get_the_ID());
                                                $feature_image_meta = wp_get_attachment_image_src($feature_image_id, '32');
                                      ?>
                                        <li class="mp-services tranz">
                                            <div class="mp-inner tranz ">
                                                <h3>
                                                    <a href="<?php echo get_the_permalink(get_the_ID())?>"><b><?php echo get_the_title(get_the_ID())?></b></a>
                                                </h3>
                                                <div class="mp-service-media">
                                                    <a href="<?php echo get_the_permalink(get_the_ID())?>"><img width="353" height="197" src="<?php echo $feature_image_meta[0] ?>" class="service-thumb wp-post-image" alt="" /></a>
                                                </div>
                                                <p>
                                                <?php
                                                    echo wp_trim_words( get_the_content(get_the_ID()), 40, '...' );
                                                ?>
                                                </p>
                                                <a class="mp-more rad ribbon tranz" href="<?php echo get_the_permalink(get_the_ID())?>">Xem chi tiết <i class="fa fa-angle-right"></i>
                                                </a>

                                            </div>

                                        </li>
                                    <?php endwhile;
                                      } else {
                                        echo __( 'No products found' );
                                      }
                                      wp_reset_postdata();
                                ?>

                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
