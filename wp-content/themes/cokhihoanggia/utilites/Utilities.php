<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Utilities {

    public function convert_number_to_words($blocks_three_number) {
        //101,304,230,135
        if(!is_numeric($blocks_three_number)){
            return false;
        }
        
        $string = '';
        $hyphen = ' ';
        $number_array = explode(',', number_format($blocks_three_number));
        
        $block_length = sizeof($number_array);
        if($block_length > 4){
            return false;
        }
        
        $baseUnits = array(
            1 => '',
            2 => 'nghìn',
            3 => 'triệu',
            4 => 'tỷ'
        );
        
        $baseUnits2 = array(1 => '', 2 => 'mươi', 3 => 'trăm');
        $dictionary = array(
            0 => 'không',
            1 => 'một',
            2 => 'hai',
            3 => 'ba',
            4 => 'bốn',
            5 => 'năm',
            6 => 'sáu',
            7 => 'bảy',
            8 => 'tám',
            9 => 'chín'
        );
 
        foreach ($number_array as $block_index => $blocks_three_number){
            
            if((int)$blocks_three_number == 0){
                continue;
            }
            
            $blocks_one_number = str_split($blocks_three_number);
            $number_length = sizeof($blocks_one_number);
            // 105
            foreach ($blocks_one_number as $number_index => $number_value){
                
                switch($number_value){
                    case 0:
                        //Số 0 ở giữa cụm 3 chữ số (hàng chục)
                        if($number_length - $number_index == 2 && $blocks_one_number[$number_length-1] != 0){
                            $string.= 'lẻ';
                        //Số 0 ở vị trí đầu tiên (hàng trăm)
                        }else if($number_length - $number_index == 3){
                            $string.= $dictionary[$number_value].$hyphen.$baseUnits2[$number_length - $number_index];
                        }
                        break;
                    case 5:
                        //Số 5 ở hàng đơn vị, có ít nhất 2 số và số ở hàng chục lớn hơn 0
                        if(($number_length - $number_index == 1) && $number_length > 1 && $blocks_one_number[$number_index - 1] > 0){
                            $string.= 'lăm';
                        }else{
                            $string.= $dictionary[$number_value].$hyphen.$baseUnits2[$number_length - $number_index];
                        }
                        break;
                    case 1:
                        //Số có ít nhất 2 số, ở vị trí hàng đơn vị ko phân biệt cụm và có chữ số hàng chục lớn hơn 1
                        if($number_length > 1 && ($number_length - $number_index == 1) && $blocks_one_number[$number_index - 1] > 1){
                            $string.= 'mốt';
                        //Số ở hàng chục và có giá trị bằng 1
                        }else if($number_length - $number_index == 2){
                            $string.= 'mười';
                        }else{
                            $string.= $dictionary[$number_value].$hyphen.$baseUnits2[$number_length - $number_index];
                        }
                        break;
                    default:
                        $string.= $dictionary[$number_value].$hyphen.$baseUnits2[$number_length - $number_index];
                        break;
                }
                
                //Dont add hyphen in the last
                if($number_index != $number_length){
                    $string.= $hyphen;
                }
            }
            
            // tên hàng (hàng tỷ, hàng triệu, hàng ngàn
            $string.= $hyphen.$baseUnits[$block_length-$block_index];
            
            //Dont add hyphen in the last
            if($block_index != $block_length){
                $string.= $hyphen;
            }
        }
        
        return $string;
    }
}
