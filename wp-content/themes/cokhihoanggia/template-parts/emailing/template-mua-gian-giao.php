<?php $gian_giao = get_gian_giao_form_data(); ?>
<!DOCTYPE html>
<html>
<head>
<title>A Responsive Email Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }
/*    table.tbPrices td{
        padding: 0!important;
    }*/
</style>

</head>
<body style="margin: 0 !important; padding: 0 !important;">
<!-- ONE COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tbPrices" id="tblGianGiao">
    <tr>
      <td bgcolor="#fff" align="center" valign="top" style="padding: 30px 0">
        <table border="0" cellpadding="0" cellspacing="0" width="810" style="border: 1px solid #ccc; table-layout: fixed;">
          <tr>
            <td align="left" valign="top" style="padding-top: 1px">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td style="padding-right: 3px; padding-left: 3px;" width="250">
                    <a href="http://www.cokhigiahoang.com/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo_email.png" width="245" height="178" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0" /></a>
                  </td>
                  <td align="left" valign="top" width="598">
                    <h3 style="color: #000; text-decoration: none; font-family: Arial, sans-serif; font-size: 17px; margin: 10px 0 0; line-height: 1.5;">CÔNG TY TNHH MTV XÂY DỰNG CƠ KHÍ GIA HOÀNG</h3>
                    <p style="color: #000; text-decoration: none;font-family: Arial, sans-serif; font-size: 16px; line-height: 1.9; margin: 0">TRỤ SỞ: Lầu 9 số 68 Nguyễn Huệ, P. Bến Nghé, Quận 1, Tp. Hồ Chí Minh<br/>
                      VPĐD: 100/3/24 Ấp Đình, Xã Tân Xuân, H.Hóc Môn, Tp. Hồ Chí Minh<br/>Tel: 0903 370 117  <span style="padding-left: 15px;">Email: hoacokhigiahoang@gmail.com</span><br/>Website:
                      <a href="http://www.cokhigiahoang.com/" target="_blank" style="color: #000; text-decoration: none;font-family: Helvetica, Arial, sans-serif; font-size: 13px">www.cokhigiahoang.com</a></p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td width="100%" align="left" valign="middle" style="color: #fff; text-align: center; line-height: 1.2; font-weight: bold; font-family: Helvetica, Arial, sans-serif; font-size: 17px; padding: 10px 0; background: #000;">Manufacture - Trading - Renting - Installation - Dismantle</td>
          </tr>
          <tr>
            <td align="left" valign="top" style="text-transform: uppercase;font-weight: bold; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; color: #000; padding: 30px 0; font-size: 20px; text-decoration: underline; text-align: center;">
              BẢNG BÁO GIÁ %hinh_thuc% GIÀN GIÁO
            </td>
          </tr>
          <tr>
            <td style="border: 2px solid #ccc" align="left">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr style="border-bottom: 1px solid #ccc">
                    <td width="40%" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Kính gửi: <strong>Cty %cty%</strong></td>
                  <td width="60%" align="left" style="padding: 5px 5px 5px 3px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                          <td width="50%" style="line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Công trình: <strong>%vi_tri%</strong></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="40%" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Người nhận: <strong>Mr./Ms. %ho_ten%</strong>&nbsp;</td>
                  <td width="60%" align="left" style="padding: 5px 5px 5px 3px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td width="70%" style="line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Số báo giá: <strong>0818344</strong>&nbsp;</td>
                        <td width="30%" style="line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Số trang: <strong>02</strong>&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td width="40%" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Fax/email: <strong>%email%</strong></td>
                  <td width="60%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Điện thoại: <strong>%so_dt%</strong>&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td align="left" valign="top" style="padding: 20px 0 0 5px; line-height: 1.4; font-family: Helvetica, Arial, sans-serif; font-size: 14px; border-bottom: 1px solid #ccc; font-weight: bold;"><i>
              Trước hết Công ty TNHH MTV Xây Dựng Cơ Khí Gia Hoàng xin cảm ơn sự quan tâm của Quý công ty đến sản phẩm và dịch vụ của chúng tôi. Theo yêu cầu của Quý Công ty, Công Ty Gia Hoàng trân trọng báo giá các sản phẩm sau:<br/><br/>
            </i></td>
          </tr>
          <tr>
            <td style="border: 2px solid #ccc" align="left">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Stt</td>
                        <td width="170" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Nội dung</td>
                        <td width="30" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Đvt</td>
                        <td width="70" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Trọng lượng<br/> (kg
                          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons.png" style="display: inline;" width="13" border="0" alt=""> 3%)</td>
                        <td width="50" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Số lượng</td>
                        <td width="70" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Khối lượng (kg)</td>
                        <td width="70" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Đơn giá thiết bị (VNĐ)</td>
                        <td width="110" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Thành tiền thiết bị (VNĐ)</td>
                        <td width="130" style="border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold; background: #ddd">Ghi chú <br/>(đv mm)</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold;">A</td>
                        <td width="170" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold">HỆ THỐNG GIÁO NÊM</td>
                        <td width="30" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold;">&nbsp;</td>
                        <td width="70" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold;">&nbsp;</td>
                        <td width="50" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold;">&nbsp;</td>
                        <td width="70" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: bold; text-align: right;" id="totalWeight">%tong_trong_luong%</td>
                        <td width="70" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold;">&nbsp;</td>
                        <td width="110" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: bold; text-align: right" class="finalTotal">%tong_don_gia_truoc_thue%</td>
                        <td width="130" style="border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle; border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">1</td>
                        <td width="170" style="vertical-align: middle; border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Chống đứng 2500 mm</strong><br/>- Ống mạ kẽm Ø49 x 2mm<br/>
                        - L = 26000mm<br/>- Tóp đầu<br/>- 3 cụm tai giằng (Tai giằng 4mm)<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle; border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong2%</td>
                        <td width="50" style="vertical-align: middle; border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong2" value="%so_luong2%"disabled/></td>
                        <td width="70" style="vertical-align: middle; border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong2%</td>
                        <td width="70" style="vertical-align: middle; border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia2%</td>
                        <td width="110" style="vertical-align: middle; border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia2%</td>
                        <td width="130" style="vertical-align: middle; border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-1.jpg" style="width: 100%" /></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">2</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Chống đứng 2000 mm</strong><br/>- Ống mạ kẽm O49 x 2mm<br/>
                          - L = 21000mm<br/>- Tóp đầu<br/>- 2 cụm tai giằng (Tai giằng 4mm)<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong3%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong3" value="%so_luong3%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong3%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia3%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia3%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-2.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">3</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Chống đứng 1500 mm</strong><br/>- Ống mạ kẽm O49 x 2mm<br/>
                          - L = 16000mm<br/>- Tóp đầu O42 mm<br/>- 2 cụm tai giằng (Tai giằng 4mm)<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong4%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong4" value="%so_luong4%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong4%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia4%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia4%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-3.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">4</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Chống đứng 1000 mm</strong><br/>- Ống mạ kẽm O49 x 2mm<br/>
                          - L = 11000mm<br/>- Tóp đầu O42 mm<br/>- 1 cụm tai giằng (Tai giằng 4mm)<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong5%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong5" value="%so_luong5%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong5%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia5%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia5%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-4.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">5</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Chống đứng 1000 mm</strong><br/>- Ống mạ kẽm O49 x 2mm<br/>
                          - L = 11000mm<br/>- Tóp đầu O42 mm<br/>- 2 cụm tai giằng (Tai giằng 4mm)<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong6%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong6" value="%so_luong6%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong6%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia6%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia6%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-4.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">6</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Giằng ngang 500 mm</strong><br/>- Ống mạ kẽm Ø42 x 2mm<br/>
                          - L = 450 mm<br/>- Nêm giằng 5 mm<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong7%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong7" value="%so_luong7%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong7%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia7%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia7%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-5.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">7</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Giằng ngang 600 mm</strong><br/>- Ống mạ kẽm Ø42 x 2mm<br/>
                          - L = 550 mm<br/>- Nêm giằng 5 mm<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong8%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong8" value="%so_luong8%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong8%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia8%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia8%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-6.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">8</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Giằng ngang 1000 mm</strong><br/>- Ống mạ kẽm Ø42 x 2mm<br/>
                          - L = 950 mm<br/>- Nêm giằng 5 mm<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong9%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong9" value="%so_luong9%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong9%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia9%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia9%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-7.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">9</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Giằng ngang 1200 mm</strong><br/>- Ống mạ kẽm Ø42 x 2mm<br/>
                          - L = 1150 mm<br/>- Nêm giằng 5 mm<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong10%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong10" value="%so_luong10%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong10%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia10%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia10%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-8.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">10</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Giằng ngang 1500 mm</strong><br/>- Ống mạ kẽm Ø42 x 2mm<br/>
                          - L = 1450 mm<br/>- Nêm giằng 5 mm<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong11%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong11" value="%so_luong11%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong11%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia11%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia11%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-9.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">11</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Chống đà 1200 mm</strong><br/>- Ống mạ kẽm Ø42 x 2mm<br/>
                          - L = 1200 mm<br/>- Tai nêm 5 mm<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong11%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong12" value="%so_luong12%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong12%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia12%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia12%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-10.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">12</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Chống consol 900mm</strong><br/>- Ống mạ kẽm Ø42 x 2mm<br/>
                          - L = 1150 mm<br/>- Nêm 5 mm<br/>- Sơn mạ kẽm mối hàn</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cây</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong13%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong13" value="%so_luong13%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong13%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia13%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia13%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-11.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">13</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Kích tăng bằng: rỗng</strong><br/>- Ống Ø34 x 3,2mm<br/>
                          - L = 500 mm<br/>- Đế kích 140x140x4mm<br/>- Sơn chống gỉ xám toàn bộ</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cái</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong14%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong14" value="%so_luong14%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong14%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia14%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia14%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-12.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">14</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Kích tăng bằng: rỗng</strong><br/>- Ống Ø34 x 3,2mm<br/>
                          - L = 600 mm<br/>- Đế kích 140*140*4mm<br/>- Sơn chống gỉ xám toàn bộ</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cái</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong15%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong15" value="%so_luong15%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong15%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia15%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia15%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-13.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">15</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Kích tăng chữ U: rỗng </strong><br/>- Ống Ø34 x 3,2mm<br/>
                          - L = 500 mm<br/>- Đế kích 180*80*4mm<br/>- Sơn chống gỉ xám toàn bộ</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cái</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong16%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong16" value="%so_luong16%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong16%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia16%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia16%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-14.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">16</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Kích tăng chữ U: rỗng </strong><br/>- Ống Ø34 x 3,2mm<br/>
                          - L = 600 mm<br/>- Đế kích 180*80*4mm<br/>- Sơn chống gỉ xám toàn bộ</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cái</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong17%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong17" value="%so_luong17%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong17%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia17%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia17%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-15.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">17</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Mâm giàn giáo 1500x360mm </strong><br/>- Tôn dày 1,2 mm<br/>
                          - Sơn bạc mối hàn+phần sắt<br/>- Dùng cho hệ gg nêm bước 1.5m</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cái</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong18%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong18" value="%so_luong18%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong18%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia18%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia18%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-16.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">18</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>* Thang giàn giáo 2500x410mm </strong><br/>- Sơn bạc toàn bộ<br/>
                          - Chuyên dùng cho hệ gg nêm ngang 1.5m, cao 2m</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cái</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong19%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong19" value="%so_luong19%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong19%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia19%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia19%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/gian-giao-17.jpg" style="width: 100%"/></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">19</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;"><strong>Ống thép(L= 6m)</strong></td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cái</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong20%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong20" value="%so_luong20%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong20%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia20%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia20%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">20</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Cùm</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Cái</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong21%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong21" value="%so_luong21%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong21%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia21%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia21%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">21</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Xà gồ 5x10 (1m, 2m, 3m, 6m)</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">m</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong22%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong22" value="%so_luong22%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong22%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia22%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia22%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Hàng đen</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">22</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Xà gồ 5x5 (1m, 2m, 3m, 6m)</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">m</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong23%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong23" value="%so_luong23%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong23%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia23%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia23%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Hàng đen</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">23</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Xà gồ 5x10 (1m, 2m, 3m, 6m)</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">m</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong24%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong24" value="%so_luong24%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong24%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia24%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia24%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; ">Hàng mạ kẽm</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout: fixed">
                      <tr>
                        <td width="25" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">24</td>
                        <td width="170" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Xà gồ 5x5 (1m, 2m, 3m, 6m)</td>
                        <td width="30" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">m</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="weightNumber">%trong_luong25%</td>
                        <td width="50" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right"><input style="width: 100%; text-align: center; color: red; font-size: 20px;font-weight: 700;" class="so-luong" type="text" name="so_luong25" value="%so_luong25%" disabled/></td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="MassNumber">%tong_trong_luong25%</td>
                        <td width="70" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right" class="priceNumber">%don_gia25%</td>
                        <td width="110" style="vertical-align: middle;border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;" class="totalPrice">%tong_don_gia25%</td>
                        <td width="130" style="vertical-align: middle;border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center">Hàng mạ kẽm</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td align="left" valign="top" style="border-top: 2px solid #ccc">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;font-weight: bold;">Tổng giá tiền thiết bị trước thuế:</td>
                        <td width="122" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 6px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;" class="finalTotal">%tong_don_gia_thiet_bi%</td>
                        <td width="144" style="border-right: 1px solid transparent; border-bottom: 1px solid #000; padding: 5px 5px 5px 4px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;font-weight: bold;">Vận chuyển đi và về công trình (%don_gia_van_chuyen% vnđ/kg/lượt x Khối lượng thực tế)</td>
                        <td width="122" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 6px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;" class="deliveryPrice">%phi_van_chuyen%</td>
                        <td width="144" style="border-right: 1px solid transparent; border-bottom: 1px solid #000; padding: 5px 5px 5px 4px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;font-weight: bold;">Tổng trước thuế:</td>
                        <td width="122" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 6px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;" id="beforeTotalPrice">%tong_don_gia_truoc_thue%</td>
                        <td width="144" style="border-right: 1px solid transparent; border-bottom: 1px solid #000; padding: 5px 5px 5px 4px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;font-weight: bold;">Thuế GTGT 10%:</td>
                        <td width="122" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 6px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;" id="gtgtValue">%vat%</td>
                        <td width="144" style="border-right: 1px solid transparent; border-bottom: 1px solid #000; padding: 5px 5px 5px 4px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;font-weight: bold;">Tổng cộng</td>
                        <td width="122" style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 6px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;" id="totalofTotal">%tong_don_gia_sau_thue%</td>
                        <td width="144" style="border-right: 1px solid transparent; border-bottom: 1px solid #000; padding: 5px 5px 5px 4px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;font-weight: bold;">Bằng chữ: %tong_don_gia_bang_chu% đồng</td>
                        <td width="122" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 6px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;">&nbsp;</td>
                        <td width="144" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 4px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;font-weight: bold;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding: 5px 0 5px 5px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: left; font-weight: bold; color: #000; line-height: 1.2">
              B. ĐIỀU KIỆN ÁP DỤNG BẢNG GIÁ
            </td>
          </tr>
          <tr>
            <td style="border-top: 2px solid #ccc" align="left">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">1. <strong>Giao hàng</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Cty Gia Hoàng giao hàng theo thỏa thuận khi xác nhận đơn hàng.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">2. <strong>Vận chuyển</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bên thuê vào kho của Cty Gia Hoàng nhận và trả hàng hoặc giao nhận vận chuyển theo đơn giá trên</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">3. <strong>Tạm ứng</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Thanh toán 100% giá trị đơn hàng tương ứng %tong_don_gia_sau_thue% đồng và khối lượng trước khi giao hàng.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">4. <strong>Thanh toán</strong></td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Thanh toán 100% giá trị đơn hàng tương ứng %tong_don_gia_sau_thue% đồng và khối lượng trước khi giao hàng.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">5. <strong>Thời gian thuê</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bảng giá trên áp dụng cho thời gian thuê từ 1 đến dưới 6 tháng. Thời gian tối thiểu là 1 tháng.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">6. <strong>Thuế GTGT</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bảng báo giá trên đã bao gồm thuế GTGT</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">7. <strong>Hiệu lực báo giá</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bảng báo giá trên có hiệu lực trong vào 15 ngày kể từ ngày báo giá</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding: 20px 0 5px 5px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: left; font-weight: bold;"><i>Trân trọng kính chào!</i>&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="bottom" style="padding-bottom: 150px;">
              <table width="90%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td width="50%" valign="top" style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: left; font-weight: bold;"><br/><br/>Xác nhận từ khách hàng</td>
                  <td width="50%" style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center;">
                    <i>%ngay_bao_gia%</i><br/><br/><strong>CÔNG TY TNHH MTV XD-CK GIA HOÀNG</strong> <br/>
                    <?php if(is_admin()) { ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/emailing/images/moc.png" style="width: 100%; max-width: 185px"/> <?php } ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
</table>
</body>
</html>
