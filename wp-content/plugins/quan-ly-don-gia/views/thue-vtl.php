<?php
$thue_1L1T = get_don_gia_thue_VTL_1L1T_trong_TPHCM();
$thue_1L2T = get_don_gia_thue_VTL_1L2T_trong_TPHCM();
$thue_2L1T = get_don_gia_thue_VTL_2L1T_trong_TPHCM();
$thue_2L2T = get_don_gia_thue_VTL_2L2T_trong_TPHCM();
$vtl_cai_dat_chung = get_thue_VTL_cai_dat_chung();
$list = array(
    array(
        'key_name' => '1 LỒNG 1 TẤN',
        'key_code' => DON_GIA_THUE_VTL_1L1T_TPHCM,
        'value' => $thue_1L1T
    ),
    array(
        'key_name' => '1 LỒNG 2 TẤN',
        'key_code' => DON_GIA_THUE_VTL_1L2T_TPHCM,
        'value' => $thue_1L2T
    ),
    array(
        'key_name' => '2 LỒNG 1 TẤN',
        'key_code' => DON_GIA_THUE_VTL_2L1T_TPHCM,
        'value' => $thue_2L1T
    ),
    array(
        'key_name' => '2 LỒNG 2 TẤN',
        'key_code' => DON_GIA_THUE_VTL_2L2T_TPHCM,
        'value' => $thue_2L2T
    ),
);

$txt_ttsp = array(
    'kieu_van_thang' => 'Kiểu vận thăng',
    'cong_suat_bien_tan' => 'Biến tần',
    'dong_co_bien_tan' => 'Động cơ (biến tần)',
    'dong_co_ko_bien_tan' => 'Động cơ (ko BT)',
    'tai_trong' => 'Tải trọng'
);

$txt_ct = array(
    'don_gia' => 'Đơn giá',
    'van_chuyen_den' => 'Vận chuyển đến công trình',
    'van_chuyen_ve' => 'Vận chuyển về kho',
    'lap_dat' => 'Lắp đặt',
    'thao_do' => 'Tháo dỡ'
);

$item_per_row = 4;

