<?php 
global $wpdb;
$query = "SELECT * FROM " . $wpdb->prefix . "bao_gia WHERE is_deleted=0  ORDER BY created_date desc";
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
           <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <section>
        <footer>
            <button data-izimodal-close="">Cancel</button>
            <button class="submit">Log in</button>            
        </footer>
    </section>
    </div>
</div>

<div id="modal-chinh-sua">
    <div class="main-content">
           <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <div>some content</div>
    <section>
        <footer>
            <button data-izimodal-close="">Cancel</button>
            <button class="submit">Log in</button>            
        </footer>
    </section>
    </div>
</div>