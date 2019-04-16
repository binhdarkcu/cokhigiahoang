<div class="bao-gia-filter">
    <div>
        <h3>Bộ lọc</h3>
    </div>
    <button class="button button-primary button-large" id="clean-list">Xóa vĩnh viễn các mục đã xóa</button> <br> <br>
    <strong>Không hiển thị những báo giá có trạng thái:</strong> &nbsp;&nbsp;&nbsp;
    <input id="ko-hien-thi-seen" type="checkbox" name="ko-hien-thi-seen" value="Đã xem">
    <label for="ko-hien-thi-seen">Đã xem</label> &nbsp;&nbsp;&nbsp;
    <input id="ko-hien-thi-done" type="checkbox" name="ko-hien-thi-done" value="Hoàn thành">
    <label for="ko-hien-thi-done">Hoàn thành</label>
</div>
<input type="hidden" id ="checkedIds"/>
<input type="hidden" id="allIds"/>
<div id="bulk-action">
    <strong id="number-of-items-selected"></strong>
    <button class="button button-primary button-large" id="delete-bulk">Xóa tất cả</button>  
    <button class="button button-primary button-large" id="cancel-bulk">Bỏ chọn</button>    
</div>
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
            <button class="submit" id="save-change">Lưu</button>            
        </footer>
    </section>
    </div>
</div>
<script id="modal-template" type="template/javascript">
    <div class="edit-detail">Họ tên: <strong>%full_name%</strong></div>
    <div class="edit-detail">Email: <strong>%email%</strong></div>
    <div class="edit-detail">Số điện thoại: <strong>%phone_number%</strong></div>
    <div class="edit-detail">Công ty: <strong>%company%</strong></div>
    <div class="edit-detail">Ngày báo giá: <strong>%created_date%</strong></div>
</script>