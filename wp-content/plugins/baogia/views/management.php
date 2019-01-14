<?php 
global $wpdb;
$query = "SELECT * FROM " . $wpdb->prefix . "bao_gia WHERE is_deleted=0  ORDER BY created_date DESC";
$rows = $wpdb->get_results ( $query, 'ARRAY_A' );
?>
<table id="bao-gia" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Công ty</th>
            <th>Ngày báo giá</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<div id="modal-chi-tiet">
    <div class="main-content">
 <!--insert template here-->
    <div id="detail-content"></div>
    <section>
        <footer>
            <button data-izimodal-close="">Đóng</button>
            <button class="submit" id="print">In</button>            
        </footer>
    </section>
    </div>
</div>

<script id="template-thue-vth-500kg" type="text/template">
<?php get_template_part("template-parts/emailing/template-thue-van-thang-hang-500kg"); ?>
</script>

<script id="template-thue-vth-1000kg" type="text/template">
<?php get_template_part("template-parts/emailing/template-thue-van-thang-hang-1000kg"); ?>
</script>

<script id="template-mua-vth-500kg" type="text/template">
<?php get_template_part("template-parts/emailing/template-mua-van-thang-hang-500kg"); ?>
</script>

<script id="template-mua-vth-1000kg" type="text/template">
<?php get_template_part("template-parts/emailing/template-mua-van-thang-hang-1000kg"); ?>
</script>

<script id="template-mua-gian-giao" type="text/template">
    <?php get_template_part("template-parts/emailing/template-mua-gian-giao"); ?>
</script>
<script id="template-thue-gian-giao" type="text/template">
    <?php get_template_part("template-parts/emailing/template-thue-gian-giao"); ?>
</script>
