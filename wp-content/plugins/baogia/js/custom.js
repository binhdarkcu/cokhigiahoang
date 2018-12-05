/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

const Base64 = {

    // private property
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="

            // public method for encoding
    , encode: function (input)
    {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;

        input = Base64._utf8_encode(input);

        while (i < input.length)
        {
            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2))
            {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3))
            {
                enc4 = 64;
            }

            output = output +
                    this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
                    this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
        } // Whend 

        return output;
    } // End Function encode 


    // public method for decoding
    , decode: function (input)
    {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
        while (i < input.length)
        {
            enc1 = this._keyStr.indexOf(input.charAt(i++));
            enc2 = this._keyStr.indexOf(input.charAt(i++));
            enc3 = this._keyStr.indexOf(input.charAt(i++));
            enc4 = this._keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            output = output + String.fromCharCode(chr1);

            if (enc3 != 64)
            {
                output = output + String.fromCharCode(chr2);
            }

            if (enc4 != 64)
            {
                output = output + String.fromCharCode(chr3);
            }

        } // Whend 

        output = Base64._utf8_decode(output);

        return output;
    } // End Function decode 


    // private method for UTF-8 encoding
    , _utf8_encode: function (string)
    {
        var utftext = "";
        string = string.replace(/\r\n/g, "\n");

        for (var n = 0; n < string.length; n++)
        {
            var c = string.charCodeAt(n);

            if (c < 128)
            {
                utftext += String.fromCharCode(c);
            } else if ((c > 127) && (c < 2048))
            {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            } else
            {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        } // Next n 

        return utftext;
    } // End Function _utf8_encode 

    // private method for UTF-8 decoding
    , _utf8_decode: function (utftext)
    {
        var string = "";
        var i = 0;
        var c, c1, c2, c3;
        c = c1 = c2 = 0;

        while (i < utftext.length)
        {
            c = utftext.charCodeAt(i);

            if (c < 128)
            {
                string += String.fromCharCode(c);
                i++;
            } else if ((c > 191) && (c < 224))
            {
                c2 = utftext.charCodeAt(i + 1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            } else
            {
                c2 = utftext.charCodeAt(i + 1);
                c3 = utftext.charCodeAt(i + 2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        } // Whend 

        return string;
    } // End Function _utf8_decode 

}
jQuery(document).ready(function ($) {
    var tableBaoGia = $('#bao-gia').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json" //TODO: change to server url
        },
        "columnDefs": [{
                "targets": 6,
                "searchable": false,
                "orderable": false
            }],
        "createdRow": function (row, data, index) {
            console.log('row: ', row);
            console.log('data: ', data);
            console.log('index: ', index);
//            console.log('aaaa', $('td', row).eq(6).addClass('aaa'));
        }
    });
    $(tableBaoGia.table().header())
            .addClass('highlight');

    $("#modal-chi-tiet").iziModal({
        width: 850,
        radius: 5,
        top: 35,
        bottom: 10,
        loop: true
    });

    $("#modal-chinh-sua").iziModal({
        width: 850,
        radius: 5,
        top: 35,
        bottom: 10,
        loop: true
    });

    $(document).on('click', '.xem-chi-tiet', function (event) {
        event.preventDefault();
        try {
            const detailModal = $('#modal-chi-tiet');
            const order_detail = JSON.parse(Base64.decode($(this).data('item-data')));

            const rowData = tableBaoGia.row($(this).parents('tr')).data();
            const type = 1;
            var text;
            switch (order_detail.form_bao_gia) {
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
                    text = '';
                    break;
            }

            //Apply template
//            delete order_detail.form_bao_gia;
            console.log('text: ', text);
            console.log('Object: ', JSON.stringify(order_detail));
            text = template(text, order_detail);
            $('#detail-content').html(text);
            detailModal.iziModal('setTitle', `Chi tiết báo giá cho ${rowData[0]}`);
            detailModal.iziModal('setSubtitle', `${rowData[1]}-${rowData[2]}-${rowData[3]}`);
            detailModal.iziModal('open');
        } catch (ex) {
            console.error(ex);
        }
        ;

    });

    $(document).on('click', '.chinh-sua', function (event) {
        event.preventDefault();
        // $('#modal').iziModal('setZindex', 99999);
        // $('#modal').iziModal('open', { zindex: 99999 });
        $('#modal-chinh-sua').iziModal('open');
    });

    $.ajax({
        type: "GET",
        url: ajaxurl,
        data: {
            'action': 'get_list_bao_gia'
        },
        success: function (result) {
            try {
                jsonData = JSON.parse(result);

                const statuses = ['Đã báo giá', 'Đã thanh toán', 'Đã đóng'];
                //Get data OK
                if (jsonData.status === 'OK') {

                    //Create row
                    jsonData.data.forEach(function (baoGia, index) {
                        console.log('aaa');
                        tableBaoGia.row.add([
                            baoGia.full_name,
                            baoGia.phone_number,
                            baoGia.email,
                            baoGia.company,
                            baoGia.created_date,
                            (`<select class="order-status">
                            ${statuses.map(function (item) {
                                return(`<option value='${item}' ${item === baoGia.status ? 'selected' : ''}>${item}</option>`);
                            }).join(' ')}
                            </select>`),
                            (`
                                <a href="#" class="xem-chi-tiet" data-id="${baoGia.id}" data-item-index="${index}" data-item-data="${Base64.encode(baoGia.order_detail)}">Chi tiết</a>
                                    <a href="#" class="xoa-bao-gia" data-id="${baoGia.id}" data-item-index="${index}">Xóa</a>`)
                        ]).draw(false);
                    });

                    // Observe onchange event
                    $('.order-status').on({
                        "ready": function (e) {
                            $(this).attr("readonly", true);
                        },
                        "focus": function (e) {
                            $(this).data({choice: $(this).val()});
                        },
                        "change": function (e) {
                            if (!confirm("Lưu thay đổi ?")) {
                                $(this).val($(this).data('choice'));
                                return false;
                            } else {
                                $(this).attr("readonly", false);
                                return true;
                            }
                        }
                    });

                } else {
                    console.error('Can not retrieve data');
                }
                //Handle parsing JSON exception
            } catch (ex) {
                console.error('Can not parse JSON content!', ex);
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.error(thrownError);
        }
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
});