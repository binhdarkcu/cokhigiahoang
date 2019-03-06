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
    var checkedIds = $('#checkedIds').val();
    var arrayIDs = checkedIds ? checkedIds.split(',') : [];
    var checkAllNode = null;
    
    var tableBaoGia = $('#bao-gia').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json" //TODO: change to server url
        },
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: plugin_api.url,
            data: function(d){
                const dontShowSeen = $('#ko-hien-thi-seen')[0];
                const dontShowDone = $('#ko-hien-thi-done')[0];
                if(dontShowSeen.checked) d.dontShowSeen = true;
                if(dontShowDone.checked) d.dontShowDone = true;
            }
        },
        "order": [[ 5, "desc" ]],
        "columnDefs": [
            {
                targets: 0,
                data: 'id',                
                searchable: false,
                orderable: false,
                render: function(id){
                    id = id.toString();
                    var checked = arrayIDs.indexOf(id) > -1;
                    return `<input type="checkbox" ${checked ? 'checked':''} class="select-multiple" value="${id}">`;
                }
            },
            {
                targets: 1,
                data: 'full_name',
                render: function(fName){
                    return fName;
                }
            },
            {
                targets: 2,
                orderable: false,
                data: 'phone_number',
                render: function(phone_number){
                    return phone_number;
                }
            },
            {
                targets: 3,
                data: 'email',
                render: function(email){
                    return email;
                }
            },
            {
                targets: 4,
                data: 'company',
                render: function(company){
                    return company;
                }
            },
            {
                targets: 5,
                data: 'created_date',
                render: function(created_date){
                    return created_date;
                }
            },
            {
                targets: 6,
                data: 'status',
                render: function(status){
                    return status;
                }
            },
            {
                targets: 7,
                data: 'order_detail',
                searchable: false,
                orderable: false,
                render: function(detail, type, row){
                    return `Xem - Xoa`;
                }
            },
        ],
        "createdRow": function (row, data, index) {
            var chkbox = $(row).find('.select-multiple');
            chkbox.on('change', function(){
                const _value = this.value;
                this.checked ?  arrayIDs.push(this.value) : (arrayIDs = arrayIDs.filter(function(item){ return item.toString() !== _value.toString();}));
                $('#checkedIds').val(arrayIDs.join(','));
                setCheckAll();
            });
        },
        "drawCallback": function(){
            setCheckAll();
        }
    });
    
    function setCheckAll(){
        var count = 0;
        var rows = $("#bao-gia").dataTable().fnGetNodes(); 
        rows.forEach(function(r){
          var chkbox = $(r).find('.select-multiple');
          if(chkbox.is(':checked')) count++;
        });

       $('#check-all').prop('checked', (count > 0 && count === rows.length)); 
        showHideDeleteBulk();
    }
    
    function showHideDeleteBulk(){
        if(arrayIDs.length > 0){
           $('#bulk-action').fadeIn();
           $('#number-of-items-selected').html(`Đã chọn ${arrayIDs.length} mục`);
       }else{
            $('#bulk-action').hide();
       }    
    }
    
    $('#check-all').on('change', function(){
       var rows = $("#bao-gia").dataTable().fnGetNodes(); 
       const checkAll = this.checked;
       if(!checkAllNode) checkAllNode = this;
       var ids = [];
       rows.forEach(function(row){
          var chkbox = $(row).find('.select-multiple');
          $(chkbox).prop('checked', checkAll);
          ids.push(chkbox.val());
       });
       
       arrayIDs = arrayIDs.filter(function(id){return !(ids.indexOf(id) > -1)});
       if(checkAll) arrayIDs = arrayIDs.concat(ids);
       $('#checkedIds').val(arrayIDs.join(','));
       showHideDeleteBulk();
    });
    
    $(tableBaoGia.table().header())
            .addClass('highlight');

            
    $("#modal-chi-tiet").iziModal({
        width: 980,
        radius: 5,
        top: 35,
        bottom: 10,
        loop: true
    });
    
    $('#cancel-bulk').on('click', function(){
        $('#checkedIds').val('');
        arrayIDs = [];
        $('#check-all').prop('checked', false);
        var rows = $("#bao-gia").dataTable().fnGetNodes(); 
        rows.forEach(function(row){
           var chkbox = $(row).find('.select-multiple');
           $(chkbox).prop('checked', false);
        });
        showHideDeleteBulk();
    });
    
    // Handle view details action
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
                    text = $('#template-mua-vtl').text();
                    break;
                case 'form_vt_long_thue':
                    text = $('#template-thue-vtl').text();
                    break;
                case 'form_vt_hang_ban':
                    text = order_detail.tl_vt_hang === '500 kg' ? $('#template-mua-vth-500kg').text() : $('#template-mua-vth-1000kg').text();
                    break;
                case 'form_vt_hang_thue':
                    text = order_detail.tl_vt_hang === '500 kg' ? $('#template-thue-vth-500kg').text() : $('#template-thue-vth-1000kg').text();
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

            //Apply template
            delete order_detail.form_bao_gia;
