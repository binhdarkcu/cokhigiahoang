<?php
$donGiaMua = get_don_gia_mua_VTL();
$vtl_cai_dat_chung = get_mua_VTL_cai_dat_chung();
?>
<script>var setting_keys = ['<?php echo DON_GIA_MUA_VTL;?>', '<?php echo MUA_VTL_CAI_DAT_CHUNG;?>']; var GiaHoangData = {};</script>
<script>GiaHoangData[setting_keys[0]] = JSON.parse(`<?php echo json_encode($donGiaMua, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[1]] = JSON.parse(`<?php echo json_encode($vtl_cai_dat_chung, JSON_UNESCAPED_UNICODE)?>`);</script>
<div id="page-thue-vth-500kg">
    <h1 class="align-center">BẢNG BÁN VẬN THĂNG LỒNG</h2>
    <table width="100%">
        <tbody>
            <tr class="item">
                <td class="item-underline">
                    <strong class="height">Biến tần và PLC</strong>
                    <table class="padding-left">
                        <tbody>
                            <tr>
                                <td>Giá biến tần/lồng</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo MUA_VTL_CAI_DAT_CHUNG."-gia_bien_tan"?>" value="<?php echo $vtl_cai_dat_chung['gia_bien_tan'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Giá PLC/lồng</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo MUA_VTL_CAI_DAT_CHUNG."-plc"?>"  value="<?php echo $vtl_cai_dat_chung['plc'];?>"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="item">
                <td class="item-underline">
                    <strong class="height">1 LỒNG 1 TẤN</strong>
                    <table class="padding-left">
                        <tbody>
                            <tr>
                                <td>Đơn giá</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo DON_GIA_MUA_VTL;?>-1L1T-don_gia"  value="<?php echo $donGiaMua['1L1T']['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Mỗi khung tăng thêm</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo DON_GIA_MUA_VTL;?>-1L1T-don_gia_mot_khung" data-setting-key-index="0" value="<?php echo $donGiaMua['1L1T']['don_gia_mot_khung'];?>"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="item-underline">
                    <strong class="height">1 LỒNG 2 TẤN</strong>
                    <table class="padding-left">
                        <tbody>
                            <tr>
                                <td>Đơn giá</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo DON_GIA_MUA_VTL;?>-1L2T-don_gia"  value="<?php echo $donGiaMua['1L2T']['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Mỗi khung tăng thêm</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo DON_GIA_MUA_VTL;?>-1L2T-don_gia_mot_khung"  value="<?php echo $donGiaMua['1L2T']['don_gia_mot_khung'];?>"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="item">
                <td class="item-underline">
                    <strong class="height">2 LỒNG 1 TẤN</strong>
                    <table class="padding-left">
                        <tbody>
                            <tr>
                                <td>Đơn giá</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo DON_GIA_MUA_VTL;?>-2L1T-don_gia"  value="<?php echo $donGiaMua['2L1T']['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Mỗi khung tăng thêm</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo DON_GIA_MUA_VTL;?>-2L1T-don_gia_mot_khung" value="<?php echo $donGiaMua['2L1T']['don_gia_mot_khung'];?>"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="item-underline">
                    <strong class="height">2 LỒNG 2 TẤN</strong>
                    <table class="padding-left">
                        <tbody>
                            <tr>
                                <td>Đơn giá</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo DON_GIA_MUA_VTL;?>-2L2T-don_gia" value="<?php echo $donGiaMua['2L2T']['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Mỗi khung tăng thêm</td>
                                <td><input type="text"  class="setting-data" data-key="<?php echo DON_GIA_MUA_VTL;?>-2L2T-don_gia_mot_khung" value="<?php echo $donGiaMua['2L2T']['don_gia_mot_khung'];?>"/></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>
    </table>
    <input name="save" type="submit" class="button button-primary button-large" id="luu-thay-doi" value="Lưu thay đổi">
</div>