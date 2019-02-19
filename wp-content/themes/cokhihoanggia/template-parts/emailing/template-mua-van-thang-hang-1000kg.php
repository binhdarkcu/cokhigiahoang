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
</style>
</head>
<body style="margin: 0 !important; padding: 0 !important;">
<!-- ONE COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tbPrices">
    <tr>
      <td bgcolor="#fff" align="center" valign="top" style="padding: 30px 0">
        <table border="0" cellpadding="0" cellspacing="0" width="810" style="border: 1px solid #ccc; table-layout: fixed;">
          <tr>
            <td align="left" valign="top" style="padding-top: 1px">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td style="padding-right: 3px;padding-left: 3px;" width="250">
                    <a href="http://www.cokhigiahoang.com/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo_email.png" width="245" height="178" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0" /></a>
                  </td>
                  <td align="left" valign="top" width="598">
                    <h3 style="color: #000; text-decoration: none; font-family: Helvetica, Arial, sans-serif; font-size: 20px; margin: 10px 0 15px; line-height: 1.5;">CÔNG TY TNHH MTV XÂY DỰNG CƠ KHÍ GIA HOÀNG</h3>
                    <p style="color: #000; text-decoration: none;font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.9; margin: 0">TRỤ SỞ: Lầu 9 số 68 Nguyễn Huệ, P. Bến Nghé, Quận 1, Tp. Hồ Chí Minh<br/>
                      VPĐD: 100/3/24 Ấp Đình, Xã Tân Xuân, H.Hóc Môn, Tp. Hồ Chí Minh<br/>TEL: 0903 370 117<br/>WEB:
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
            <td align="left" valign="top" style="text-transform: uppercase; font-weight: bold; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; color: #000; padding: 30px 0; font-size: 20px; text-decoration: underline; text-align: center;">
              BẢNG BÁO GIÁ BÁN VẬN THĂNG HÀNG
            </td>
          </tr>
          <tr>
            <td style="border: 2px solid #ccc" align="left">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr style="border-bottom: 1px solid #ccc">
                    <td width="40%" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Công ty: <strong>%cty%</strong></td>
                  <td width="60%" align="left" style="padding: 5px 5px 5px 3px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td width="60%" style="line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Công trình/kho: <strong>%vi_tri%</strong>&nbsp;</td>
                        <td width="40%" style="line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;"><strong>%vi_tri2%</strong>&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="40%" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Người nhận: <strong>Mr./Ms. %ho_ten%</strong>&nbsp;</td>
                  <td width="60%" align="left" style="padding: 5px 5px 5px 3px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td width="70%" style="line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Số báo giá: <strong>040618</strong>&nbsp;</td>
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
            <td align="left" valign="top" style="padding: 20px 0 0 5px; line-height: 1.4; font-family: Helvetica, Arial, sans-serif; font-size: 16px; border-bottom: 1px solid #ccc; font-style: italic"> Công ty Gia Hoàng cám ơn Quý Công ty đã tín nhiệm sử dụng các sản phẩm do Cty Chúng tôi cung cấp trong
            suốt thời gian qua. Theo yêu cầu báo giá từ Quý Công ty, nay Công ty Gia Hoàng xin gửi bảng báo giá bán, vận chuyển và lắp đặt vận thăng tại %vi_tri% để Quý Công ty tham khảo, xem đặt hàng.<br/>
            <br/><strong style="text-transform: uppercase; font-style: normal">I. BẢNG GIÁ CHI TIẾT BÁN VẬN THĂNG HÀNG VÀ CHI PHÍ KHÁC.</strong>&nbsp;</td>
          </tr>
          <tr>
          </tr>
          <tr>
            <td style="border: 2px solid #ccc" align="left">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold; background: #ddd">Stt</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold; background: #ddd">Nội dung</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold; background: #ddd">Đvt</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold; background: #ddd">Số lượng</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold; background: #ddd">Đơn giá<br/>(VNĐ)</td>
                        <td width="161" style="border-right: 1px solid #ddd; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold; background: #ddd">Thành tiền <br/>(VNĐ)</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold;">A</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: left; font-weight: bold;">CUNG CẤP THIẾT BỊ</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold;">Bộ</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold">%so_luong%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold">%don_gia_1_bo%</td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: right; font-weight: bold;">%don_gia_x_bo%</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; font-weight: bold;">1</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left; font-weight: bold;">Vận thăng 1000 kg cao %chieu_cao%m</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Bộ</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%so_luong%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%don_gia_1_bo%</td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">%don_gia_x_bo%</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; ">1.1</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Khung đế + mơ tơ tời 7.5KW-22m/ph</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Bộ</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%so_luong%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">1.2</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Thanh giằng tường U100 dày 3mm +V50 dày 5mm</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Bộ</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%thanh_giang%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">1.3</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Khung vận thăng 60x70x200 Cm</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Khung</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%khung_van_thang%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Thanh trượt U100 mm dày 3mm</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Thanh đứng V50x50x4.5mm</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Thanh chéo và ngang V40x40x4 mm</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">1.4</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Bàn nâng có kích thước DxRxC:1.4x1.1x0.4m</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Bộ</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%so_luong%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">1.5</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Thắng thủy lực</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Bộ</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%so_luong%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">1.6</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Rơ le khống chế hành trình</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Bộ</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%so_luongx2%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">1.7</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Các cơ cấu an toàn</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Bộ</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%so_luong%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                          <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center;"><strong>2</strong></td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: left;"><strong>Vận chuyển thiết bị giao tại %vi_tri%</strong></td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center;"><strong>Bộ</strong></td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center;"><strong>%so_luong%</strong></td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center;"></td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: right;">-</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-top: 1px solid #333; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold;">B</td>
                        <td width="273" style="border-right: 1px solid #000; border-top: 1px solid #333; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: left; font-weight: bold;">CHI PHÍ LẮP ĐẶT VÀ KIỂM ĐỊNH</td>
                        <td width="55" style="border-right: 1px solid #000; border-top: 1px solid #333; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold;"></td>
                        <td width="72" style="border-right: 1px solid #000; border-top: 1px solid #333; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold"></td>
                        <td width="161" style="border-right: 1px solid #000; border-top: 1px solid #333; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center; font-weight: bold">%chi_phi_lap_dat_kiem_dinh%</td>
                        <td width="161" style="border-right: 1px solid transparent; border-top: 1px solid #333; border-bottom: 1px solid #333; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: right; font-weight: bold;">%chi_phi_lap_dat_kiem_dinh%</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; ">1</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left; ">Lắp đặt theo chiều cao công trình</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Lần</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%so_luong%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%lap_dat%</td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">%tong_lap_dat%</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="31" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; ">2</td>
                        <td width="273" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: left;">Kiểm định vận thăng</td>
                        <td width="55" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">Lần</td>
                        <td width="72" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%so_luong%</td>
                        <td width="161" style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: center;">%kiem_dinh%</td>
                        <td width="161" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 15px; text-align: right;">%tong_kiem_dinh%</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td align="left" valign="top" style="border-top: 2px solid #ccc">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 18px; text-align: right;font-weight: bold;">
                          Cộng giá trị thực hiện (A+B)
                        </td>
                        <td width="173" style="border-right: 1px solid transparent; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 18px; text-align: right;font-weight: bold;">%gia_tri_thuc_hien%</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 18px; text-align: right;font-weight: bold;">
                          Thuế GTGT 10%
                        </td>
                        <td width="173" style="border-right: 1px solid transparent; border-bottom: 1px solid #000; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 18px; text-align: right;font-weight: bold;">%vat%</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 18px; text-align: right;font-weight: bold;">
                          Tổng cộng 01 bộ
                        </td>
                        <td width="173" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 18px; text-align: right;font-weight: bold;">%tong_cong_sau_thue%</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed;" bgcolor="#ddd">
                      <tr>
                        <td style="border-right: 1px solid #000; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 18px; text-align: right;font-weight: bold;">
                          Tính bằng chữ: %tong_cong_sau_thue_bang_chu% đồng
                        </td>
                        <td width="173" style="border-right: 1px solid transparent; border-bottom: 1px solid transparent; padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 18px; text-align: right;font-weight: bold;"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td style="padding: 5px 0 5px 5px; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: left; font-weight: bold; color: #000; line-height: 1.2">
              II. ĐIỀU KIỆN ÁP DỤNG BẢNG GIÁ
            </td>
          </tr>
          <tr>
            <td style="border: 2px solid #ccc" align="left">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">1. <strong>Đặt hàng</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Khách hàng vui lòng đặt hàng trước 7 ngày.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">2. <strong>Thời gian</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Vận chuyển tập kết đến công trình: 05 ngày kể từ ngày Bên Mua thanh toán đợt 1.<br/>Thi công lắp dựng hoàn tất: khoảng 03 ngày kể từ ngày vận thăng được tập kết đầy đủ.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">3. <strong>Vận chuyển</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bảng báo giá trên đã bao gồm chi phí vận chuyển.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">4. <strong>Lắp đặt và kiểm định</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bảng báo giá trên đã bao gồm chi phí lắp đặt và kiểm định.</td>
                </tr>
                <tr>
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">5. <strong>Thanh toán</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">
                      Thanh toán thành 2 đợt như sau: 
                  </td>
                </tr>
                <tr>
                    <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: right; font-style: italic"><strong>Đợt 1:</strong></td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">
                      <strong>Sau khi ký hợp đồng Bên Mua đặt cọc số tiền %dat_coc1% đồng (Tương đương 50% giá trị hợp đồng)</strong>
                  </td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: right; font-style: italic"><strong>Đợt 2:</strong></td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">
                      <strong>Sau khi Bên Bán lắp đặt theo chiều cao công trình hiện tại và kiểm định xong, Bên Mua thanh toán %dat_coc1% đồng (Tương đương 50% giá trị hợp đồng) trong vòng 07 ngày. Trong trường hợp quá hạn thanh toán Bên Bán có quyền tháo dỡ thiết bị mang về.</strong>
                  </td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">6. <strong>Thuế GTGT</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bảng báo giá trên đã bao gồm thuế GTGT (VAT 10%).</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">7. <strong>Hiệu lực báo giá</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bảng báo giá có hiệu lực trong vòng 30 ngày kể từ ngày báo giá.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">8. <strong>Bảo hành</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Bảo hành sản phẩm do lỗi nhà sản xuất trong thời gian 12 tháng kể từ ngày bàn giao thiết bị. <br/><br/>Sửa chữa tính phí nếu do lỗi vận hành sử dụng.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">9. <strong>Lắp đặt</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">Lắp đặt theo chiều cao công trình hiện hữu và không quá 03 lần lắp nâng chiều cao tiếp theo<br/><br/>Nếu số lần nâng chiều cao >03 lần thì phí nâng là 2 triệu/lần (chưa bao gồm trong báo giá trên) Giá trên chưa bao gồm chi phí xây dựng móng, Nguồn điện 380V/3 phase/50Hz - CB 50A tại chân vận thăng.</td>
                </tr>
                <tr style="border-bottom: 1px solid #ccc">
                  <td width="30%" valign="top" style="border-right: 1px solid #ccc; padding: 5px 5px 5px 20px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;">10. <strong>Ghi chú khác</strong>&nbsp;</td>
                  <td width="70%" style="padding: 5px 5px 5px 3px; line-height: 1.2; font-family: Helvetica, Arial, sans-serif; font-size: 16px;"><strong>Giá trị thiết bị đã qua sử dụng được tính bằng 80% giá trị thiết bị mới.</strong></td>
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
                  <td width="50%" valign="bottom" style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: left; font-weight: bold;">Xác nhận từ khách hàng</td>
                  <td width="50%" style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; text-align: center;">
                    <i>%ngay_bao_gia%</i><br/><br/><strong>CÔNG TY TNHH MTV XD-CK GIA HOÀNG</strong>
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
