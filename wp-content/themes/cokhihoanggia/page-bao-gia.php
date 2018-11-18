<?php get_header(); ?>
<?php
$list_tp = array('An Giang', 'Bà Rịa - Vũng Tàu', 'Bắc Giang', 'Bắc Kạn', 'Bạc Liêu', 'Bắc Ninh', 'Bến Tre', 'Bình Định', 'Bình Dương', 'Bình Phước', 'Bình Thuận', 'Cà Mau ', 'Cao Bằng ', 'Đắk Lắk ', 'Đắk Nông ', 'Điện Biên ', 'Đồng Nai ', 'Đồng Tháp', 'Gia Lai', 'Hà Giang ', 'Hà Nam', 'Hà Tĩnh', 'Hải Dương', 'Hậu Giang', 'Hòa Bình', 'Hưng Yên', 'Khánh Hòa', 'Kiên Giang', 'Kon Tum', 'Lai Châu', 'Lâm Đồng', 'Lạng Sơn', 'Lào Cai', 'Long An', 'Nam Định', 'Nghệ An', 'Ninh Bình', 'Ninh Thuận', 'Phú Thọ', 'Quảng Bình', 'Quảng Nam', 'Quảng Ngãi', 'Quảng Ninh', 'Quảng Trị', 'Sóc Trăng', 'Sơn La', 'Tây Ninh', 'Thái Bình', 'Thái Nguyên', 'Thanh Hóa', 'Thừa Thiên Huế', 'Tiền Giang', 'Trà Vinh', 'Tuyên Quang', 'Vĩnh Long', 'Vĩnh Phúc', 'Yên Bái', 'Phú Yên', 'Cần Thơ', 'Đà Nẵng', 'Hải Phòng', 'Hà Nội', 'TP HCM');
$ajax_nonce = wp_create_nonce('H4GpryAtCnbwJVTdNMMf');
?>
<body class="home page-template page-template-homepage page-template-homepage-php page page-id-596 woocommerce-no-js">

    <div class="wrapper upper modern-header">

        <?php get_template_part("template-parts/header") ?>
        <div class="page-header p-border">
            <div class="titlewrap container">

                <h1 class="entry-title dekoline"><?php the_title(); ?></h1>

                <div class="page-crumbs">
                    <a href="<?php echo HOME_URL; ?>"><i class="fa fa-home"></i>  <i class='fa fa-angle-right'></i>
                        Trang chủ<i class='fa fa-angle-right'></i></a> <i class='fa fa-angle-right'></i> <a href="<?php echo HOME_URL ?>/bao-gia">Báo giá</a>
                </div>

            </div>

        </div>

        <div class="container container_alt">

            <div id="core">
                <div class="form-wrapper">
                    <form action="" id="wizard">
                        <!-- SECTION 1 -->
                        <h4></h4>
                        <section>
                            <h3>Thông tin cá nhân</h3>
                            <!--Họ tên và sdt-->
                            <div class="form-row">
                                <div class="form-holder">
                                    <i class="zmdi zmdi-account"></i>
                                    <input type="text" class="form-control required" name="ho_ten" value="" placeholder="Họ tên" />
                                </div>
                                <div class="form-holder">
                                    <i class="zmdi zmdi-smartphone-android"></i>
                                    <input id="so_dt" type="text" class="form-control required" name="so_dt" value="" placeholder="Số điện thoại"/>
                                </div>
                            </div>

                            <!--Email và công ty-->
                            <div class="form-row">
                                <div class="form-holder">
                                    <i class="zmdi zmdi-email"></i>
                                    <input id="email" type="text" class="form-control required" name="email" value="" placeholder="Địa chỉ email"/>
                                </div>
                                <div class="form-holder">
                                    <i class="zmdi zmdi-home"></i>
                                    <input type="text" class="form-control required" name="cty" value="" placeholder="Công ty"/>
                                </div>
                            </div>
                        </section>

                        <!-- SECTION 2 -->
                        <h4></h4>
                        <section>
                            <h3>Lựa chọn sản phẩm</h3>
                            <div class="cart_totals">
                                <table cellspacing="0" class="shop_table shop_table_responsive">
                                    <!--Hình thức-->
                                    <tr id="hinh_thuc" class="cart-subtotal shipping">
                                        <th>Hình thức</th>
                                        <td data-title="Subtotal">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="hinh_thuc" value="Mua" checked> Mua
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="hinh_thuc" value="Thuê"> Thuê
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--Loại sản phẩm-->
                                    <tr id="loai_sp" class="cart-subtotal shipping">
                                        <th>Loại sản phẩm</th>
                                        <td data-title="Subtotal">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="loai_sp" value="Vận thăng" checked> Vận thăng
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="loai_sp" value="Giàn giáo"> Giàn giáo
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--Loại vận thăng-->
                                    <tr id="loai_vt" class="cart-subtotal shipping">
                                        <th>Loại vận thăng</th>
                                        <td data-title="Subtotal">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="loai_vt" value="Vận thăng hàng" checked> Vận thăng hàng
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="loai_vt" value="Vận thăng lồng"> Vận thăng lồng
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </section>

                        <!-- SECTION 3 -->
                        <h4></h4>
                        <section>
                            <h3 style="margin-bottom: 16px;">Yêu cầu sản phẩm</h3>
                            <div class="cart_totals">
                                <!--Thông tin giàn giáo-->
                                <div id="tt_cho_thue" class="form-row">

                                    <div id="chieu_cao" class="form-holder">
                                        <i class="zmdi zmdi-format-list-numbered"></i>
                                        <input id="chieu_cao" type="text" name="chieu_cao" value="" class="form-control" placeholder="Chiều cao (m)">
                                    </div>                                
                                    <div id="sl_gian_giao" class="form-holder">
                                        <i class="zmdi zmdi-collection-item"></i>
                                        <input id="so_luong" type="text" name="so_luong" value="" class="form-control required" placeholder="Số lượng">
                                    </div>

                                    <div id="thoi_gian_thue" class="form-holder">
                                        <i class="zmdi zmdi-calendar"></i>
                                        <input type="text" name="thoi_gian_thue" class="form-control required" placeholder="Thời gian thuê">
                                    </div>

                                    <div class="form-holder">
                                        <select id="vi_tri" name="vi_tri" class="form-control chon-vi-tri required" data-placeholder="Vị trí lắp đặt...">
                                            <option value=""></option>
                                            <?php foreach ($list_tp as $tp): ?>
                                                <option value="<?php echo $tp; ?>"><?php echo $tp; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <table cellspacing="0" class="shop_table shop_table_responsive">

                                    <!--Trọng lượng vận thăng hàng-->
                                    <tr id="tl_hang" class="cart-subtotal shipping">
                                        <th>Trọng lượng vận thăng</th>
                                        <td data-title="Subtotal">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="tl_hang" value="500 kg" checked> 500 kg
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="tl_hang" value="1000 kg"> 1000 kg
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--Số lồng--> 
                                    <tr id="so_long" class="cart-subtotal shipping">
                                        <th>Số lồng</th>
                                        <td data-title="Subtotal">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="so_long" value="1 lồng" checked> 1 lồng
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="so_long" value="2 lồng"> 2 lồng
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--Trọng lượng lồng--> 
                                    <tr id="tl_long" class="cart-subtotal shipping">
                                        <th>Trọng lượng lồng</th>
                                        <td data-title="Subtotal">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="tl_long" value="1 tấn" checked> 1 tấn
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="tl_long" value="2 tấn"> 2 tấn
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!--Biến tần-->
                                    <tr id="bien_tan" class="cart-subtotal shipping">
                                        <th>Biến tần</th>
                                        <td data-title="Subtotal">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="bien_tan" value="Có" checked> Biến tần
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="bien_tan" value="Không"> Không biến tần
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>                      
                        </section>

                        <!-- SECTION 4 -->
                        <h4></h4>
                        <section>
                            <h3>Yêu cầu báo giá</h3>
                            <div class="cart_totals">
                                <table id="review-section" cellspacing="0" class="shop_table shop_table_responsive">
                                </table>
                            </div>

                        </section>
                        <input id="ajax_nonce" type="hidden" value="<?php echo $ajax_nonce;?>"/>
                    </form>
                </div>
            </div>
        </div><!-- /.container -->
    </div>

    <div id="modal-bao-gia">
        <div class="main-content">
            <!--insert template here-->
            <div id="detail-content"></div>
            <section>
                <footer>
                    <button data-izimodal-close="">Đóng</button>
                    <button id="gui-bao-gia" class="submit">Lưu</button>            
                </footer>
            </section>
        </div>
    </div>
</body>

<style>
    .tweet_iframe_widget, .fb-like.fb_iframe_widget,.google_plusone_iframe_widget {
        float: left;
        margin-right: 5px;
    }
</style>
<?php get_template_part("template-parts/footer"); ?>
<?php get_footer(); ?>

<script id="template-1" type="text/template">
<?php get_template_part("template-parts/emailing/template1"); ?>
</script>

<script id="template-2" type="text/template">
<?php get_template_part("template-parts/emailing/template2"); ?>
</script>

<script id="template-3" type="text/template">
    <?php get_template_part("template-parts/emailing/template3"); ?>
</script>
