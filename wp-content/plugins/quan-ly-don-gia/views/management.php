<?php 
$mua_VTH_lap_dat_kiem_dinh = get_chi_phi_lap_dat_va_kiem_dinh();
$addition_info_mua_VTH_500kg = get_additional_info_for_VTH_500kg();
$addition_info_mua_VTH_1000kg = get_additional_info_for_VTH_1000kg();
$phan_tram_theo_thang_thue = get_phan_tram_theo_thang_thue();
?>
<script>var setting_keys = ['addition_info_mua_VTH', 'addition_info_mua_VTH_500kg', 'addition_info_mua_VTH_1000kg', 'phan_tram_theo_thang_thue']; var GiaHoangData = {};</script>
<script>GiaHoangData[setting_keys[0]] = JSON.parse(`<?php echo json_encode($mua_VTH_lap_dat_kiem_dinh, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[1]] = JSON.parse(`<?php echo json_encode($addition_info_mua_VTH_500kg, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[2]] = JSON.parse(`<?php echo json_encode($addition_info_mua_VTH_1000kg, JSON_UNESCAPED_UNICODE)?>`);</script>
<script>GiaHoangData[setting_keys[3]] = JSON.parse(`<?php echo json_encode($phan_tram_theo_thang_thue, JSON_UNESCAPED_UNICODE)?>`);</script>
<div id="page-cai-dat-khac">
    <h1 class="align-center">CÁC THIẾT LẬP KHÁC</h2>
    <table width="100%">
<!--        <thead>
            <th><h3 class="align-left">Trong thành phố HCM</h3></th>
            <th><h3 class="align-left">Ngoài thành phố HCM</h3></th>
        </thead>-->
        <tbody>
            <tr>
                <td>
                    <h3>Phần trăm theo tháng thuê (áp dụng cho VTH)</h3>
                    <table>
                        <tr>
                            <td>
                                <strong>Thuê dưới 1 tháng tăng:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="" data-index="1" data-setting-key-index="3" value="<?php echo $phan_tram_theo_thang_thue['1'];?>"/>%
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Thuê 2 tháng tăng:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="" data-index="2" data-setting-key-index="3" value="<?php echo $phan_tram_theo_thang_thue['2'];?>"/>%
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
                                <input type="text" class="setting-data" data-key="" data-index="don_gia" data-setting-key-index="0" value="<?php echo $mua_VTH_lap_dat_kiem_dinh['lap_dat'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Kiểm định:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="" data-index="don_gia" data-setting-key-index="0" value="<?php echo $mua_VTH_lap_dat_kiem_dinh['kiem_dinh'];?>"/>
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
                                <input type="text" class="setting-data" data-key="" data-index="kiem_dinh_12thang" data-setting-key-index="1" value="<?php echo $addition_info_mua_VTH_500kg['kiem_dinh_12thang'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Bảo trì:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="" data-index="bao_tri" data-setting-key-index="1" value="<?php echo $addition_info_mua_VTH_500kg['bao_tri'];?>"/>
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
                                <input type="text" class="setting-data" data-key="" data-index="kiem_dinh_12thang" data-setting-key-index="2" value="<?php echo $addition_info_mua_VTH_1000kg['kiem_dinh_12thang'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Bảo trì:</strong>
                            </td>
                            <td>
                                <input type="text" class="setting-data" data-key="" data-index="bao_tri" data-setting-key-index="2" value="<?php echo $addition_info_mua_VTH_1000kg['bao_tri'];?>"/>
                            </td>
                        </tr>
                    </table>                    
                </td>                
            </tr>
        </tbody>
    </table>
    <input name="save" type="submit" class="button button-primary button-large" id="luu-thay-doi" value="Lưu thay đổi">
</div>