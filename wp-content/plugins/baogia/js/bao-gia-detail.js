/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    var text = $('#template').text();
    text = template(text, BaoGia);
    $('#show-content').html(text);
    if(BaoGia.loai_sp === 'Giàn giáo'){
        var counter = 1;
        $('#detail-content').find('.so-luong').each(function(item){
            if(this.value != 0){
                $(this).closest('tr').children().first().html(counter++);
            }else{
                $(this).closest('tr').remove();
            }
        });
    }    
    // Replace template engine
    function template(text, data) {
        return text
                .replace(
                        /%(\w*)%/g, // or /{(\w*)}/g for "{this} instead of %this%"
                        function (m, key) {
                            return data.hasOwnProperty(key) ? data[ key ] : "";
                        }
                );
    }


    $('#print').on('click', function () {
        $.print('#show-content');
    });
});