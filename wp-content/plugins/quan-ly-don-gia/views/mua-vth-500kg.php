<?php $cities = getCities();
$list_don_gia_trong = get_gia_ban_VTH500kg_trong_TPHCM();
$list_don_gia_ngoai = get_gia_ban_VTH500kg_ngoai_TPHCM();
$count = 0;
?>
<script>var DonGiaTrongTPHCM = JSON.parse(`<?php echo json_encode($list_don_gia_trong, JSON_UNESCAPED_UNICODE)?>`)</script>
<script>var DonGiaNgoaiTPHCM = JSON.parse(`<?php echo json_encode($list_don_gia_ngoai, JSON_UNESCAPED_UNICODE)?>`)</script>
<div id="page-mua-vth-500kg">
    <h1 class="align-center">MUA VẬN THĂNG HÀNG 500kg</h2>
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
                                <td><input type="text" value="<?php echo $chi_tiet['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Thanh giằng</td>
                                <td><input type="text" value="<?php echo $chi_tiet['thanh_giang'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Khung vận thăng</td>
                                <td><input type="text" value="<?php echo $chi_tiet['khung_van_thang'];?>"/></td>
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
                                <td><input type="text" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['don_gia'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Thanh giằng</td>
                                <td><input type="text" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['thanh_giang'];?>"/></td>
                            </tr>
                            <tr>
                                <td>Khung vận thăng</td>
                                <td><input type="text" value="<?php echo $list_don_gia_ngoai[$chieu_cao]['khung_van_thang'];?>"/></td>
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