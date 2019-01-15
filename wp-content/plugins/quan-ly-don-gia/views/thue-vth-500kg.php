<?php $cities = getCities();
$list_don_gia_trong = get_gia_thue_VTH500kg_trong_TPHCM();
$list_don_gia_ngoai = get_gia_thue_VTH500kg_ngoai_TPHCM();
?>
<script>var setting_keys = ['thue_vth_500kg_trong_TPHCM', 'thue_vth_500kg_ngoai_TPHCM']; var GiaHoangData = {};</script>
<script>GiaHoangData[setting_keys[0]] = JSON.parse(`<?php echo json_encode($list_don_gia_trong, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[1]] = JSON.parse(`<?php echo json_encode($list_don_gia_ngoai, JSON_UNESCAPED_UNICODE)?>`);</script>
<div id="page-thue-vth-500kg">
    <h1 class="align-center">BẢNG GIÁ THUÊ VẬN THĂNG HÀNG 500kg</h2>
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
                                <td><input type="text"  class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="don_gia" data-setting-key-index="0" value="<?php echo $chi_tiet['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Lắp đặt</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="lap_dat" data-setting-key-index="0" value="<?php echo $chi_tiet['lap_dat'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Vận chuyển</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="van_chuyen" data-setting-key-index="0" value="<?php echo $chi_tiet['van_chuyen'];?>"/></td>
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
                                <td><input type="text"  class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="don_gia" data-setting-key-index="1" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Lắp đặt</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="lap_dat" data-setting-key-index="1" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['lap_dat'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Vận chuyển</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo $chieu_cao;?>" data-index="van_chuyen" data-setting-key-index="1" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['van_chuyen'];?>"/></td>
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