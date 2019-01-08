<?php $cities = getCities();
$count = 0;
?>
<div id="page-thanh-pho">
    <h1 class="align-center">DANH SÁCH THÀNH PHỐ VÀ CÁC QUẬN, HUYỆN HỖ TRỢ HOẠT ĐỘNG</h2>
    <table width="100%">
        <tbody>
            <?php foreach ($cities as $city => $districts):?>
                <?php if($count%3 == 0):?>
                    <tr class="city">
                <?php endif;?>
                        <td valign="top" class="city-underline">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        
                                        <td>
                                            <h3><?php echo $city;?></h3>
                                        </td>
                                    </tr>
                                    <?php foreach ($districts as $district => $detail):?>
                                    <tr>
                                        <td class="district-underline"><h4><?php echo $district;?></h5></td>
                                        <td class="district-underline">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Cự ly:</td>
                                                        <td>
                                                            <input type="text" value="<?php echo $detail[0];?>"/>
                                                            km</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hệ số:</td>
                                                        <td>
                                                            <input type="text" value="<?php echo $detail[1];?>"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </td>
                <?php if($count%3 == 2):?>
                    </tr>
                <?php endif;?>

            <?php $count++;?>
            <?php endforeach;?>
        </tbody>
    </table>
    <input name="save" type="submit" class="button button-primary button-large" id="publish" value="Lưu thay đổi">
</div>