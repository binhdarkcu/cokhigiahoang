<div id="ml-block-824-2" class="ml-block ml-block-ml_mp_services ml_span12 ml-first clearfix">


                    <div class="widgetwrap" style="<?php if(is_page('san-pham')) {echo 'padding:0;';} else {echo 'padding: 60px 0;';}?>">

                        <div class="block_bg"  style="background-color:#F2F2F2;"></div>

                        <div class="container">

                            <?php if($_GET["slug"] == 'van-thang-long') {?>
                                <?php get_template_part('template-parts/tpl','van-thang-long'); ?>
                            <?php } else if($_GET["slug"] == 'van-thang-hang') {?>
                                <?php get_template_part('template-parts/tpl','van-thang-hang'); ?>
                            <?php } else {
                                get_template_part('template-parts/tpl','van-thang-long');
                                get_template_part('template-parts/tpl','van-thang-hang');
                            }?>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
