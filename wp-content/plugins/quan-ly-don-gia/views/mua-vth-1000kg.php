<?php $cities = getCities();
$list_don_gia_trong = get_gia_ban_VTH1000kg_trong_TPHCM();
$list_don_gia_ngoai = get_gia_ban_VTH1000kg_ngoai_TPHCM();
?>
<script>var setting_keys = ['ban_vth_1000kg_trong_TPHCM', 'ban_vth_1000kg_ngoai_TPHCM']; var GiaHoangData = {};</script>
<script>GiaHoangData[setting_keys[0]] = JSON.parse(`<?php echo json_encode($list_don_gia_trong, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[1]] = JSON.parse(`<?php echo json_encode($list_don_gia_ngoai, JSON_UNESCAPED_UNICODE)?>`);</script>
<div id="page-mua-vth-1000kg">
    <h1 class="align-center">BẢNG GIÁ BÁN VẬN THĂNG HÀNG 1000kg</h2>
    <table width="100%">
        <thead>
            <th><h3 class="align-left">Trong thành phố HCM</h3></th>
            <th><h3 class="align-left">Ngoài thành phố HCM</h3></th>
        </thead>
        <tbody>
            <?php foreach ($list_don_gia_trong as $chieu_cao => $chi_tiet):?>
            <tr class="item">
                <td class="item-underline">
                    <strong class="height"><?php echo $chieu_cao;?>m</strong>
                    <table class="padding-left">
                        <tbody>
                            <tr>
                                <td>Đơn giá</td>
                                <td><input type="text" class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="don_gia" data-setting-key-index="0" value="<?php echo $chi_tiet['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Thanh giằng</td>
                                <td><input type="text" class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="thanh_giang" data-setting-key-index="0" value="<?php echo $chi_tiet['thanh_giang'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Khung vận thăng</td>
                                <td><input type="text" class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="khung_van_thang" data-setting-key-index="0" value="<?php echo $chi_tiet['khung_van_thang'];?>"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                
                <td class="item-underline">
                    <strong class="height"><?php echo $chieu_cao;?>m</strong>
                    <table class="padding-left">
                        <tbody>
                            <tr>
                                <td>Đơn giá</td>
                                <td><input type="text" class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="don_gia" data-setting-key-index="1" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Thanh giằng</td>
                                <td><input type="text" class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="thanh_giang" data-setting-key-index="1" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['thanh_giang'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Khung vận thăng</td>
                                <td><input type="text" class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="khung_van_thang" data-setting-key-index="1" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['khung_van_thang'];?>"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <input name="save" type="submit" class="button button-primary button-large" id="luu-thay-doi" value="Lưu thay đổi">
</div>