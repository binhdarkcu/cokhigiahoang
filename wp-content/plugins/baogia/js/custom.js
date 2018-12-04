/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


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
        const detailModal = $('#modal-chi-tiet');
        const rowData = tableBaoGia.row($(this).parents('tr')).data();
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


        $('#detail-content').html(text);
        detailModal.iziModal('setTitle', `Chi tiết báo giá cho ${rowData[0]}`);
        detailModal.iziModal('setSubtitle', `${rowData[1]}-${rowData[2]}-${rowData[3]}`);
        detailModal.iziModal('open');
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
                                <a href="#" class="xem-chi-tiet" data-id="${baoGia.id}" data-item-index="${index}">Chi tiết</a>
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