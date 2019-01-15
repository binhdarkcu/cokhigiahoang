
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addCommas(nStr) {
    nStr = nStr.replace(/[, ]+/g, "").trim();
    nStr = parseInt( nStr || 0);
    nStr = isNaN(nStr) ? '0' : nStr.toString();
    
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function sendPostRequest(_data, callback, showMsg) {
    showMsg = typeof showMsg == 'undefined';
    jQuery.ajax({
        type: 'POST',
        url: ajaxurl,
        data: _data,
        success: function (result) {
            if(showMsg) showSuccessMsg();
            callback(null, result);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            if(showMsg) showErrorMsg();
            callback(thrownError);
        }
    });
}

// Show success message
function showSuccessMsg() {
    jQuery.toast({
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
    jQuery.toast({
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

