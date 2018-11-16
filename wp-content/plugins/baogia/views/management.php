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
            <th>Chi tiết báo giá</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row):?>
        <tr>
            <td><?php echo $row['full_name'];?></td>
            <td><?php echo $row['phone_number'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['company'];?></td>
            <td><?php echo $row['created_date'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><a href="#<?php echo $row['id'];? class="xem>">Xem chi tiết</a></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<div id="modal">

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