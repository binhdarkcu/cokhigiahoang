<div id="ml-block-824-3" class="ml-block ml-block-ml_portfolio_carousel ml_span12 ml-first clearfix">


                    <div class="widgetwrap widgetwrap-alt" style="padding:70px 0;">

                        <div class="block_bg" style="background-color:#ffffff;"></div>

                        <h2 class="block"  style="color:#141414;">

                            <span class="subtitle" style="color:#141414;">Các sản phẩm giàn giáo</span>

                            <span class="maintitle" style="background-color:#ffffff;">Giàn giáo xây dựng</span>

                        </h2>
                        <!-- end title section-->

                        <div class="carouselwrap">

                            <div class="flexcarousel flexslider loading">
                                <ul class="slides">
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
                                      <li>
                                          <div class="item post tranz">

                                              <div class="item_inn tranz gradient">

                                                  <p class="meta tranz ">
                                                     <b><?php echo get_the_title(get_the_ID())?></b>
                                                  </p>

                                                  <h2><a href="<?php echo get_the_permalink(get_the_ID())?>" title="">
                                                      <?php
                                                          echo wp_trim_words( get_the_content(get_the_ID()), 7, '...' );
                                                      ?>
                                                  </a></h2>

                                              </div><!-- end .item_inn -->


                                              <div class="imgwrap">

                                                  <a href="<?php echo get_the_permalink(get_the_ID())?>" title="<?php echo get_the_title(get_the_ID())?>">

                                                      <img width="300" height="300" src="<?php echo $feature_image_meta[0] ?>" class="tranz grayscale grayscale-fade wp-post-image" alt="" />
                                                  </a>

                                                  <a class="hoverstuff hoverstuff-zoom" data-gal="prettyPhoto[gallery]" href="<?php echo $feature_image_meta[0] ?>"><i class="fa fa-search"></i></a>
                                                  <a class="hoverstuff hoverstuff-link" href="<?php echo get_the_permalink(get_the_ID())?>"><i class="fa fa-info-circle"></i></a>

                                              </div>



                                          </div>
                                      </li>

                                    <?php endwhile;
                                      } else {
                                        echo __( 'No products found' );
                                      }
                                      wp_reset_postdata();
                                ?>



                                    <li>


                                        <div class="item post tranz">

                                            <div class="item_inn tranz gradient">

                                                <p class="meta tranz ">
                                                    Project Management
                                                </p>

                                                <h2><a href="http://capethemes.com/demo/processing/work/schematic-design-for-willems-refinery/" title="Schematic design for Willems refinery">Schematic design for Willems refinery</a></h2>

                                            </div><!-- end .item_inn -->


                                            <div class="imgwrap">

                                                <a href="http://capethemes.com/demo/processing/work/schematic-design-for-willems-refinery/" title="Schematic design for Willems refinery">

                                                    <img width="353" height="297" src="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/brewery-377019_1920-353x297.jpg" class="tranz grayscale grayscale-fade wp-post-image" alt="" />
                                                </a>

                                                <a class="hoverstuff hoverstuff-zoom" data-gal="prettyPhoto[gallery]" href="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/brewery-377019_1920.jpg"><i class="fa fa-search"></i></a>
                                                <a class="hoverstuff hoverstuff-link" href="http://capethemes.com/demo/processing/work/schematic-design-for-willems-refinery/"><i class="fa fa-info-circle"></i></a>

                                            </div>



                                        </div>
                                    </li>


                                    <li>


                                        <div class="item post tranz">

                                            <div class="item_inn tranz gradient">

                                                <p class="meta tranz ">
                                                    Supply
                                                </p>

                                                <h2><a href="http://capethemes.com/demo/processing/work/bioethanol-production/" title="Bioethanol Production">Bioethanol Production</a></h2>

                                            </div><!-- end .item_inn -->


                                            <div class="imgwrap">

                                                <a href="http://capethemes.com/demo/processing/work/bioethanol-production/" title="Bioethanol Production">

                                                    <img width="353" height="297" src="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/factory-269056_1920-353x297.jpg" class="tranz grayscale grayscale-fade wp-post-image" alt="" />
                                                </a>

                                                <a class="hoverstuff hoverstuff-zoom" data-gal="prettyPhoto[gallery]" href="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/factory-269056_1920.jpg"><i class="fa fa-search"></i></a>
                                                <a class="hoverstuff hoverstuff-link" href="http://capethemes.com/demo/processing/work/bioethanol-production/"><i class="fa fa-info-circle"></i></a>

                                            </div>



                                        </div>
                                    </li>


                                    <li>


                                        <div class="item post tranz">

                                            <div class="item_inn tranz gradient">

                                                <p class="meta tranz ">
                                                    Research &bull; Supply
                                                </p>

                                                <h2><a href="http://capethemes.com/demo/processing/work/research-of-aviation-materials/" title="Research of aviation materials">Research of aviation materials</a></h2>

                                            </div><!-- end .item_inn -->


                                            <div class="imgwrap">

                                                <a href="http://capethemes.com/demo/processing/work/research-of-aviation-materials/" title="Research of aviation materials">

                                                    <img width="353" height="297" src="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/airplane-569881-353x297.jpg" class="tranz grayscale grayscale-fade wp-post-image" alt="" />
                                                </a>

                                                <a class="hoverstuff hoverstuff-zoom" data-gal="prettyPhoto[gallery]" href="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/airplane-569881.jpg"><i class="fa fa-search"></i></a>
                                                <a class="hoverstuff hoverstuff-link" href="http://capethemes.com/demo/processing/work/research-of-aviation-materials/"><i class="fa fa-info-circle"></i></a>

                                            </div>



                                        </div>
                                    </li>


                                    <li>


                                        <div class="item post tranz">

                                            <div class="item_inn tranz gradient">

                                                <p class="meta tranz ">
                                                    Engineering &bull; Project Management
                                                </p>

                                                <h2><a href="http://capethemes.com/demo/processing/work/pre-construction-of-whiting-refinery/" title="Pre-construction of Whiting Refinery">Pre-construction of Whiting Refinery</a></h2>

                                            </div><!-- end .item_inn -->


                                            <div class="imgwrap">

                                                <a href="http://capethemes.com/demo/processing/work/pre-construction-of-whiting-refinery/" title="Pre-construction of Whiting Refinery">

                                                    <img width="353" height="297" src="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/oil-rig-512541_1280-353x297.jpg" class="tranz grayscale grayscale-fade wp-post-image" alt="" />
                                                </a>

                                                <a class="hoverstuff hoverstuff-zoom" data-gal="prettyPhoto[gallery]" href="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/oil-rig-512541_1280.jpg"><i class="fa fa-search"></i></a>
                                                <a class="hoverstuff hoverstuff-link" href="http://capethemes.com/demo/processing/work/pre-construction-of-whiting-refinery/"><i class="fa fa-info-circle"></i></a>

                                            </div>



                                        </div>
                                    </li>


                                    <li>


                                        <div class="item post tranz">

                                            <div class="item_inn tranz gradient">

                                                <p class="meta tranz ">
                                                    Logistic &bull; Supply
                                                </p>

                                                <h2><a href="http://capethemes.com/demo/processing/work/lightweight-material-contract/" title="Lightweight Material Contract">Lightweight Material Contract</a></h2>

                                            </div><!-- end .item_inn -->


                                            <div class="imgwrap">

                                                <a href="http://capethemes.com/demo/processing/work/lightweight-material-contract/" title="Lightweight Material Contract">

                                                    <img width="353" height="297" src="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/loading-646934-353x297.jpg" class="tranz grayscale grayscale-fade wp-post-image" alt="" />
                                                </a>

                                                <a class="hoverstuff hoverstuff-zoom" data-gal="prettyPhoto[gallery]" href="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/loading-646934.jpg"><i class="fa fa-search"></i></a>
                                                <a class="hoverstuff hoverstuff-link" href="http://capethemes.com/demo/processing/work/lightweight-material-contract/"><i class="fa fa-info-circle"></i></a>

                                            </div>



                                        </div>
                                    </li>


                                    <li>


                                        <div class="item post tranz">

                                            <div class="item_inn tranz gradient">

                                                <p class="meta tranz ">
                                                    Engineering
                                                </p>

                                                <h2><a href="http://capethemes.com/demo/processing/work/material-engineering-for-penang-plant/" title="Material Engineering for Penang plant">Material Engineering for Penang plant</a></h2>

                                            </div><!-- end .item_inn -->


                                            <div class="imgwrap">

                                                <a href="http://capethemes.com/demo/processing/work/material-engineering-for-penang-plant/" title="Material Engineering for Penang plant">

                                                    <img width="353" height="297" src="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/industrial-698563_1920-353x297.jpg" class="tranz grayscale grayscale-fade wp-post-image" alt="" />
                                                </a>

                                                <a class="hoverstuff hoverstuff-zoom" data-gal="prettyPhoto[gallery]" href="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/industrial-698563_1920.jpg"><i class="fa fa-search"></i></a>
                                                <a class="hoverstuff hoverstuff-link" href="http://capethemes.com/demo/processing/work/material-engineering-for-penang-plant/"><i class="fa fa-info-circle"></i></a>

                                            </div>



                                        </div>
                                    </li>


                                    <li>


                                        <div class="item post tranz">

                                            <div class="item_inn tranz gradient">

                                                <p class="meta tranz ">
                                                    Construction
                                                </p>

                                                <h2><a href="http://capethemes.com/demo/processing/work/construction-of-mill-creek-hall/" title="Construction of Mill Creek Hall">Construction of Mill Creek Hall</a></h2>

                                            </div><!-- end .item_inn -->


                                            <div class="imgwrap">

                                                <a href="http://capethemes.com/demo/processing/work/construction-of-mill-creek-hall/" title="Construction of Mill Creek Hall">

                                                    <img width="353" height="297" src="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/factory-825676_1920-353x297.jpg" class="tranz grayscale grayscale-fade wp-post-image" alt="" />
                                                </a>

                                                <a class="hoverstuff hoverstuff-zoom" data-gal="prettyPhoto[gallery]" href="http://capethemes.com/demo/processing/wp-content/uploads/2015/07/factory-825676_1920.jpg"><i class="fa fa-search"></i></a>
                                                <a class="hoverstuff hoverstuff-link" href="http://capethemes.com/demo/processing/work/construction-of-mill-creek-hall/"><i class="fa fa-info-circle"></i></a>

                                            </div>



                                        </div>
                                    </li>

                                    <!-- end post -->


                                </ul><!-- end latest posts section-->

                                <div class="clearfix"></div>

                                <!-- end latest -->



                            </div>

                        </div>

                    </div>
                </div>
