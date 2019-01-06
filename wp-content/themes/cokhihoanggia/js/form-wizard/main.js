
jQuery(function ($) {

    const form = $("#wizard");
    const modalBaoGia = $("#modal-bao-gia");
    $.validator.addMethod("anyDate",
            function (value, element) {
                return value.match(/^(0?[1-9]|[12][0-9]|3[0-1])[/., -](0?[1-9]|1[0-2])[/., -](19|20)?\d{2}$/);
            },
            "Nhập một ngày hợp lệ!"
            );

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
        max: jQuery.validator.format("Chỉ nhập số nhỏ hơn hoặc bằng {0}."),
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
                min: 1,
                max: 999
            },
            so_luong: {
                required: true,
                number: true,
                min: 1,
                max: 999
            },
            thoi_gian_thue: {
                required: true,
                number: true,
                min: 1,
                max: 999
            },
            vi_tri: {
                required: true,
            },
            vi_tri2: {
                required: true,
            },
            ngay_can_hang: {
                required: true,
                anyDate: true
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
            const ignorePattern = currentIndex === 1 ? ":disabled,:hidden:not(select)" : ":disabled,:hidden";
            form.validate().settings.ignore = ignorePattern;
            console.log(templateUrl)
            if (form.valid() || (currentIndex > newIndex)) {
                if (newIndex >= 1) {
                    $('.steps ul li:first-child a img').attr('src', `${templateUrl}/assets/form-wizard/images/step-1.png`);
                } else {
                    $('.steps ul li:first-child a img').attr('src', `${templateUrl}/assets/form-wizard/images/step-1-active.png`);
                }

                if (newIndex === 1) {
                    $('.steps ul li:nth-child(2) a img').attr('src', `${templateUrl}/assets/form-wizard/images/step-2-active.png`);
                } else {
                    $('.steps ul li:nth-child(2) a img').attr('src', `${templateUrl}/assets/form-wizard/images/step-2.png`);
                }

                if (newIndex === 2) {
                    $('.steps ul li:nth-child(3) a img').attr('src', `${templateUrl}/assets/form-wizard/images/step-3-active.png`);
                } else {
                    $('.steps ul li:nth-child(3) a img').attr('src', `${templateUrl}/assets/form-wizard/images/step-3.png`);
                }

                if (newIndex === 3) {
                    renderStep4();
                    $('.steps ul li:nth-child(4) a img').attr('src', `${templateUrl}/assets/form-wizard/images/step-4-active.png`);
                    $('.actions ul').addClass('step-4');
                } else {
                    $('.steps ul li:nth-child(4) a img').attr('src', `${templateUrl}/assets/form-wizard/images/step-4.png`);
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
            var text;
            switch (window.GiaHoangProduct.form_bao_gia) {
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
                case 'form_gian_giao_thue':
                    text = $('#template-3').text();
                    break;
                    defaut:
                            break;
            }

            //Apply template
            const token = Base64.encode(JSON.stringify(GiaHoangProduct.submitData));
            window.open(`${homeUrl}/gui-bao-gia?token=${token}`, '_self');
            //window.top.close();
//            text = template(text, window.GiaHoangProduct);
//            $('#detail-content').html(text);
//            modalBaoGia.iziModal('setTitle', `Chi tiết báo giá`);
//            modalBaoGia.iziModal('setSubtitle', `Báo giá ngày 18/11/2018`);
//            modalBaoGia.iziModal('open');
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
    $('.steps ul li:first-child').append(`<img src="${templateUrl}/assets/form-wizard/images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${templateUrl}/assets/form-wizard/images/step-1-active.png" alt="">`).append('<span class="step-order">Bước 01</span>');
    $('.steps ul li:nth-child(2').append(`<img src="${templateUrl}/assets/form-wizard//images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${templateUrl}/assets/form-wizard/images/step-2.png" alt="">`).append('<span class="step-order">Bước 02</span>');
    $('.steps ul li:nth-child(3)').append(`<img src="${templateUrl}/assets/form-wizard//images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${templateUrl}/assets/form-wizard/images/step-3.png" alt="">`).append('<span class="step-order">Bước 03</span>');
    $('.steps ul li:last-child a').append(`<img src="${templateUrl}/assets/form-wizard//images/step-4.png" alt="">`).append('<span class="step-order">Bước 04</span>');

    if (window)
        window.GiaHoangProduct = {
            'ho_ten': '',
            'so_dt': '',
            'email': '',
            'cty': '',
            'hinh_thuc': '',
            'loai_sp': '',
            'loai_vt': '',
            'tl_vt_hang': '',
            'so_long': '',
            'tl_long': '',
            'bien_tan': '',
            'chieu_cao': '',
            'so_luong': '',
            'vi_tri': '',
            'vi_tri2': '',
            'thoi_gian_thue': '',
            'form_bao_gia': 'form_vt_hang',
            'ngay_can_hang': ''
        };

    setShowHideSection();

    $("input[type=text]").on("change", function () {
        const name = this.name;
        const value = this.value;
        console.log(`Name: ${name} - Value ${value}`);
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


        if (sp.hinh_thuc) {
            $('#loai_sp').fadeIn();

            if (sp.loai_sp === 'Vận thăng') {
                $('#chieu_cao').fadeIn();
                $('#loai_vt').fadeIn();
                if (sp.loai_vt === 'Vận thăng hàng') {

                    $('#tl_vt_hang').fadeIn();
                    $('#so_long').hide();
                    $('#tl_long').hide();
                    $('#bien_tan').hide();
                    sp.form_bao_gia = 'form_vt_hang';

                } else if (sp.loai_vt === 'Vận thăng lồng') {

                    $('#tl_vt_hang').hide();
                    $('#so_long').fadeIn();

                    if (sp.so_long) {
                        $('#tl_long').fadeIn();

                        if (sp.tl_long) {
                            $('#bien_tan').fadeIn();
                        }

                    }
                    sp.form_bao_gia = 'form_vt_long';
                }
            } else if (sp.loai_sp === 'Giàn giáo') {
                $('#loai_vt').hide();
                $('#chieu_cao').hide();
                $('#tl_vt_hang').hide();
                $('#tl_long').hide();
                $('#so_long').hide();
                $('#bien_tan').hide();
                sp.form_bao_gia = 'form_gian_giao';
            }

            if (sp.hinh_thuc === 'Bán') {
                $('#thoi_gian_thue').hide();
                sp.form_bao_gia += '_ban';
            } else {
                $('#thoi_gian_thue').show();
                sp.form_bao_gia += '_thue';
            }

        } else {
            //Hide all
            $('#loai_vt').hide();
            $('#loai_sp').hide();
            $('#bien_tan').hide();
            $('#tl_vt_hang').hide();
            $('#tl_long').hide();
            $('#so_long').hide();
        }
    }

    $('#vi_tri').empty();
    $("#vi_tri").append('<option value=""></option>');
    $.each(TPs(), function (key, value) {
        $("#vi_tri").append('<option value="' + key + '">' + key + '</option>');
    });

    $('.chon-vi-tri').chosen({width: "100%", no_results_text: "Không có kết quả cho "});
    $('.chon-vi-tri').chosen().change(function () {
        //re-validate select
        const selected = this.options[this.selectedIndex].value;
        if (window && window.GiaHoangProduct)
            window.GiaHoangProduct[this.name] = selected;

        if (this.name === 'vi_tri') {
            $('#vi_tri-error').remove();
            $('#vi_tri2').empty();
            $("#vi_tri2").append('<option value=""></option>');
            $('#vi_tri2').chosen({width: "100%", no_results_text: "Không có kết quả cho "});
            $.each(TPs()[selected], function (index, value) {
                $("#vi_tri2").append('<option value="' + value + '">' + value + '</option>');
            });
            $("#vi_tri2").trigger("chosen:updated");
        } else {
            $('#vi_tri2-error').remove();
        }
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
            'so_luong': 'Số lượng',
            'ngay_can_hang': 'Ngày cần hàng'
        };
        const form_bao_gia = {
            'form_vt_hang_ban': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'chieu_cao', 'tl_vt_hang', 'vi_tri', 'vi_tri2', 'ngay_can_hang', 'form_bao_gia'],
            'form_vt_hang_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'chieu_cao', 'tl_vt_hang', 'vi_tri', 'vi_tri2', 'ngay_can_hang', 'thoi_gian_thue', 'form_bao_gia'],
            'form_vt_long_ban': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'so_long', 'tl_long', 'chieu_cao', 'bien_tan', 'vi_tri', 'vi_tri2', 'ngay_can_hang', 'form_bao_gia'],
            'form_vt_long_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'so_long', 'tl_long', 'chieu_cao', 'bien_tan', 'vi_tri', 'vi_tri2', 'ngay_can_hang', 'thoi_gian_thue', 'form_bao_gia'],
            'form_gian_giao_ban': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'so_luong', 'vi_tri', 'vi_tri2', 'ngay_can_hang', 'form_bao_gia'],
            'form_gian_giao_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'so_luong', 'vi_tri', 'vi_tri2', 'thoi_gian_thue', 'ngay_can_hang', 'form_bao_gia']
        };
        var sp = window.GiaHoangProduct;
        sp.submitData = {};
        var sanpham = '';
        const fields = form_bao_gia[sp.form_bao_gia];
        fields.forEach(function (item) {
            sp.submitData[item] = sp[item];
            var dvt = '';
            switch (item) {
                case 'thoi_gian_thue':
                    dvt = 'tháng';
                    break;
                case 'so_luong':
                    dvt = 'bộ';
                    break;
                case 'chieu_cao':
                    dvt = 'm';
                    break;
                case 'bien_tan':
                    dvt = 'biến tần';
                    break;
                default:
                    break;

            }
            if (item !== 'ho_ten' && item !== 'so_dt' && item !== 'email' && item !== 'cty' && item !== 'vi_tri' && item !== 'vi_tri2' && item !== 'form_bao_gia' && item !== 'ngay_can_hang') {
                sanpham += 'hinh_thuc' && sp[item] === 'Bán' ? 'Mua /' : ` ${sp[item]} ${dvt}/`;

            }
        });

        sanpham = sanpham.substring(0, sanpham.length - 1);

        var html = `
        <tr class="cart-subtotal">
            <th class="summary-heading">1. Thông tin khách hàng</th>
        </tr>
        <tr class="cart-subtotal">
            <th>Họ tên</th> <td>${sp['ho_ten']}</td>
        </tr>
        <tr class="cart-subtotal">
            <th>Số điện thoại</th>
            <td>${sp['so_dt']}</td>
        </tr>
        <tr class="cart-subtotal">
            <th>Emal</th>
            <td>${sp['email']}</td>
        </tr>
        <tr class="cart-subtotal">
            <th>Công ty</th>
            <td>${sp['cty']}</td>
        </tr>
        <tr class="cart-subtotal">
            <th class="summary-heading">2. Sản phẩm</th>
        </tr>
        <tr class="cart-subtotal" style="position: relative;">
            <td style="height: 35px;">
                <div style="position: absolute; width: 100%">${sanpham}</div>
            </td>
        </tr>
        <tr class="cart-subtotal">
            <th class="summary-heading">3. Vị trí lắp đặt</th>
        </tr>
        <tr class="cart-subtotal">
            <th>Vị trí</th>
            <td>${sp['vi_tri2']} - ${sp['vi_tri']}</td>
        </tr>
        <tr class="cart-subtotal">
            <th>Ngày cần hàng</th>
            <td>${sp['ngay_can_hang']}</td>
        </tr>
        `;

        $('#review-section').html(html);
    }

    $("#datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: new Date(),
        option: $.datepicker.regional['vi']
    });

    function TPs() {
        if(Cities) return Cities;
        return {'':[]};
    }

});
