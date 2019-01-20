<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaoGiaValidator {

    public function isValidData($data) {
         
        $result = array(
            'message' => ''
        );
        
        if (!$this->isValidHoTen($data)) {
            $result['message'] = 'Họ tên không hợp lệ!';
            return $result;
        }

        if (!$this->isValidEmail($data)) {
            $result['message'] = 'Email không hợp lệ!';
            return $result;
        }

        if (!$this->isValidSDT($data)) {
            $result['message'] = 'Số điện thoại không hợp lệ!';
            return $result;
        }

        if (!$this->isValidCongTy($data)) {
            $result['message'] = 'Tên công ty không hợp lệ!';
            return $result;
        }

        if (!$this->isValidHinhThuc($data)) {
            $result['message'] = 'Chỉ chọn hình thức mua hoặc thuê!';
            return $result;
        }

        if (!$this->isValidAddress($data)) {
            $result['message'] = 'Địa chỉ lắp đặt không tồn tại trên hệ thống!';
            return $result;
        }

        // Kiểm tra thời gian thuê nếu hình thức là "THUÊ"
        if ($data['hinh_thuc'] === 'Thuê' && !$this->isValidThoiGianThue($data)) {
            $result['message'] = 'Thời gian thuê không hợp lệ!';
            return $result;
        }

        if (!$this->isValidLoaiSP($data)) {
            $result['message'] = 'Loại sản phẩm được chọn chỉ gồm vận thăng và giàn giáo! ';
            return $result;
        }

        if ($data['loai_sp'] === 'Vận thăng') {

            if (!$this->isValidVT($data)) {
                $result['message'] = 'Loại vận thăng không hợp lệ!';
                return $result;
            }

            if ($data['loai_vt'] === 'Vận thăng hàng') {
                if (!$this->isValidVTH($data)) {
                    $result['message'] = 'Loại vận thăng hàng đã chọn không hợp lệ!';
                    return $result;
                }
            }
        }
    }

    private function isValidHoTen($data) {
        return !!($data['ho_ten'] && trim($data['ho_ten']));
    }

    private function isValidSDT($data) {
        return preg_match('/^\d{10,15}$/', $data['so_dt']);
    }

    private function isValidEmail($data) {
        return filter_var($data['email'], FILTER_VALIDATE_EMAIL) !== false;
    }

    private function isValidCongTy($data) {
        return ($data['cty'] && trim($data['cty']));
    }

    private function isValidHinhThuc($data) {
        $result = true;
        $hinh_thuc = trim($data['hinh_thuc']);
        switch ($hinh_thuc) {
            case 'Thuê':
            case 'Bán':
                break;
            default:
                $result = false;
        }
        return $result;
    }

    private function isValidLoaiSP($data) {
        $result = true;
        $hinh_thuc = trim($data['loai_sp']);
        switch ($hinh_thuc) {
            case 'Vận thăng':
            case 'Giàn giáo':
                break;
            default:
                $result = false;
        }
        return $result;
    }

    private function isValidVT($data) {
        $result = true;
        $loai_vt = trim($data['loai_vt']);
        switch ($loai_vt) {
            case 'Vận thăng hàng':
            case 'Vận thăng lồng':
                break;
            default:
                $result = false;
        }

        return $result;
    }

    private function isValidVTH($data) {
        $result = true;
        $tl_vth = trim($data['tl_vt_hang']);
        switch ($tl_vth) {
            case '500 kg':
            case '1000 kg':
                break;
            default:
                $result = false;
        }

        return $result;
    }

    private function isValidSoLong($data) {
        $result = true;
        $so_long = trim($data['so_long']);
        switch ($so_long) {
            case '1 lồng':
            case '2 lồng':
                break;
            default:
                $result = false;
        }

        return $result;
    }

    private function isValidTLLong($data) {
        $result = true;
        $tl_long = trim($data['tl_long']);
        switch ($tl_long) {
            case '1 tấn':
            case '2 tấn':
                break;
            default:
                $result = false;
        }

        return $result;
    }

    private function isValidBienTan($data) {
        $result = true;
        $bien_tan = trim($data['bien_tan']);

        switch ($bien_tan) {
            case 'Có':
            case 'Không':
                break;
            default:
                $result = false;
        }

        return $result;
    }

    private function isValidChieuCao($data) {
        $chieu_cao = trim($data['chieu_cao']);
        return $this->isPositiveNumber($chieu_cao);
    }

    private function isValidSoLuong($data) {
        $chieu_cao = trim($data['so_luong']);
        return $this->isPositiveNumber($chieu_cao);
    }

    private function isValidThoiGianThue($data) {
        $chieu_cao = trim($data['thoi_gian_thue']);
        return $this->isPositiveNumber($chieu_cao);
    }

    private function isValidAddress($data) {
        $cities = get_cities();
        $city = trim($data['vi_tri']);
        $district = trim($data['vi_tri2']);
        
        return !!($city && $district && $cities[$city] && $cities[$city][$district]);
    }

    //*
    //Check if a number is positive integer
    //**/
    private function isPositiveNumber($number) {
        $filter_options = array(
            'options' => array('min_range' => 0)
        );
        return filter_var($number, FILTER_VALIDATE_INT, $filter_options) !== FALSE;
    }

}
