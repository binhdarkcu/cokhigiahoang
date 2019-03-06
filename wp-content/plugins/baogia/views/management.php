<?php 
global $wpdb;
$query = "SELECT * FROM " . $wpdb->prefix . "bao_gia WHERE is_deleted=0  ORDER BY created_date DESC";
$rows = $wpdb->get_results ( $query, 'ARRAY_A' );
?>
<div class="bao-gia-filter">
    <div>
        <h3>Bộ lọc</h3>
    </div>
    <strong>Không hiển thị những báo giá có trạng thái:</strong> &nbsp;&nbsp;&nbsp;
    <input id="ko-hien-thi-seen" type="checkbox" name="ko-hien-thi-seen" value="16">
    <label for="ko-hien-thi-seen">Đã xem</label> &nbsp;&nbsp;&nbsp;
    <input id="ko-hien-thi-done" type="checkbox" name="ko-hien-thi-done" value="17">
    <label for="ko-hien-thi-done">Đã hoàn thành</label>
</div>
<input type="hidden" id ="checkedIds"/>
<input type="hidden" id="allIds"/>
<table id="bao-gia" class="display" style="width:100%">
    <thead>
        <tr>
            <th><input type="checkbox" id="check-all" name="select-multiple" value="-1"></th>
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

<script id="template-mua-vtl" type="text/template">
<?php get_template_part("template-parts/emailing/template-thue-van-thang-long"); ?>
</script>

<script id="template-thue-vtl" type="text/template">
<?php get_template_part("template-parts/emailing/template-thue-van-thang-long"); ?>
</script>

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