//            console.log('text: ', text);
//            console.log('Object: ', JSON.stringify(order_detail));
            text = template(text, order_detail);
            $('#detail-content').html(text);
            
            if(order_detail.loai_sp === 'Giàn giáo'){
                var counter = 1;
                $('#detail-content').find('.so-luong').each(function(item){
                    if(this.value != 0){
                        $(this).closest('tr').children().first().html(counter++);
                    }else{
                        $(this).closest('tr').remove();
                    }
                });
            }
            
            detailModal.iziModal('setTitle', `Chi tiết báo giá cho ${rowData[0]}`);
            detailModal.iziModal('setSubtitle', `${rowData[1]} - ${rowData[2]} - ${rowData[3]}`);
            detailModal.iziModal('open');
        } catch (ex) {
            console.error(ex);
        }
        ;
    });

    // Handle delete action
    $(document).on('click', '.xoa-bao-gia', function (event) {
        event.preventDefault();
        if (confirm("Bạn có chắc muốn xóa dữ liệu này ?")) {
            const _id = $(this).data('id');
            sendPostRequest({action: 'cap_nhat_trang_thai', action_type: 'delete', id: _id}, function (err, success) {
                if (!err) {
                    getDataAndRenderTable();
                    console.log('callback success result:', success);
                } else {
                    console.log('callback failed!');
                }
            });
        }
    });

//    getDataAndRenderTable();
    // Send post renquest and render data table
    function getDataAndRenderTable() {
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
                        tableBaoGia.clear().draw();
                        jsonData.data.forEach(function (baoGia, index) {
                            tableBaoGia.row.add({
                                '0': baoGia.full_name,
                                '1': baoGia.phone_number,
                                '2': baoGia.email,
                                '3': baoGia.company,
                                '4': baoGia.created_date,
                                '5': {
                                    "display": (`<select class="order-status" data-item-id="${baoGia.id}">${plugin_api.statuses.map(function (item) {
                                        return(`<option value='${item}' ${item === baoGia.status ? 'selected' : ''}>${item}</option>`);
                                    }).join(' ')}</select>`),
                                    "selected_status": `${baoGia.status}`,
                                },
                                '6': (` <a href="#" class="xem-chi-tiet" data-id="${baoGia.id}" data-item-index="${index}" data-item-data="${Base64.encode(baoGia.order_detail)}">Chi tiết</a> <a href="#" class="xoa-bao-gia" data-id="${baoGia.id}" data-item-index="${index}">Xóa</a>`),
                            }).draw(false);
                        });
                        tableBaoGia.draw();
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
                                    //Update changes
                                    const _id = $(this).data('item-id');
                                    const _status = e.target.value;
                                    sendPostRequest({action: 'cap_nhat_trang_thai', action_type: 'update', id: _id, status: _status}, function (err, success) {
                                        if (!err) {
                                            console.log('callback success result:', success);
                                        } else {
                                            console.log('callback failed!');
                                        }
                                    });
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
    }

    // Send post request
    function sendPostRequest(_data, callback) {
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: _data,
            success: function (result) {
                console.log('result: ', result);
                showNotification('Thông tin đã được cập nhật thành công.', 'success');
                callback(null, result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                showNotification('Lưu thông tin báo giá thất bại, vui lòng liên hệ để được hỗ trợ.', 'error');
                console.error(thrownError);
                callback(thrownError);
            }
        });
    }

    // Replace template engine
    function template(text, data) {
//        console.log('text: ', text);
        return text
                .replace(
                        /%(\w*)%/g, // or /{(\w*)}/g for "{this} instead of %this%"
                        function (m, key) {
                            return data.hasOwnProperty(key) ? data[ key ] : "";
                        }
                );
    }


    $('#print').on('click', function () {
        $.print('#tblGianGiao');
    });

    function showNotification(msg, type) {
        $.toast({
            text: msg, // Text that is to be shown in the toast
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
    
    $('#ko-hien-thi-seen, #ko-hien-thi-done').on('change', function(){ 
       tableBaoGia.ajax.reload();
    });
});