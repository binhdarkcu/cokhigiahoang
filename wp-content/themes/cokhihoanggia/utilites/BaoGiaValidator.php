<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaoGiaValidator {
    
    public function isValidData($data){
        
    }
    
    private function isValidHoTen($data){
        return ($data['ho_ten'] && trim($data['ho_ten']));
    }
    
    private function isValidSDT($data){
        return !!preg_match('^(?=.*\d)[\d]{10,13}$', $data['so_dt']);
    }
    
    private function isValidEmail($data){
        return filter_var($data['email'], FILTER_VALIDATE_EMAIL) !== false;
    }
    
    private function isValidCongTy($data){
        return ($data['cty'] && trim($data['cty']));
    }
    
    private function isValidHinhThuc($data){
        $result = true;
        $hinh_thuc = trim($data['hinh_thuc']);  

        switch($hinh_thuc){
            case 'Bán':
            case 'Mua':
                break;
            default:
                $result = false;
        }
        
        return $result;
    }
    
    private function isValidLoaiSP($data){
        $result = true;
        $hinh_thuc = trim($data['loai_sp']);  

        switch($hinh_thuc){
            case 'Vận thăng':
            case 'Giàn giáo':
                break;
            default:
                $result = false;
        }
        
        return $result;
    }
}