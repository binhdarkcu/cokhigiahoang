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
    
    resizeRows();
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

    function resizeRows(){
        var hasOverflowItem = false, maxOverflowSize = 90, scrollWidth = 0, innerWidth = 0, temp = 0, maxTemp = 0;
        
        $('.totalPrice').each(function(index, item){
            scrollWidth = $(item)[0].scrollWidth;
            innerWidth = $(item).innerWidth();
            if(scrollWidth > innerWidth){
                hasOverflowItem = true;
                temp = scrollWidth - innerWidth;
                console.log('tem', temp);
                maxTemp = maxTemp < temp ? temp : maxTemp;
            }
        });
        
        console.log('maxOverflowSize', maxOverflowSize);
        console.log('temp', temp);
        
        $('.totalPrice').each(function(index, item){
            $(item).width(maxOverflowSize + maxTemp);
        });
    }
    $('#print').on('click', function () {
        $.print('#show-content');
    });
});