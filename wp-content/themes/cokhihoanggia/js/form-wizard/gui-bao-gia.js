/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(function ($) {
    console.log('load ok');
    const stringData = Base64.decode(token);
    const objectData = JSON.parse(stringData);

    // Main flow
    renderFormBaoGia(objectData);
    // Set default value before getting update from server
    $('.so-luong').each(function () {
        this.value = 1;
        objectData[this.name] = 1;
        this.disabled = false;
    });
    updateOrder();

    //---------------------------------
    $('#gui-bao-gia').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: globalConfig.admin_ajax_url,
            data: {
                'action': 'tao_bao_gia',
                'security': $('#ajax_nonce').val(),
                'json': JSON.stringify(objectData)
            },
            success: function (msg) {
                $.toast({
                    text: "Thông tin báo giá của bạn đã được lưu thành công.", // Text that is to be shown in the toast
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
                console.log(msg);

                $('#gui-bao-gia').off('click');
                window.location.href = homeUrl;
            },
            error: function (xhr, ajaxOptions, thrownError) {

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
                console.error(thrownError);
            }
        });
    });

    function template(text, data) {
        return text
                .replace(
                        /%(\w*)%/g, // or /{(\w*)}/g for "{this} instead of %this%"
                        function (m, key) {
                            return data.hasOwnProperty(key) ? data[ key ] : "";
                        }
                );
    }


    function totalPrices() {
        var total = 0;
        $('#tblGianGiao .totalPrice').each(function (index, value) {
            total = total + Number($(value).html().replace(/[^0-9.-]+/g, ""))
        });
        return total;
    }

    function totalWeight() {
        var total = 0;
        $('#tblGianGiao .MassNumber').each(function (index, value) {
            total = total + Number($(value).html().replace(/[^0-9.-]+/g, ""))
        });
        return total;

    }


    function updateOrder() {
        $.ajax({
            type: 'POST',
            url: globalConfig.admin_ajax_url,
            data: {
                'action': 'tinh_don_gia',
                'json': JSON.stringify(objectData)
            },
            success: function (objectDt) {
                console.log(JSON.parse(objectDt));
                renderFormBaoGia(JSON.parse(objectDt));
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $.toast({
                    text: "Lấy thông tin thất bại, vui lòng liên hệ để được hỗ trợ.", // Text that is to be shown in the toast
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
                console.error(thrownError);
            }
        });
    }

    function renderFormBaoGia(data) {
        var text = '';
        switch (data.form_bao_gia) {
            case 'form_vt_long_ban':
            case 'form_vt_long_thue':
                text = $('#template-1').text();
                break;
            case 'form_vt_hang_ban':
                text = $('#template-2').text();
                break;
            case 'form_vt_hang_thue':
                text = $('#template-1').text();
                break;
            case 'form_gian_giao_ban':
                text = $('#template-3').text();
                break;
            case 'form_gian_giao_thue':
                text = $('#template-4').text();
                break;
            default:
                break;
        }
        text = template(text, data);

        $('#form-wrapper').html(text);

        // Re-enable input whenever reload template
        $('.so-luong').each(function (index, item) {
            item.disabled = false;
        });

        $("#tblGianGiao .so-luong").on("change", function () {
            objectData[this.name] = this.value;
            updateOrder();
        });
    }
});
