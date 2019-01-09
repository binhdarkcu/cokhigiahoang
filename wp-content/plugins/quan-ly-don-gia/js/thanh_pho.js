/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
    // Update value
    $('.geography-data').on('change', function () {
        const city = $(this).data('city');
        const district = $(this).data('district');
        const index = $(this).data('index')
        Cities[city][district][index] = this.value;
    });

    // Save value
    $('#luu-thay-doi').on('click', function () {
        sendPostRequest({action: 'cap_nhat_thanh_pho', setting_key: 'thanh_pho',setting_value: JSON.stringify(Cities)}, function (err, success) {
            if (!err) {
                console.log('callback success result:', success);
            } else {
                console.log('callback failed!');
            }
        });
    });


    function sendPostRequest(_data, callback) {
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: _data,
            success: function (result) {
//                console.log('result: ', result);
                showSuccessMsg();
                callback(null, result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                showErrorMsg();
//                console.error(thrownError);
                callback(thrownError);
            }
        });
    }

    // Show success message
    function showSuccessMsg() {
        $.toast({
            text: "Thông tin đã được cập nhật thành công.", // Text that is to be shown in the toast
            heading: 'Hệ thống', // Optional heading to be shown on the toast
            icon: 'success', // Type of toast icon
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

    // Show error message
    function showErrorMsg() {
        $.toast({
            text: "Lưu thông tin báo giá thất bại, vui lòng liên hệ để được hỗ trợ.", // Text that is to be shown in the toast
            heading: 'Hệ thống', // Optional heading to be shown on the toast
            icon: 'error', // Type of toast icon
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
console.log('Hello from thanh_pho.js');