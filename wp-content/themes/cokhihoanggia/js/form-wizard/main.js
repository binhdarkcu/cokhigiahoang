jQuery(function ($) {

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
    });
    // Custom Button Jquery Steps
    $('.forward').click(function () {
        $("#wizard").steps('next');
    })
    $('.backward').click(function () {
        $("#wizard").steps('previous');
    })
    // Click to see password 
    $('.password i').click(function () {
        if ($('.password input').attr('type') === 'password') {
            $(this).next().attr('type', 'text');
        } else {
            $('.password input').attr('type', 'password');
        }
    })
    // Create Steps Image
    $('.steps ul li:first-child').append(`<img src="${window.styleDirectoyURL}/images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${window.styleDirectoyURL}/images/step-1-active.png" alt="">`).append('<span class="step-order">Bước 01</span>');
    $('.steps ul li:nth-child(2').append(`<img src="${window.styleDirectoyURL}/images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${window.styleDirectoyURL}/images/step-2.png" alt="">`).append('<span class="step-order">Bước 02</span>');
    $('.steps ul li:nth-child(3)').append(`<img src="${window.styleDirectoyURL}/images/step-arrow.png" alt="" class="step-arrow">`).find('a').append(`<img src="${window.styleDirectoyURL}/images/step-3.png" alt="">`).append('<span class="step-order">Bước 03</span>');
    $('.steps ul li:last-child a').append(`<img src="${window.styleDirectoyURL}/images/step-4.png" alt="">`).append('<span class="step-order">Bước 04</span>');
    // Count input 
    $(".quantity span").on("click", function () {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.hasClass('plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });


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
            $('#sl_gian_giao').hide();
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
            $('#sl_gian_giao').show();
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
        var html = '';
        const fields = form_bao_gia[sp.form_bao_gia];
        fields.forEach(function (item) {
            html += `<tr class="cart-subtotal"> <th>${translations[item]}</th> <td>${sp[item]}</td></tr>`;
        });
        $('#review-section').html(html);
    }
})
