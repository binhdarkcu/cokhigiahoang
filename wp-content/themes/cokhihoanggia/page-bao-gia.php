<?php get_header(); ?>
<?php
$ajax_nonce = wp_create_nonce('H4GpryAtCnbwJVTdNMMf');
$cities = get_cities();
$data = array();
foreach ($cities as $city => $districts){
    foreach ($districts as $district => $detail){
        $data[$city][] = $district;
    }
}
?>
<script>var Cities = JSON.parse(`<?php echo json_encode($data, JSON_UNESCAPED_UNICODE)?>`)</script>
<body class="home page-template page-template-homepage page-template-homepage-php page page-id-596 woocommerce-no-js">

    <div class="wrapper upper modern-header">

        <?php get_template_part("template-parts/header") ?>
        <div class="page-header p-border">
            <div class="titlewrap container">

                <h1 class="entry-title dekoline"><?php the_title(); ?></h1>

                <div class="page-crumbs">
                    <a href="<?php echo HOME_URL; ?>"><i class="fa fa-home"></i>  <i class='fa fa-angle-right'></i>
                        Trang chủ</a> <i class='fa fa-angle-right'></i> <a href="<?php echo HOME_URL ?>/bao-gia">Báo giá</a>
                </div>

            </div>

        </div>

        <div class="container container_alt">

            <div id="core">
                <div class="form-wrapper">
                    <form action="" id="wizard">
                        <!-- SECTION 1 -->
                        <h4></h4>
                        <section style="display: none">
                            <h3>Chọn sản phẩm</h3>

                            <div class="cart_totals">

                                <!--Hình thức-->
                                <div data-title="Subtotal">
                                    <div class="item-content">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="hinh_thuc" value="Bán" required> Mua
                                                <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input type="radio" name="hinh_thuc" value="Thuê"> Thuê
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                
                                <!--Trạng thái sản phẩm-->
                                <div id="tt_sp" data-title="Subtotal" class="flex-item">
                                    <div class="item-content">
                                        <i class="fa fa-arrow-down"></i>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="tt_sp" value="Cũ" required> Cũ
                                                <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input type="radio" name="tt_sp" value="Mới" required> Mới
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--Loại sản phẩm-->
                                <div id="loai_sp" data-title="Subtotal" class="flex-item">
                                    <div class="item-content">
                                        <i class="fa fa-arrow-down"></i>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="loai_sp" value="Vận thăng" required> Vận thăng
                                                <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input type="radio" name="loai_sp" value="Giàn giáo" required> Giàn giáo
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--Loại vận thăng-->
                                <div id="loai_vt" data-title="Subtotal" class="flex-item">
                                    <div class="item-content">
                                        <i class="fa fa-arrow-down"></i>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="loai_vt" value="Vận thăng hàng" required> Vận thăng hàng
                                                <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input type="radio" name="loai_vt" value="Vận thăng lồng"> Vận thăng lồng
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <!--Số lồng-->
                                <div id="so_long" data-title="Subtotal" class="flex-item">
                                    <div class="item-content">
                                        <i class="fa fa-arrow-down"></i>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="so_long" value="1 lồng" required> 1 lồng
                                                <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input type="radio" name="so_long" value="2 lồng"> 2 lồng
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <!--Trọng lượng vận thăng hàng-->
                                <div id="tl_vt_hang" data-title="Subtotal" class="flex-item">
                                    <div class="item-content">
                                        <i class="fa fa-arrow-down"></i>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="tl_vt_hang" value="500 kg" required> 500 kg
                                                <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input type="radio" name="tl_vt_hang" value="1000 kg"> 1000 kg
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <!--Trọng lượng lồng-->
                                <div id="tl_long" data-title="Subtotal" class="flex-item">
                                    <div class="item-content">
                                        <i class="fa fa-arrow-down"></i>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="tl_long" value="1 tấn" required> 1 tấn
                                                <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input type="radio" name="tl_long" value="2 tấn"> 2 tấn
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!--Biến tần-->
                                <div id="bien_tan" data-title="Subtotal" class="flex-item">
                                    <div class="item-content">
                                        <i class="fa fa-arrow-down"></i>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="bien_tan" value="Có" required> Biến tần
                                                <span class="checkmark"></span>
                                            </label>
                                            <label>
                                                <input type="radio" name="bien_tan" value="Không"> Không biến tần
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- SECTION 2 -->
                        <h4></h4>
                        <section style="display: none">
                            <h3>Vị trí lắp đặt</h3>


                            <div class="cart_totals">

                            </div>

                            <!--Thông tin giàn giáo-->
                            <div class="form-row vi_tri_lap_dat">

                                <div id="chieu_cao" class="form-holder">
                                    <label class="order-label">Chiều cao (m)</label>
                                    <i class="zmdi zmdi-format-list-numbered"></i>
                                    <select name="chieu_cao" id="select_chieu_cao" class="chon-chieu-cao required" style="width: 100%;" data-placeholder="Chọn chiều cao...">
                                        
                                    </select>
                                </div>
                                <div id="sl_gian_giao" class="form-holder">
                                    <label class="order-label">Số lượng (bộ)</label>
                                    <i class="zmdi zmdi-collection-item"></i>
                                    <input id="so_luong" type="text" name="so_luong" value="" class="form-control required" placeholder="Nhập số lượng">
                                </div>

                            </div>

                            <div class="form-row vi_tri_lap_dat">

                                <div id="thoi_gian_thue" class="form-holder">
                                    <label class="order-label">Thời gian thuê (tháng)</label>
                                    <i class="zmdi zmdi-calendar"></i>
                                    <input type="text" name="thoi_gian_thue" class="form-control required" placeholder="Thời gian thuê (tháng)">
                                </div>

                                <div id="ngay_can_hang" class="form-holder">
                                    <label class="order-label">Ngày cần hàng</label>
                                    <i class="zmdi zmdi-calendar"></i>
                                    <input readonly type="text" id="datepicker" name="ngay_can_hang" placeholder="Chọn ngày cần hàng" class="form-control required">
                                </div>
                            </div>

                            <div class="form-row vi_tri_lap_dat">
                                <div class="form-holder">
                                    <label class="order-label">Chọn tỉnh/thành phố</label>
                                    <select id="vi_tri" name="vi_tri" class="form-control chon-vi-tri required" data-placeholder="Thành phố...">

                                    </select>
                                </div>

                                <div class="form-holder">
                                    <label class="order-label">Chọn Quận/Huyện</label>
                                    <select id="vi_tri2" name="vi_tri2" class="form-control chon-vi-tri required" data-placeholder="Quận/Huyện...">
                                    </select>
                                </div>
                            </div>


                        </section>

                        <!-- SECTION 3 -->
                        <h4></h4>
                        <section style="display: none">
                            <h3 style="margin-bottom: 16px;">Thông tin khách hàng</h3>

                            <!--Họ tên và sdt-->
                            <div class="form-row" style="margin-top: 50px;">
                                <div class="form-holder">
                                    <i class="zmdi zmdi-account"></i>
                                    <label class="order-label">Họ tên</label>
                                    <input type="text" class="form-control required" name="ho_ten" value="" placeholder="Họ tên" />
                                </div>
                                <div class="form-holder">
                                    <i class="zmdi zmdi-smartphone-android"></i>
                                    <label class="order-label">Số điện thoại</label>
                                    <input id="so_dt" type="text" class="form-control required" name="so_dt" value="" placeholder="Số điện thoại"/>
                                </div>
                            </div>

                            <!--Email và công ty-->
                            <div class="form-row">
                                <div class="form-holder">
                                    <i class="zmdi zmdi-email"></i>
                                    <label class="order-label">Địa chỉ email</label>
                                    <input id="email" type="text" class="form-control required" name="email" value="" placeholder="Địa chỉ email"/>
                                </div>
                                <div class="form-holder">
                                    <i class="zmdi zmdi-home"></i>
                                    <label class="order-label">Công ty</label>
                                    <input type="text" class="form-control required" name="cty" value="" placeholder="Công ty"/>
                                </div>
                            </div>


                        </section>

                        <!-- SECTION 4 -->
                        <h4></h4>
                        <section style="display: none">
                            <h3>Báo giá</h3>
                            <div class="cart_totals">
                                <table id="review-section" cellspacing="0" class="shop_table shop_table_responsive">
                                </table>
                            </div>

                        </section>
                        <input id="ajax_nonce" type="hidden" value="<?php echo $ajax_nonce; ?>"/>
                    </form>
                </div>
            </div>
        </div><!-- /.container -->
    </div>
</body>

<style>
    .tweet_iframe_widget, .fb-like.fb_iframe_widget,.google_plusone_iframe_widget {
        float: left;
        margin-right: 5px;
    }
</style>
<div id="editor"></div>
<?php get_template_part("template-parts/footer"); ?>
<?php get_footer(); ?>