?>
<script>var setting_keys = ['<?php echo DON_GIA_THUE_VTL_1L1T_TPHCM;?>', '<?php echo DON_GIA_THUE_VTL_1L2T_TPHCM;?>', '<?php echo DON_GIA_THUE_VTL_2L1T_TPHCM;?>', '<?php echo DON_GIA_THUE_VTL_2L2T_TPHCM;?>', '<?php echo THUE_VTL_CAI_DAT_CHUNG;?>']; var GiaHoangData = {};</script>
<script>GiaHoangData[setting_keys[0]] = JSON.parse(`<?php echo json_encode($thue_1L1T, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[1]] = JSON.parse(`<?php echo json_encode($thue_1L2T, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[2]] = JSON.parse(`<?php echo json_encode($thue_2L1T, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[3]] = JSON.parse(`<?php echo json_encode($thue_2L2T, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[4]] = JSON.parse(`<?php echo json_encode($vtl_cai_dat_chung, JSON_UNESCAPED_UNICODE)?>`);</script>
<div id="page-thue-vth-500kg">
    <h1 class="align-center">BẢNG GIÁ THUÊ VẬN THĂNG LỒNG</h2>
    <table width="100%">
        <tbody>
            <tr>
                <td>
                    <h3>Cài đặt chung</h3>
                    <table>
                        <tr>
                            <td>
                                <strong>Lương vận hành:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo THUE_VTL_CAI_DAT_CHUNG."-van_hanh"?>" value="<?php echo $vtl_cai_dat_chung['van_hanh'];?>"/>VND
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Bảo trì</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo THUE_VTL_CAI_DAT_CHUNG."-bao_tri"?>" value="<?php echo $vtl_cai_dat_chung['bao_tri'];?>"/>VND
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Kiểm định</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo THUE_VTL_CAI_DAT_CHUNG."-kiem_dinh"?>" value="<?php echo $vtl_cai_dat_chung['kiem_dinh'];?>"/>VND
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Biến tần</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo THUE_VTL_CAI_DAT_CHUNG."-gia_bien_tan"?>" value="<?php echo $vtl_cai_dat_chung['gia_bien_tan'];?>"/>VND
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Phí vận chuyển/lắp đặt ngoài TP. HCM bằng</strong>
                            </td>
                            <td>
                                <input type="number" class="setting-data" data-key="<?php echo THUE_VTL_CAI_DAT_CHUNG."-ty_so_ngoai_tp"?>" value="<?php echo $vtl_cai_dat_chung['ty_so_ngoai_tp'];?>"/> lần giá gốc
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    
    <p><i>*Phí lắp đặt và vận chuyển áp dụng trong TP. HCM</i></p>
    
    <?php foreach ($list as $key => $item):?>
    <table width="100%">
            <thead>
                <th><h3 class="align-left item-red font-size-h2"><?php echo $item['key_name'];?></h3>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3>Thông tin sản phẩm</h3>
                        <table>
                            <?php $ttsp = $item['value']['thong_tin_sp'];?>
                            <?php foreach ($ttsp as $key_tt => $value_tt):?>
                            <tr>
                                <td>
                                    <strong>
                                        <?php echo $txt_ttsp[$key_tt];?>
                                    </strong>
                                </td>
                                <td>
                                    <input type="text" class="setting-data" data-key="<?php echo $item['key_code']."-thong_tin_sp-$key_tt"?>" value="<?php echo $value_tt?>"/>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                    </td>
                    <td>
                        <h3>Cửa tầng (đơn giá VND)</h3>
                        <table>
                            <?php $cua_tang = $item['value']['cua_tang'];?>
                            <?php foreach ($cua_tang as $key_ct => $value_ct):?>
                            <tr>
                                <td>
                                    <strong>
                                        <?php echo $txt_ct[$key_ct];?>
                                    </strong>
                                </td>
                                <td>
                                    <input type="text" class="setting-data" data-key="<?php echo $item['key_code']."-cua_tang-$key_ct"?>" value="<?php echo $value_ct?>"/>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                    </td>

                </tr>
            </tbody>
    </table>
    <hr/>
    <h3>Đơn giá thuê (VND)</h4>
    <p><i>*Đơn giá lắp đặt và vận chuyển dưới đây áp dụng cho khu vực TP. HCM</i></p>
    <table width="100%">
        <tbody>
            <?php $list_don_gia = $item['value']['thong_tin_don_gia'];?>
            <?php $count = 0;?>
            <?php foreach ($list_don_gia as $chieu_cao => $don_gia):?>
            <?php if($count%$item_per_row === 0){echo '<tr class="item">';}?>
                <td class="item-underline">
                    <strong class="height"><?php echo $chieu_cao;?>m</strong>
                    <table class="padding-left">
                        <tbody>
                            <tr>
                                <td>Đơn giá</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo $item['key_code']."-thong_tin_don_gia-$chieu_cao-don_gia"?>" value="<?php echo $don_gia['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Lắp đặt</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo $item['key_code']."-thong_tin_don_gia-$chieu_cao-lap_dat"?>" value="<?php echo $don_gia['lap_dat'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Vận chuyển</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo $item['key_code']."-thong_tin_don_gia-$chieu_cao-van_chuyen"?>" value="<?php echo $don_gia['van_chuyen'];?>"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            <?php if($count%$item_per_row === ($item_per_row-1)){echo '</tr>';} $count++;?>
            <?php endforeach;?>
        </tbody>
    </table>
    <br/><br/>
    <?php endforeach;?>
    
    <input name="save" type="submit" class="button button-primary button-large" id="luu-thay-doi" value="Lưu thay đổi">
</div>