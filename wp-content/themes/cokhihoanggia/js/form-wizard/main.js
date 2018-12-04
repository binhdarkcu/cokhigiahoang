jQuery(function ($) {

    const form = $("#wizard");
    const modalBaoGia = $("#modal-bao-gia");

    $.extend($.validator.messages, {
        required: "Trường này là bắt buộc.",
        remote: "Please fix this field.",
        email: "Địa chỉ email không hợp lệ.",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Vui lòng chỉ nhập số.",
        digits: "Vui lòng chỉ nhập số.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Please enter the same value again.",
        accept: "Please enter a value with a valid extension.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Vui lòng nhập ít nhất {0} ký tự."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Vui lòng nhập giá trị lớn hơn hoặc bằng {0}.")
    });
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.closest('div').children().last().after(error);
        },
        rules: {
            email: {
                required: true,
                email: true
            },
            so_dt: {
                required: true,
                digits: true,
                minlength: 10
            },
            chieu_cao: {
                required: true,
                number: true,
                min: 1
            },
            so_luong: {
                required: true,
                number: true,
                min: 1
            },
            vi_tri: {
                required: true,
            }
        }
    });

    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Tiếp",
            previous: "Trở về",
            finish: 'Xem báo giá'
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            const ignorePattern = currentIndex === 2 ? ":disabled,:hidden:not(select)" : ":disabled,:hidden";
            form.validate().settings.ignore = ignorePattern;
            if (form.valid() || (currentIndex > newIndex)) {
                if (newIndex >= 1) {
                    $('.steps ul li:first-child a img').attr('src', `${window.styleDirectoyURL}/images/step-1.png`);
                } else {
                    $('.steps ul li:first-child a img').attr('src', `${window.styleDirectoyURL}/images/step-1-active.png`);
                }

                if (newIndex === 1) {
                    $('.steps ul li:nth-child(2) a img').attr('src', `${window.styleDirectoyURL}/images/step-2-active.png`);
                } else {
                    $('.steps ul li:nth-child(2) a img').attr('src', `${window.styleDirectoyURL}/images/step-2.png`);
                }

                if (newIndex === 2) {
                    $('.steps ul li:nth-child(3) a img').attr('src', `${window.styleDirectoyURL}/images/step-3-active.png`);
                } else {
                    $('.steps ul li:nth-child(3) a img').attr('src', `${window.styleDirectoyURL}/images/step-3.png`);
                }

                if (newIndex === 3) {
                    renderStep4();
                    $('.steps ul li:nth-child(4) a img').attr('src', `${window.styleDirectoyURL}/images/step-4-active.png`);
                    $('.actions ul').addClass('step-4');
                } else {
                    $('.steps ul li:nth-child(4) a img').attr('src', `${window.styleDirectoyURL}/images/step-4.png`);
                    $('.actions ul').removeClass('step-4');
                }
                return true;
            }
            return false;


        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled, :hidden";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            const type = 1;
            var text;
            switch (1) {
                case 1:
                    text = $('#template-1').text();
                    break;
                case 2:
                    text = $('#template-2').text();
                    break;
                case 3:
                    text = $('#template-3').text();
                    break;
                    defaut:
                            break;
            }

            //Apply template

            text = template(text, window.GiaHoangProduct);
            $('#detail-content').html(text);
            modalBaoGia.iziModal('setTitle', `Chi tiết báo giá`);
            modalBaoGia.iziModal('setSubtitle', `Báo giá ngày 18/11/2018`);
            modalBaoGia.iziModal('open');
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function () {
        $("#wizard").steps('next');
    })
    $('.backward').click(function () {
        $("#wizard").steps('previous');
    })

    // Create Steps Image
    $('.steps ul li:first-child').append(`<img src="${window.styleDirectoyURL}/images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${window.styleDirectoyURL}/images/step-1-active.png" alt="">`).append('<span class="step-order">Bước 01</span>');
    $('.steps ul li:nth-child(2').append(`<img src="${window.styleDirectoyURL}/images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${window.styleDirectoyURL}/images/step-2.png" alt="">`).append('<span class="step-order">Bước 02</span>');
    $('.steps ul li:nth-child(3)').append(`<img src="${window.styleDirectoyURL}/images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${window.styleDirectoyURL}/images/step-3.png" alt="">`).append('<span class="step-order">Bước 03</span>');
    $('.steps ul li:last-child a').append(`<img src="${window.styleDirectoyURL}/images/step-4.png" alt="">`).append('<span class="step-order">Bước 04</span>');

    if (window)
        window.GiaHoangProduct = {
            'ho_ten': '',
            'so_dt': '',
            'email': '',
            'cty': '',
            'hinh_thuc': 'Mua',
            'loai_sp': 'Vận thăng',
            'loai_vt': 'Vận thăng hàng',
            'tl_vt_hang': '500 kg',
            'so_long': '1 lồng',
            'tl_long': '1 tấn',
            'bien_tan': 'Có',
            'chieu_cao': '',
            'so_luong': '',
            'vi_tri': '',
            'thoi_gian_thue': '',
            'form_bao_gia': 'form_vt_hang'
        };

    setShowHideSection();

    $("input[type=text]").on("change", function () {
        const name = this.name;
        const value = this.value;
        if (window && window.GiaHoangProduct)
            window.GiaHoangProduct[name] = value;
    });

    $("input[type=radio]").on("change", function () {
        const name = this.name;
        const value = this.value;
        if (window && window.GiaHoangProduct)
            window.GiaHoangProduct[name] = value;
        setShowHideSection();
    });


    function setShowHideSection() {
        var sp = window.GiaHoangProduct;
        //Sản phẩm là vận thăng 
        if (sp.loai_sp === 'Vận thăng') {
            $('#loai_vt').show();
            $('#sl_gian_giao, #so_luong').hide();
            $('#chieu_cao').show();

            //Sản phẩm là vt hàng
            if (sp.loai_vt === 'Vận thăng hàng') {
                $('#tl_hang').show();
                $('#so_long').hide();
                $('#tl_long').hide();
                $('#bien_tan').hide();
                sp.form_bao_gia = 'form_vt_hang';
                //Sản phẩm là vt lồng
            } else {
                $('#tl_hang').hide();
                $('#so_long').show();
                $('#tl_long').show();
                $('#bien_tan').show();
                sp.form_bao_gia = 'form_vt_long';

            }

            //Sản phẩm là giàn giáo
        } else {
            $('#sl_gian_giao, #so_luong').show();
            $('#chieu_cao').hide();
            $('#loai_vt').hide();
            $('#tl_hang').hide();
            $('#so_long').hide();
            $('#tl_long').hide();
            $('#bien_tan').hide();
            sp.form_bao_gia = 'form_gian_giao';
        }

        if (sp.hinh_thuc === 'Mua') {
            $('#thoi_gian_thue').hide();
            sp.form_bao_gia += '_mua';
        } else {
            $('#thoi_gian_thue').show();
            sp.form_bao_gia += '_thue';
        }
    }

    $('.chon-vi-tri').chosen({width: "100%"});
    $('.chon-vi-tri').chosen({no_results_text: "Không có kết quả!"});
    $('.chon-vi-tri').chosen().change(function () {
        //re-validate select
        $('#vi_tri-error').remove();
        if (window && window.GiaHoangProduct)
            window.GiaHoangProduct['vi_tri'] = this.options[this.selectedIndex].value;
    });

    function renderStep4() {
        const translations = {
            'ho_ten': 'Họ tên',
            'so_dt': 'Số điện thoại',
            'email': 'Emal',
            'cty': 'Công ty',
            'hinh_thuc': 'Hình thức',
            'loai_sp': 'Loại sản phẩm',
            'loai_vt': 'Loại vận thang',
            'tl_vt_hang': 'Trọng lượng',
            'tl_long': 'Trọng lượng',
            'chieu_cao': 'Chiều cao',
            'vi_tri': 'Vị trí',
            'thoi_gian_thue': 'Thời gian thuê',
            'so_long': 'Số lồng',
            'bien_tan': 'Biến tần',
        };
        const form_bao_gia = {
            'form_vt_hang_mua': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'tl_vt_hang', 'chieu_cao', 'vi_tri'],
            'form_vt_hang_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'tl_vt_hang', 'chieu_cao', 'vi_tri', 'thoi_gian_thue'],
            'form_vt_long_mua': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'so_long', 'tl_long', 'bien_tan', 'chieu_cao', 'vi_tri'],
            'form_vt_long_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'so_long', 'tl_long', 'bien_tan', 'chieu_cao', 'vi_tri', 'thoi_gian_thue'],
            'form_gian_giao_mua': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'so_luong', 'vi_tri'],
            'form_gian_giao_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'so_luong', 'vi_tri', 'thoi_gian_thue']
        };
        var sp = window.GiaHoangProduct;
        sp.submitData = {};
        var html = '';
        const fields = form_bao_gia[sp.form_bao_gia];
        fields.forEach(function (item) {
            html += `<tr class="cart-subtotal"> <th>${translations[item]}</th> <td>${sp[item]} ${item === 'thoi_gian_thue' ? 'ngày' : ''} ${item === 'chieu_cao' ? 'm' : ''}</td></tr>`;
            sp.submitData[item] = sp[item];
        });
        $('#review-section').html(html);
    }

    //Handle modal action
    modalBaoGia.iziModal({
        width: 850,
        closeButton: false,
        radius: 5,
        top: 35,
        bottom: 10,
        overlayClose: false
    });

    $('#gui-bao-gia').on('click', function (e) {
        e.preventDefault();
        modalBaoGia.iziModal('startLoading');

        $.ajax({
            type: "post",
            url: globalConfig.admin_ajax_url,
            data: {
                'action': 'tao_bao_gia',
                'security': $('#ajax_nonce').val(),
                'json': JSON.stringify(GiaHoangProduct.submitData)
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
                modalBaoGia.iziModal('stopLoading');
                modalBaoGia.iziModal('close');
                $("#wizard-t-0").click();
                form.validate().resetForm();
                form[0].reset();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                modalBaoGia.iziModal('stopLoading');
                modalBaoGia.iziModal('close');
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
})
