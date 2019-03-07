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

    // Send post request
    function sendPostRequest(_data, callback) {
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: _data,
            success: function (result) {
                console.log('result: ', result);
                showNotification('Thông tin đã được cập nhật thành công.', 'success');
                callback(null, result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                showNotification('Lưu thông tin báo giá thất bại, vui lòng liên hệ để được hỗ trợ.', 'error');
                console.error(thrownError);
                callback(thrownError);
            }
        });
    }
    
    function showNotification(msg, type) {
        $.toast({
            text: msg, // Text that is to be shown in the toast
            heading: 'Hệ thống', // Optional heading to be shown on the toast
            icon: type, // Type of toast icon
            showHideTransition: 'slide', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
            textAlign: 'left', // Text alignment i.e. left, right or center
            loader: true, // Whether to show loader or not. True by default
            loaderBg: '#9EC600', // Background color of the toast loader
        });
    }
    
});