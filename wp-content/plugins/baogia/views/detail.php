<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
global $wpdb;
$id = (int)filter_input(INPUT_GET, "iid", FILTER_SANITIZE_STRING);
$_table = $wpdb->prefix.'bao_gia';
$query = $wpdb->prepare("SELECT * FROM $_table WHERE id=%d", $id);
$wpdb->query($query);
$rows = $wpdb->get_results($query, 'ARRAY_A');
$bao_gia = $rows[0];
if(isset($bao_gia)){
    $decoded = json_decode($bao_gia['order_detail'], JSON_UNESCAPED_UNICODE);
    $form_bao_gia = $decoded['form_bao_gia'];
    
    $template = '';
    switch ($form_bao_gia) {
        case 'form_vt_long_ban':
            $template = 'template-parts/emailing/template-mua-van-thang-long';
            break;
        case 'form_vt_long_thue':
            $template = 'template-parts/emailing/template-thue-van-thang-long';
            break;
        case 'form_vt_hang_ban':
            $template = $decoded['tl_vt_hang'] === '500 kg' ? 'template-parts/emailing/template-mua-van-thang-hang-500kg' : 'template-parts/emailing/template-mua-van-thang-hang-1000kg';
            break;
        case 'form_vt_hang_thue':
            $template = $decoded['tl_vt_hang'] === '500 kg' ? 'template-parts/emailing/template-thue-van-thang-hang-500kg' : 'template-parts/emailing/template-thue-van-thang-hang-1000kg';
            break;
        case 'form_gian_giao_ban':
            $template = 'template-parts/emailing/template-mua-gian-giao';
            break;
        case 'form_gian_giao_thue':
            $template = 'template-parts/emailing/template-thue-gian-giao';
            break;
        default:
            break;
    }
}
?>
<?php if(isset($decoded)):?>
<script type="text/javascript">var BaoGia = JSON.parse('<?php echo json_encode($decoded, JSON_UNESCAPED_UNICODE);?>');</script>
<?php endif;?>
<div id="main-content">
    <div id="show-content"></div>
    <div id="list-action">
        <button class="submit" id="print">In</button> 
    </div>
</div>

<script id="template" type="text/template">
    <?php get_template_part($template);?>
</scrtip>
