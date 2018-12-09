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
                case 'form_vt_hang_thue':
                    text = $('#template-2').text();
                    break;
                case 'form_gian_giao_ban':
                case 'form_gian_giao_thue':
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
        }else{
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
            'form_vt_hang_ban': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'tl_vt_hang', 'chieu_cao', 'vi_tri', 'ngay_can_hang', 'form_bao_gia'],
            'form_vt_hang_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'tl_vt_hang', 'chieu_cao', 'vi_tri', 'ngay_can_hang','thoi_gian_thue', 'form_bao_gia'],
            'form_vt_long_ban': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'so_long', 'tl_long', 'bien_tan', 'chieu_cao', 'vi_tri', 'ngay_can_hang','form_bao_gia'],
            'form_vt_long_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'loai_vt', 'so_long', 'tl_long', 'bien_tan', 'chieu_cao', 'vi_tri', 'ngay_can_hang','thoi_gian_thue', 'form_bao_gia'],
            'form_gian_giao_ban': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'so_luong', 'vi_tri', 'chieu_cao', 'ngay_can_hang', 'form_bao_gia'],
            'form_gian_giao_thue': ['ho_ten', 'so_dt', 'email', 'cty', 'hinh_thuc', 'loai_sp', 'so_luong', 'vi_tri', 'thoi_gian_thue', 'chieu_cao', 'ngay_can_hang', 'form_bao_gia']
        };
        var sp = window.GiaHoangProduct;
        sp.submitData = {};
        var html = '';
        const fields = form_bao_gia[sp.form_bao_gia];
        fields.forEach(function (item) {
            var dvt = '';
            switch(item){
                case 'thoi_gian_thue':
                    dvt = 'tháng';
                    break;
                case 'so_luong':
                    dvt = 'bộ';
                    break;
                case 'chieu_cao':
                    dvt = 'm';
                    break;
                default:
                    break;
                
            }
            
            if (item !== 'form_bao_gia') {
                html += `<tr class="cart-subtotal"> <th>${translations[item]}</th> <td>${sp[item] === 'Bán' ? 'Mua' : sp[item]} ${dvt}</td></tr>`;
            }
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
                //  doc.fromHTML(jQuery('#modal-bao-gia').html(), 15, 15, {
                //     'width': 170,
                //     'elementHandlers': specialElementHandlers
                // });
                // doc.save('sample-file.pdf');
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

    $("#datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: new Date(),
        option: $.datepicker.regional['vi']
    });
    
    function TPs(){
        const TPs = {
        'Tp Hồ Chí Minh': [
            'Quận 1',
            'Quận 2',
            'Quận 3',
            'Quận 4',
            'Quận 5',
            'Quận 6',
            'Quận 7',
            'Quận 8',
            'Quận 9',
            'Quận 10',
            'Quận 11',
            'Quận 12',
            'Quận Bình Tân',
            'Quận Bình Thạnh',
            'Quận Gò Vấp',
            'Quận Phú Nhuận',
            'Quận Tân Bình',
            'Quận Tân Phú',
            'Quận Thủ Đức',
            'Huyện Bình Chánh',
            'Huyện Cần Giờ',
            'Huyện Củ Chi',
            'Huyện Hóc Môn',
            'Huyện Nhà Bè'
        ],
        'Hà Nội': [
            'Quận Ba Đình',
            'Quận Hoàn Kiếm',
            'Quận Hai Bà Trưng',
            'Quận Đống Đa'
        ],
        'Đà Nẵng': [
            'Huyện Hoàng Sa',
            'Quận Thanh Khê',
            'Huyện Hòa Vang',
            'Quận Sơn Trà',
            'Quận Liên Chiểu',
            'Quận Hải Châu',
            'Quận Cẩm Lệ',
            'Quận Ngũ Hành'
        ],
        'An Giang': [
            'Huyện An Phú',
            'Huyện Tịnh Biên',
            'Huyện Châu Phú',
            'Huyện Phú Tân',
            'Thành phố Châu Đốc',
            'Thành phố Long Xuyên',
            'Huyện Tri Tôn',
            'Thị xã Tân Châu',
            'Huyện Thoại Sơn'
        ],
        'Bà Rịa - Vũng Tàu': [
            'Huyện Xuyên Mộc', 
            'Huyện Côn Đảo',
            'Huyện Long Điền',
            'Huyện Châu Đức',
            'Thành phố Vũng Tàu',
            'Huyện Tân Thành',
            'Thành phố Bà Rịa',
            'Huyện Đất Đỏ'
        ],
        'Bắc Giang': [
            'Huyện Lục Ngạn',
            'Huyện Sơn Động',
            'Huyện Hiệp Hòa',
            'Thành phố Bắc Giang',
            'Huyện Tân Yên',
            'Huyện Việt Yên',
            'Huyện Yên Dũng',
            'Huyện Lạng Giang',
            'Huyện Yên Thế',
            'Huyện Lục Nam'
        ],
        'Bắc Kạn': [
            'Huyện Ngân Sơn', 
            'Huyện Chợ Đồn', 
            'Huyện Ba Bể', 
            'Huyện Chợ Mới', 
            'Huyện Bạch Thông', 
            'Thành Phố Bắc Kạn', 
            'Huyện Na Rì', 
            'Huyện Pác Nặm'
        ], 
        'Bạc Liêu': [
            'Thành phố Bạc Liêu', 
            'Huyện Vĩnh Lợi', 
            'Thị xã Giá Rai', 
            'Huyện Hồng Dân', 
            'Huyện Phước Long', 
            'Huyện Đông Hải', 
            'Huyện Hoà Bình'
        ],
        'Bắc Ninh': [
            'Huyện Gia Bình', 
            'Huyện Quế Võ', 
            'Huyện Tiên Du', 
            'Thị xã Từ Sơn', 
            'Huyện Lương Tài', 
            'Huyện Yên Phong', 
            'Huyện Thuận Thành', 
            'Thành phố Bắc Ninh'
        ],
        'Bến Tre': [
            'Huyện Bình Đại', 
            'Huyện Châu Thành', 
            'Huyện Ba Tri', 
            'Huyện Thạnh Phú', 
            'Huyện Chợ Lách', 
            'Huyện Mỏ Cày Nam', 
            'Huyện Giồng Trôm', 
            'Thành phố Bến Tre', 
            'Huyện Mỏ Cày Bắc'
        ], 
        'Bình Dương': [
            'Huyện Bắc Tân Uyên', 
            'Thị xã Thuận An', 
            'Thị xã Tân Uyên', 
            'Thị xã Dĩ An', 
            'Thị xã Bến Cát', 
            'Huyện Dầu Tiếng', 
            'Huyện Phú Giáo', 
            'Thành phố Thủ Dầu Một', 
            'Huyện Bàu Bàng'
        ],
        'Bình Phước': [
            'Huyện Phú Riềng', 
            'Huyện Bù Đăng', 
            'Thị xã Đồng Xoài', 
            'Huyện Đồng Phú', 
            'Thị xã Bình Long', 
            'Huyện Lộc Ninh', 
            'Thị xã Phước Long', 
            'Huyện Chơn Thành', 
            'Huyện Bù Đốp', 
            'Huyện Bù Gia Mập', 
            'Huyện Hớn Quản'
        ],
        'Bình Thuận': [
            'Huyện Bắc Bình', 
            'Thị xã La Gi', 
            'Huyện Hàm Thuận Nam', 
            'Huyện Hàm Tân', 
            'Huyện Phú Quí', 
            'Huyện Tuy Phong', 
            'Huyện Đức Linh', 
            'Huyện Tánh Linh', 
            'Huyện Hàm Thuận Bắc', 
            'Thành phố Phan Thiết'
        ], 
        'Bình Định': [
            'Huyện Tây Sơn', 
            'Huyện Hoài Ân', 
            'Huyện Vân Canh', 
            'Huyện Hoài Nhơn', 
            'Huyện Tuy Phước', 
            'Thị xã An Nhơn', 
            'Huyện Phù Mỹ', 
            'Thành phố Qui Nhơn', 
            'Huyện Phù Cát', 
            'Huyện An Lão', 
            'Huyện Vĩnh Thạnh'
        ], 
        'Cà Mau': [
            'Huyện Đầm Dơi', 
            'Huyện Cái Nước', 
            'Huyện U Minh', 
            'Huyện Thới Bình', 
            'Huyện Ngọc Hiển', 
            'Thành phố Cà Mau', 
            'Huyện Trần Văn Thời', 
            'Huyện Năm Căn', 
            'Huyện Phú Tân'
        ], 
        'Cần Thơ': [
            'Huyện Cờ Đỏ', 
            'Huyện Phong Điền', 
            'Quận Ô Môn', 
            'Quận Cái Răng', 
            'Quận Bình Thuỷ', 
            'Quận Ninh Kiều', 
            'Quận Thốt Nốt', 
            'Huyện Vĩnh Thạnh', 
            'Huyện Thới Lai'
        ], 
        'Cao Bằng': [
            'Huyện Hạ Lang', 
            'Huyện Phục Hoà', 
            'Huyện Trùng Khánh', 
            'Huyện Trà Lĩnh', 
            'Huyện Bảo Lâm', 
            'Huyện Bảo Lạc', 
            'Huyện Hà Quảng', 
            'Huyện Quảng Uyên', 
            'Huyện Thông Nông', 
            'Huyện Thạch An', 
            'Huyện Nguyên Bình', 
            'Huyện Hoà An', 
            'Thành phố Cao Bằng'
        ], 
        'Gia Lai': [
            'Thị xã Ayun Pa', 
            'Thị xã An Khê', 
            'Huyện Phú Thiện', 
            'Huyện Đăk Pơ', 
            'Huyện Ia Pa', 
            'Huyện Mang Yang', 
            'Huyện Kông Chro', 
            'Huyện Krông Pa', 
            'Huyện KBang', 
            'Huyện Chư Prông', 
            'Huyện Đức Cơ', 
            'Huyện Chư Sê', 
            'Huyện Đăk Đoa', 
            'Huyện Ia Grai', 
            'Huyện Chư Păh', 
            'Thành phố Pleiku', 
            'Huyện Chư Pưh'
        ], 
        'Hà Giang': [
            'Huyện Quang Bình', 
            'Huyện Vị Xuyên', 
            'Huyện Xín Mần', 
            'Huyện Yên Minh', 
            'Huyện Quản Bạ', 
            'Huyện Bắc Mê', 
            'Huyện Đồng Văn', 
            'Huyện Hoàng Su Phì', 
            'Huyện Bắc Quang', 
            'Huyện Mèo Vạc', 
            'Thành phố Hà Giang'
        ], 
        'Hà Nam': [
            'Thành phố Phủ Lý', 
            'Huyện Bình Lục', 
            'Huyện Duy Tiên', 
            'Huyện Kim Bảng', 
            'Huyện Lý Nhân', 
            'Huyện Thanh Liêm'
        ], 
        'Hà Tĩnh': [
            'Thị xã Kỳ Anh', 
            'Huyện Cẩm Xuyên', 
            'Huyện Vũ Quang', 
            'Thành phố Hà Tĩnh', 
            'Thị xã Hồng Lĩnh', 
            'Huyện Kỳ Anh', 
            'Huyện Can Lộc', 
            'Huyện Hương Sơn', 
            'Huyện Nghi Xuân', 
            'Huyện Hương Khê', 
            'Huyện Đức Thọ', 
            'Huyện Thạch Hà', 
            'Huyện Lộc Hà'
        ], 
        'Hải Dương': [
            'Huyện Nam Sách', 
            'Thành phố Hải Dương', 
            'Huyện Ninh Giang', 
            'Huyện Bình Giang', 
            'Huyện Tứ Kỳ', 
            'Huyện Kim Thành', 
            'Thị xã Chí Linh', 
            'Huyện Thanh Miện', 
            'Huyện Cẩm Giàng', 
            'Huyện Gia Lộc', 
            'Huyện Kinh Môn', 
            'Huyện Thanh Hà'
        ], 
        'Hải Phòng': [
            'Quận Hồng Bàng', 
            'Quận Dương Kinh', 
            'Quận Đồ Sơn', 
            'Huyện Bạch Long Vĩ', 
            'Huyện Cát Hải', 
            'Huyện Vĩnh Bảo', 
            'Huyện Tiên Lãng', 
            'Huyện Kiến Thuỵ', 
            'Huyện An Lão', 
            'Quận Hải An', 
            'Huyện Thuỷ Nguyên', 
            'Quận Kiến An', 
            'Quận Lê Chân', 
            'Quận Ngô Quyền', 
            'Huyện An Dương'], 
        'Hậu Giang': [
            'Thị xã Long Mỹ', 
            'Huyện Châu Thành A', 
            'Huyện Phụng Hiệp', 
            'Huyện Vị Thuỷ', 
            'Huyện Châu Thành', 
            'Huyện Long Mỹ', 
            'Thị xã Ngã Bảy', 
            'Thành phố Vị Thanh'
        ], 
        'Hoà Bình': [
            'Huyện Tân Lạc', 
            'Huyện Mai Châu', 
            'Huyện Kim Bôi', 
            'Huyện Lương Sơn', 
            'Huyện Đà Bắc', 
            'Huyện Lạc Sơn', 
            'Huyện Kỳ Sơn', 
            'Huyện Yên Thủy', 
            'Huyện Lạc Thủy', 
            'Thành phố Hòa Bình', 
            'Huyện Cao Phong'
        ], 
        'Hưng Yên': [
            'Huyện Khoái Châu', 
            'Huyện Văn Giang', 
            'Huyện Văn Lâm', 
            'Huyện Phù Cừ', 
            'Huyện Ân Thi', 
            'Huyện Mỹ Hào', 
            'Huyện Yên Mỹ', 
            'Huyện Tiên Lữ', 
            'Huyện Kim Động', 
            'Thành phố Hưng Yên'
        ], 
        'Khánh Hòa': [
            'Thành phố Cam Ranh', 
            'Huyện Trường Sa', 
            'Thị xã Ninh Hòa', 
            'Huyện Khánh Sơn', 
            'Huyện Khánh Vĩnh', 
            'Huyện Diên Khánh', 
            'Huyện Vạn Ninh', 
            'Huyện Cam Lâm', 
            'Thành phố Nha Trang'], 
        'Kiên Giang': [
            'Huyện Vĩnh Thuận', 
            'Huyện Kiên Lương', 
            'Thành phố Rạch Giá', 
            'Huyện Hòn Đất', 
            'Huyện Châu Thành', 
            'Huyện Gò Quao', 
            'Thị xã Hà Tiên', 
            'Huyện Tân Hiệp', 
            'Huyện An Minh', 
            'Huyện Kiên Hải', 
            'Huyện Giồng Riềng', 
            'Huyện Phú Quốc', 
            'Huyện An Biên', 
            'Huyện U Minh Thượng', 
            'Huyện Giang Thành'
        ], 
        'Kon Tum': [
            "Huyện Ia H' Drai",
            'Huyện Đắk Glei', 
            'Huyện Ngọc Hồi', 
            'Huyện Đắk Tô', 
            'Huyện Kon Rẫy', 
            'Huyện Kon Plông', 
            'Huyện Đắk Hà', 
            'Huyện Tu Mơ Rông', 
            'Huyện Sa Thầy', 
            'Thành phố Kon Tum'
        ], 
        'Lai Châu': [
            'Huyện Tân Uyên', 
            'Huyện Nậm Nhùn', 
            'Huyện Sìn Hồ', 
            'Huyện Mường Tè', 
            'Huyện Tam Đường', 
            'Thành phố Lai Châu', 
            'Huyện Phong Thổ', 
            'Huyện Than Uyên'
        ], 
        'Lâm Đồng': [
            'Huyện Đức Trọng', 
            'Huyện Đơn Dương', 
            'Thành phố Bảo Lộc', 
            'Huyện Đạ Tẻh', 
            'Huyện Bảo Lâm', 
            'Huyện Đạ Huoai', 
            'Huyện Lạc Dương', 
            'Huyện Cát Tiên', 
            'Huyện Lâm Hà', 
            'Huyện Di Linh', 
            'Thành phố Đà Lạt', 
            'Huyện Đam Rông'
        ], 
        'Lạng Sơn': [
            'Huyện Bình Gia', 
            'Thành phố Lạng Sơn', 
            'Huyện Văn Lãng', 
            'Huyện Văn Quan', 
            'Huyện Lộc Bình', 
            'Huyện Cao Lộc', 
            'Huyện Chi Lăng', 
            'Huyện Đình Lập', 
            'Huyện Bắc Sơn', 
            'Huyện Tràng Định', 
            'Huyện Hữu Lũng'
        ], 
        'Lào Cai': [
            'Thành phố Lào Cai', 
            'Huyện Bát Xát', 
            'Huyện Văn Bàn', 
            'Huyện Bảo Thắng', 
            'Huyện Si Ma Cai', 
            'Huyện Mường Khương', 
            'Huyện Sa Pa', 
            'Huyện Bảo Yên', 
            'Huyện Bắc Hà'
        ], 
        'Long An': [
            'Huyện Tân Thạnh', 
            'Huyện Tân Trụ', 
            'Huyện Mộc Hóa', 
            'Huyện Đức Hòa', 
            'Huyện Vĩnh Hưng', 
            'Huyện Cần Đước', 
            'Huyện Đức Huệ', 
            'Huyện Bến Lức', 
            'Huyện Thạnh Hóa', 
            'Huyện Cần Giuộc', 
            'Huyện Thủ Thừa', 
            'Huyện Châu Thành', 
            'Huyện Tân Hưng', 
            'Thành phố Tân An', 
            'Thị xã Kiến Tường'
        ], 
        'Nam Định': [
            'Thành phố Nam Định', 
            'Huyện Nghĩa Hưng', 
            'Huyện Trực Ninh', 
            'Huyện Ý Yên', 
            'Huyện Vụ Bản', 
            'Huyện Giao Thủy', 
            'Huyện Xuân Trường', 
            'Huyện Nam Trực', 
            'Huyện Mỹ Lộc', 
            'Huyện Hải Hậu'
        ], 
        'Nghệ An': [
            'Thị xã Hoàng Mai', 
            'Huyện Quỳ Châu', 
            'Huyện Diễn Châu', 
            'Huyện Anh Sơn', 
            'Huyện Hưng Nguyên', 
            'Huyện Quế Phong', 
            'Huyện Tương Dương', 
            'Huyện Kỳ Sơn', 
            'Thị xã Cửa Lò', 
            'Thị xã Thái Hoà', 
            'Huyện Nam Đàn', 
            'Huyện Quỳnh Lưu', 
            'Huyện Quỳ Hợp', 
            'Huyện Yên Thành', 
            'Huyện Đô Lương', 
            'Huyện Nghĩa Đàn', 
            'Huyện Con Cuông', 
            'Huyện Tân Kỳ', 
            'Huyện Nghi Lộc', 
            'Huyện Thanh Chương', 
            'Thành phố Vinh'
        ], 
        'Ninh Bình': [
            'Huyện Nho Quan', 
            'Huyện Hoa Lư', 
            'Huyện Gia Viễn', 
            'Huyện Kim Sơn', 
            'Huyện Yên Khánh', 
            'Thành phố Tam Điệp', 
            'Thành phố Ninh Bình', 
            'Huyện Yên Mô'
        ], 
        'Ninh Thuận': [
            'Huyện Bác Ái', 
            'Huyện Ninh Hải', 
            'Huyện Ninh Phước', 
            'Huyện Ninh Sơn', 
            'Huyện Thuận Bắc', 
            'Huyện Thuận Nam', 
            'Thành phố Phan Rang-Tháp Chàm'
        ], 
        'Phú Thọ': [
            'Huyện Lâm Thao', 
            'Thị xã Phú Thọ', 
            'Thành phố Việt Trì', 
            'Huyện Thanh Thuỷ', 
            'Huyện Đoan Hùng', 
            'Huyện Cẩm Khê', 
            'Huyện Phù Ninh', 
            'Huyện Tam Nông', 
            'Huyện Thanh Ba', 
            'Huyện Yên Lập', 
            'Huyện Thanh Sơn', 
            'Huyện Hạ Hoà', 
            'Huyện Tân Sơn'
        ], 
        'Phú Yên': [
            'Huyện Sông Hinh', 
            'Huyện Tây Hoà', 
            'Huyện Tuy An', 
            'Thị xã Sông Cầu', 
            'Huyện Đồng Xuân', 
            'Huyện Sơn Hòa', 
            'Thành phố Tuy Hoà', 
            'Huyện Phú Hoà', 
            'Huyện Đông Hòa'
        ], 
        'Quảng Bình': [
            'Huyện Bố Trạch', 
            'Huyện Tuyên Hóa', 
            'Huyện Lệ Thủy', 
            'Huyện Quảng Ninh', 
            'Huyện Quảng Trạch', 
            'Thành Phố Đồng Hới', 
            'Huyện Minh Hóa', 
            'Thị xã Ba Đồn'
        ], 
        'Quảng Nam': [
            'Huyện Hiệp Đức', 
            'Huyện Đông Giang', 
            'Huyện Tây Giang', 
            'Huyện Bắc Trà My', 
            'Thành phố Hội An', 
            'Thành phố Tam Kỳ', 
            'Huyện Đại Lộc', 
            'Thị xã Điện Bàn', 
            'Huyện Tiên Phước', 
            'Huyện Nam Trà My', 
            'Huyện Quế Sơn', 
            'Huyện Núi Thành', 
            'Huyện Thăng Bình', 
            'Huyện Phước Sơn', 
            'Huyện Duy Xuyên', 
            'Huyện Nam Giang', 
            'Huyện Phú Ninh', 
            'Huyện Nông Sơn'
        ], 
        'Quảng Ngãi': [
            'Huyện Minh Long', 
            'Huyện Tây Trà', 
            'Huyện Trà Bồng', 
            'Huyện Bình Sơn', 
            'Huyện Đức Phổ', 
            'Huyện Lý Sơn', 
            'Huyện Ba Tơ', 
            'Huyện Mộ Đức', 
            'Huyện Nghĩa Hành', 
            'Huyện Tư Nghĩa', 
            'Huyện Sơn Tịnh', 
            'Huyện Sơn Tây', 
            'Thành phố Quảng Ngãi', 
            'Huyện Sơn Hà'
        ], 
        'Quảng Ninh': [
            'Thị xã Đông Triều', 
            'Huyện Hải Hà', 
            'Thành phố Hạ Long', 
            'Thành phố Cẩm Phả', 
            'Thành phố Móng Cái', 
            'Thành phố Uông Bí', 
            'Huyện Vân Đồn', 
            'Huyện Tiên Yên', 
            'Huyện Ba Chẽ', 
            'Huyện Hoành Bồ', 
            'Huyện Bình Liêu', 
            'Huyện Cô Tô', 
            'Huyện Đầm Hà', 
            'Thị xã Quảng Yên'
        ], 
        'Quảng Trị': [
            'Huyện Cồn Cỏ', 
            'Thị xã Quảng Trị', 
            'Huyện Đa Krông', 
            'Huyện Vĩnh Linh', 
            'Huyện Triệu Phong', 
            'Huyện Gio Linh', 
            'Huyện Cam Lộ', 
            'Huyện Hải Lăng', 
            'Huyện Hướng Hóa', 
            'Thành phố Đông Hà'
        ], 
        'Sóc Trăng': [
            'Huyện Thạnh Trị', 
            'Huyện Mỹ Xuyên', 
            'Huyện Long Phú', 
            'Thị xã Vĩnh Châu', 
            'Huyện Mỹ Tú', 
            'Huyện Kế Sách', 
            'Huyện Cù Lao Dung', 
            'Thị xã Ngã Năm', 
            'Thành phố Sóc Trăng', 
            'Huyện Châu Thành', 
            'Huyện Trần Đề'
        ], 
        'Sơn La': [
            'Huyện Sốp Cộp', 
            'Huyện Mai Sơn', 
            'Huyện Mường La', 
            'Huyện Sông Mã', 
            'Huyện Mộc Châu', 
            'Huyện Vân Hồ', 
            'Huyện Quỳnh Nhai', 
            'Huyện Phù Yên', 
            'Huyện Thuận Châu', 
            'Huyện Yên Châu', 
            'Huyện Bắc Yên', 
            'Thành phố Sơn La'
        ], 
        'Tây Ninh': [
            'Huyện Dương Minh Châu', 
            'Huyện Bến Cầu', 
            'Huyện Châu Thành', 
            'Huyện Gò Dầu', 
            'Huyện Hòa Thành', 
            'Huyện Tân Châu', 
            'Huyện Trảng Bàng', 
            'Huyện Tân Biên', 
            'Thành phố Tây Ninh'
        ], 
        'Thái Bình': [
            'Huyện Quỳnh Phụ', 
            'Huyện Vũ Thư', 
            'Huyện Hưng Hà', 
            'Huyện Kiến Xương', 
            'Huyện Tiền Hải', 
            'Huyện Thái Thụy', 
            'Huyện Đông Hưng', 
            'Thành phố Thái Bình'
        ], 
        'Thái Nguyên': [
            'Thành phố Sông Công', 
            'Huyện Phú Lương', 
            'Huyện Định Hóa', 
            'Huyện Phú Bình', 
            'Huyện Võ Nhai', 
            'Thị xã Phổ Yên', 
            'Huyện Đồng Hỷ', 
            'Huyện Đại Từ', 
            'Thành phố Thái Nguyên'
        ], 
        'Thanh Hóa': [
            'Huyện Đông Sơn', 
            'Huyện Thường Xuân', 
            'Huyện Nông Cống', 
            'Huyện Hà Trung', 
            'Huyện Bá Thước', 
            'Huyện Hoằng Hóa', 
            'Huyện Quảng Xương', 
            'Huyện Thiệu Hóa', 
            'Huyện Như Thanh', 
            'Thành phố Thanh Hóa', 
            'Thị xã Sầm Sơn', 
            'Thị xã Bỉm Sơn', 
            'Huyện Nga Sơn', 
            'Huyện Mường Lát', 
            'Huyện Tĩnh Gia', 
            'Huyện Thạch Thành', 
            'Huyện Thọ Xuân', 
            'Huyện Hậu Lộc', 
            'Huyện Cẩm Thủy', 
            'Huyện Vĩnh Lộc', 
            'Huyện Quan Hóa', 
            'Huyện Triệu Sơn', 
            'Huyện Ngọc Lặc', 
            'Huyện Như Xuân', 
            'Huyện Quan Sơn', 
            'Huyện Yên Định', 
            'Huyện Lang Chánh'
        ], 
        'Thừa Thiên Huế': [
            'Huyện Phú Vang', 
            'Huyện A Lưới', 
            'Huyện Nam Đông', 
            'Thị xã Hương Trà', 
            'Huyện Phong Điền', 
            'Thị xã Hương Thủy', 
            'Huyện Quảng Điền', 
            'Huyện Phú Lộc', 
            'Thành phố Huế'
        ], 
        'Tiền Giang': [
            'Thị xã Cai Lậy', 
            'Huyện Châu Thành', 
            'Huyện Tân Phú Đông', 
            'Thị xã Gò Công', 
            'Huyện Tân Phước', 
            'Huyện Gò Công Tây', 
            'Huyện Cai Lậy', 
            'Huyện Gò Công Đông', 
            'Huyện Chợ Gạo', 
            'Huyện Cái Bè', 
            'Thành phố Mỹ Tho'
        ], 
        'Trà Vinh': [
            'Thị xã Duyên Hải', 
            'Huyện Châu Thành', 
            'Huyện Cầu Kè', 
            'Huyện Càng Long', 
            'Huyện Cầu Ngang', 
            'Huyện Duyên Hải', 
            'Huyện Tiểu Cần', 
            'Huyện Trà Cú', 
            'Thành phố Trà Vinh'
        ], 
        'Tuyên Quang': [
            'Huyện Chiêm Hóa', 
            'Huyện Sơn Dương', 
            'Huyện Yên Sơn', 
            'Huyện Hàm Yên', 
            'Huyện Nà Hang', 
            'Thành phố Tuyên Quang', 
            'Huyện Lâm Bình'
        ], 
        'Vĩnh Long': [
            'Huyện Mang Thít', 
            'Huyện Vũng Liêm', 
            'Thị xã Bình Minh', 
            'Huyện Tam Bình', 
            'Huyện Long Hồ', 
            'Thành phố Vĩnh Long', 
            'Huyện Bình Tân', 
            'Huyện Trà Ôn'
        ], 
        'Vĩnh Phúc': [
            'Huyện Bình Xuyên', 
            'Huyện Vĩnh Tường', 
            'Huyện Lập Thạch', 
            'Huyện Yên Lạc', 
            'Thành phố Vĩnh Yên', 
            'Huyện Tam Đảo', 
            'Huyện Tam Dương', 
            'Thị xã Phúc Yên', 
            'Huyện Sông Lô'
        ], 
        'Yên Bái': [
            'Huyện Trấn Yên', 
            'Huyện Văn Chấn', 
            'Huyện Lục Yên', 
            'Huyện Văn Yên', 
            'Huyện Mù Căng Chải', 
            'Huyện Trạm Tấu', 
            'Huyện Yên Bình', 
            'Thành phố Yên Bái', 
            'Thị xã Nghĩa Lộ'
        ], 
        'Đắk Lắk': [
            'Huyện Krông A Na', 
            'Thành phố Buôn Ma Thuột', 
            'Huyện Cư Kuin', 
            "Huyện Cư M'gar", 
            'Huyện Ea Súp', 
            'Huyện Krông Năng', 
            "Huyện Ea H'leo",
            'Huyện Krông Búk', 
            'Huyện Buôn Đôn', 
            'Huyện Lắk', 
            'Huyện Krông Pắc', 
            'Huyện Krông Bông', 
            'Huyện Ea Kar', 
            "Huyện M'Đrắk",
            'Thị Xã Buôn Hồ'
        ], 
        'Đắk Nông': [
            'Huyện Đắk Mil', 
            'Huyện Cư Jút', 
            'Huyện Đăk Glong', 
            "Huyện Đắk R'Lấp",
            'Huyện Krông Nô', 
            'Huyện Đắk Song', 
            'Huyện Tuy Đức', 
            'Thị xã Gia Nghĩa'
        ], 
        'Điện Biên': [
            'Huyện Nậm Pồ', 
            'Thành phố Điện Biên Phủ', 
            'Thị Xã Mường Lay', 
            'Huyện Tủa Chùa', 
            'Huyện Tuần Giáo', 
            'Huyện Điện Biên Đông', 
            'Huyện Mường Nhé', 
            'Huyện Điện Biên', 
            'Huyện Mường Ảng', 
            'Huyện Mường Chà'
        ], 
        'Đồng Nai': [
            'Huyện Định Quán', 
            'Huyện Long Thành', 
            'Huyện Cẩm Mỹ', 
            'Thành phố Biên Hòa', 
            'Huyện Thống Nhất', 
            'Huyện Nhơn Trạch', 
            'Huyện Vĩnh Cửu', 
            'Huyện Xuân Lộc', 
            'Huyện Trảng Bom', 
            'Huyện Tân Phú', 
            'Thị xã Long Khánh'
        ], 
        'Đồng Tháp': [
            'Huyện Tân Hồng', 
            'Thành phố Sa Đéc', 
            'Huyện Lai Vung', 
            'Huyện Châu Thành', 
            'Huyện Lấp Vò', 
            'Huyện Cao Lãnh', 
            'Huyện Tháp Mười', 
            'Huyện Thanh Bình', 
            'Huyện Tam Nông', 
            'Thị xã Hồng Ngự', 
            'Thành phố Cao Lãnh', 
            'Huyện Hồng Ngự'
        ]
    };
    
    return TPs;
    }

});
