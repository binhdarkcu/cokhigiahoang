<div id="ml-block-824-3" class="ml-block ml-block-ml_portfolio_carousel ml_span12 ml-first clearfix">


                    <div class="widgetwrap widgetwrap-alt" style="padding:70px 0;">

                        <div class="block_bg" style="background-color:#ffffff;"></div>

                        <h2 class="block"  style="color:#141414;">

                            <span class="subtitle" style="color:#141414;">Các dịch vụ của công ty</span>

                            <span class="maintitle" style="background-color:#ffffff;">Dịch vụ</span>

                        </h2>
                        <!-- end title section-->

                        <div class="introText" style="padding: 0 30px; position: relative;">

                            <?php
                            $page_data = get_page_by_path('dich-vu');
                            $page_id = $page_data->ID;
                            echo apply_filters('the_content', $page_data->post_content);
                            ?>

                        </div>

                    </div>
                </div>
