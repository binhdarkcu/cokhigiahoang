<?php 
$mua_VTH_lap_dat_kiem_dinh = get_chi_phi_lap_dat_va_kiem_dinh();

$addition_info_mua_VTH_500kg = get_additional_info_for_VTH_500kg();
$addition_info_mua_VTH_1000kg = get_additional_info_for_VTH_1000kg();
$phan_tram_theo_thang_thue = get_phan_tram_theo_thang_thue();
$phi_van_chuyen_gian_giao = get_phi_van_chuyen_gian_giao(null);
$sp_cu = get_gia_tri_san_pham_cu();
?>
<script>var setting_keys = ['<?php echo ADDITIONAL_INFO_MUA_VTH;?>', '<?php echo ADDITIONAL_INFO_MUA_VTH_500KG;?>', '<?php echo ADDITIONAL_INFO_MUA_VTH_1000KG;?>', '<?php echo PHAN_TRAM_THEO_THANG_THUE;?>', '<?php echo PHI_VAN_CHUYEN_GIAN_GIAO;?>', '<?php echo GIA_TRI_SAN_PHAM_CU;?>']; var GiaHoangData = {};</script>
<script>GiaHoangData[setting_keys[0]] = JSON.parse(`<?php echo json_encode($mua_VTH_lap_dat_kiem_dinh, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[1]] = JSON.parse(`<?php echo json_encode($addition_info_mua_VTH_500kg, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[2]] = JSON.parse(`<?php echo json_encode($addition_info_mua_VTH_1000kg, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[3]] = JSON.parse(`<?php echo json_encode($phan_tram_theo_thang_thue, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[4]] = JSON.parse(`<?php echo json_encode($phi_van_chuyen_gian_giao, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[5]] = JSON.parse(`<?php echo json_encode($sp_cu, JSON_UNESCAPED_UNICODE)?>`);</script>
<div id="page-cai-dat-khac">
    <h1 class="align-center">CÁC THIẾT LẬP KHÁC</h2>
    <table width="100%">
        <tbody>
            <tr>
                <td>
                    <h3>Phần trăm theo tháng thuê</h3>
                    <table>
                        <tr>
                            <td>
                                <strong>Thuê dưới 1 tháng tăng:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo PHAN_TRAM_THEO_THANG_THUE."-1"?>" value="<?php echo $phan_tram_theo_thang_thue['1'];?>"/>%
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Thuê 2 tháng tăng:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo PHAN_TRAM_THEO_THANG_THUE."-2"?>" value="<?php echo $phan_tram_theo_thang_thue['2'];?>"/>%
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Thuê trên 3 tháng:</strong>
                            </td>
                            <td><i>Giá không đổi</i></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <h3>Chi phí lắp đặt và kiểm định khi MUA VTH (VND)</h3>
                    <table>
                        <tr>
                            <td>
                                <strong>Lắp đặt:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo ADDITIONAL_INFO_MUA_VTH."-lap_dat"?>" value="<?php echo $mua_VTH_lap_dat_kiem_dinh['lap_dat'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Kiểm định:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo ADDITIONAL_INFO_MUA_VTH."-kiem_dinh"?>"  value="<?php echo $mua_VTH_lap_dat_kiem_dinh['kiem_dinh'];?>"/>
                            </td>
                        </tr>
                    </table>                    
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Chi phí kiểm định và bảo trì khi THUÊ VTH 500kg (VND)</h3>
                    <table>
                        <tr>
                            <td>
                                <strong>Kiểm định (12 tháng):</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo ADDITIONAL_INFO_MUA_VTH_500KG."-kiem_dinh_12thang"?>" value="<?php echo $addition_info_mua_VTH_500kg['kiem_dinh_12thang'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Bảo trì:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo ADDITIONAL_INFO_MUA_VTH_500KG."-bao_tri"?>" value="<?php echo $addition_info_mua_VTH_500kg['bao_tri'];?>"/>
                            </td>
                        </tr>
                    </table>                    
                </td>
                <td>
                    <h3>Chi phí kiểm định và bảo trì khi THUÊ VTH 1000kg (VND)</h3>
                    <table>
                        <tr>
                            <td>
                                <strong>Kiểm định (12 tháng):</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo ADDITIONAL_INFO_MUA_VTH_1000KG."-kiem_dinh_12thang"?>" value="<?php echo $addition_info_mua_VTH_1000kg['kiem_dinh_12thang'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Bảo trì:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo ADDITIONAL_INFO_MUA_VTH_1000KG."-bao_tri"?>" value="<?php echo $addition_info_mua_VTH_1000kg['bao_tri'];?>"/>
                            </td>
                        </tr>
                    </table>                    
                </td>                
            </tr>
            <tr>
                <td>
                    <h3>Chi phí vận chuyển giàn giáo (THUÊ) - đơn giá VND</h3>
                    <table>
                        <thead>
                            <tr>
                                <td><strong>Từ x km</strong></td>
                                <td><strong>Đến x km</strong></td>
                                <td><strong>Đơn giá VND</strong></td>
                            </tr>
                        </thead>
                        <?php foreach ($phi_van_chuyen_gian_giao as $index => $value):?>
                        <tr>
                            <td><input type="text" class="setting-data" data-key="<?php echo PHI_VAN_CHUYEN_GIAN_GIAO."-$index-min"?>" value="<?php echo $value['min']?>" /></td>
                            <td><input type="text" class="setting-data" data-key="<?php echo PHI_VAN_CHUYEN_GIAN_GIAO."-$index-max"?>" value="<?php echo $value['max']?>" /></td>
                            <td><input type="text" class="setting-data" data-key="<?php echo PHI_VAN_CHUYEN_GIAN_GIAO."-$index-don_gia"?>"value="<?php echo $value['don_gia']?>" /></td>
                        </tr> 
                        <?php endforeach;?>
                    </table>                    
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Sản phẩm cũ</h3>
                    <table>
                        <tr>
                            <td>
                                <strong>Giá trị sản phẩm cũ bằng</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="<?php echo GIA_TRI_SAN_PHAM_CU;?>" value="<?php echo $sp_cu;?>"/> % giá sản phẩm mới.
                            </td>
                        </tr>
                    </table>                    
                </td>
            </tr>
        </tbody>
    </table>
    <input name="save" type="submit" class="button button-primary button-large" id="luu-thay-doi" value="Lưu thay đổi">
</div>