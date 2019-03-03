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
            success: function (result) {
//                console.log(result);
                var data = JSON.parse(result);
                showNotification(data.message, data.status.toLowerCase());
                $('#gui-bao-gia').off('click');
//                window.location.href = homeUrl;  

            },
            error: function (xhr, ajaxOptions, thrownError) {
                showNotification('Lưu thông tin báo giá thất bại, vui lòng liên hệ để được hỗ trợ!', 'error');
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

    function updateOrder() {
        $.ajax({
            type: 'POST',
            url: globalConfig.admin_ajax_url,
            data: {
                'action': 'tinh_don_gia',
                'json': JSON.stringify(objectData)
            },
            success: function (objectDt) {
                console.log('vvvv', JSON.parse(objectDt));
                renderFormBaoGia(JSON.parse(objectDt));
            },
            error: function (xhr, ajaxOptions, thrownError) {
                showNotification('Lưu thông tin báo giá thất bại, vui lòng liên hệ để được hỗ trợ.', 'error');
                console.error(thrownError);
            }
        });
    }

    function renderFormBaoGia(data) {
        var text = '';
        switch (data.form_bao_gia) {
            case 'form_vt_long_ban':
                text = $('#template-mua-vtl').text();
                break;
            case 'form_vt_long_thue':
                text = $('#template-thue-vtl').text();
                break;
            case 'form_vt_hang_ban':
                text = data.tl_vt_hang === '500 kg' ? $('#template-mua-vth-500kg').text() : $('#template-mua-vth-1000kg').text();
                break;
            case 'form_vt_hang_thue':
                text = data.tl_vt_hang === '500 kg' ? $('#template-thue-vth-500kg').text() : $('#template-thue-vth-1000kg').text();
                break;
            case 'form_gian_giao_ban':
                text = $('#template-mua-gian-giao').text();
                break;
            case 'form_gian_giao_thue':
                text = $('#template-thue-gian-giao').text();
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

    function showNotification(messsage, type) {
        $.toast({
            text: messsage, // Text that is to be shown in the toast
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
