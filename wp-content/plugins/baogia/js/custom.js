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
                "searchable": false
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
        title: 'Modal xem chi tiết',
        subtitle: 'Subtitle modal xem chi tiết',
        width: 700,
        radius: 5,
        loop: true
    });

    $("#modal-chinh-sua").iziModal({
        title: 'Modal chỉnh sửa',
        subtitle: 'Subtitle modal chỉnh sửa',
        width: 700,
        radius: 5,
        loop: true
    });

    $(document).on('click', '.xem-chi-tiet', function (event) {
        event.preventDefault();
        // $('#modal').iziModal('setZindex', 99999);
        // $('#modal').iziModal('open', { zindex: 99999 });
        $('#modal-chi-tiet').iziModal('open');
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
                            baoGia.status,
                            (`<a href="#" class="chinh-sua" data-id="${baoGia.id}" data-item-index="${index}">Chỉnh sửa</a> 
                                <a href="#" class="xem-chi-tiet" data-id="${baoGia.id}" data-item-index="${index}">Chi tiết</a>`)
                        ]).draw(false);
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
});