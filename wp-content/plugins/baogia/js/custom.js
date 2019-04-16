/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
            url: plugin_api.get_list_url,
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
                render: function(status, type, row){
                    const classNames = {'Đã xem': 'da-xem', 'Đã báo giá': 'da-bao-gia', 'Đã thanh toán': 'da-thanh-toan', 'Hoàn thành': 'hoan-thanh'};
                    return `<a href="#" class="bao-gia-status status-${classNames[status]}">${status}</span>`;
                }
            },
            {
                targets: 7,
                data: 'order_detail',
                searchable: false,
                orderable: false,
                render: function(detail, type, row){
                    return `<a href="${plugin_api.page_chi_tiet_url + '&iid=' + row.id}" target="_blank">Xem chi tiết</a>`;
                }
            },
        ],
        "createdRow": function (row, data, index) {
            var chkbox = $(row).find('.select-multiple');
            var status = $(row).find('.bao-gia-status');
            chkbox.on('change', function(){
                const _value = this.value;
                if(this.checked){
                    arrayIDs.push(this.value);
                    $(row).addClass('selected');
                }else{
                    arrayIDs = arrayIDs.filter(function(item){ return item.toString() !== _value.toString();});
                    $(row).removeClass('selected');
                }
                $('#checkedIds').val(arrayIDs.join(','));
                setCheckAll();
            });
            
            status.on('click', function(e){
                e.preventDefault();
                showModal(data);
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
          if(chkbox.is(':checked')){
              $(r).addClass('selected');
               count++;
          }
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
          checkAll ? $(row).addClass('selected') : $(row).removeClass('selected');
          ids.push(chkbox.val());
       });
       
       arrayIDs = arrayIDs.filter(function(id){return !(ids.indexOf(id) > -1)});
       if(checkAll) arrayIDs = arrayIDs.concat(ids);
       $('#checkedIds').val(arrayIDs.join(','));
       showHideDeleteBulk();
    });
    
    $(tableBaoGia.table().header())
            .addClass('highlight');

            
    var modal = $("#modal-chi-tiet").iziModal({
        width: 560,
        radius: 5,
        closeButton: true,
        loop: false
    });

    $('#cancel-bulk').on('click', function(){
        $('#checkedIds').val('');
        arrayIDs = [];
        $('#check-all').prop('checked', false);
        var rows = $("#bao-gia").dataTable().fnGetNodes(); 
        rows.forEach(function(row){
           var chkbox = $(row).find('.select-multiple');
           $(chkbox).prop('checked', false);
           $(row).removeClass('selected');
        });
        showHideDeleteBulk();
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
    
    function showModal(data){
        var text = $('#modal-template').text();
        text = template(text, data);
        if(plugin_api && plugin_api.statuses){
            plugin_api.statuses.forEach(function(status, index){
                text += `<div class="rdx-div" style="width:${100/plugin_api.statuses.length}%;"><input id="status-${index}" type="radio" data-id="${data.id}"  class="rd-edit-status" value="${status}" name="bao-gia-status" ${status === data.status ? 'checked' : ''}/> <label for="status-${index}">${status}</label></div>`;
            });
        }
        $('#detail-content').html(text);
        modal.iziModal('setTitle', 'Chỉnh sửa trạng thái');
        modal.iziModal('open');
    }
    
    $('#save-change').on('click', function(){
        const radio = $('#detail-content').find("input[name=bao-gia-status]:checked");
        const _id = $(radio).data('id');
        const _status = $(radio).val();
        sendPostRequest({action: 'cap_nhat_trang_thai', action_type: 'update', id: _id, status: _status}, function (err, success) {
            if (!err) {
                tableBaoGia.ajax.reload();
            }
        });       
        modal.iziModal('close');

    });


    $('#delete-bulk').on('click', function(){
        if (confirm("Bạn có chắc muốn xóa dữ liệu đã chọn ?")) {
            const _id = $('#checkedIds').val();
            sendPostRequest({action: 'cap_nhat_trang_thai', action_type: 'delete', id: _id}, function (err, success) {
                if (!err) {
                    $('#checkedIds').val('');
                    arrayIDs = [];
                    $('#bulk-action').hide();
                    tableBaoGia.ajax.reload();
                } 
            });
        }
    });
    // Send post request
    function sendPostRequest(_data, callback) {
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: _data,
            success: function (result) {
                showNotification('Thông tin đã được cập nhật thành công.', 'success');
                callback(null, result);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                showNotification('Lưu thông tin báo giá thất bại, vui lòng liên hệ để được hỗ trợ.', 'error');
                callback(thrownError);
            }
        });
    }
    
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
    
    $('#clean-list').on('click', function(){
       console.log('clicked!');
        $.ajax({
            type: 'POST',
            url: plugin_api.clean_list_url,
            success: function (result) {
                showNotification('Đã dọn dẹp '+ JSON.parse(result).total +' mục.', 'success');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                showNotification('Đã xảy ra lỗi, vui lòng liên hệ để được hỗ trợ.', 'error');
            }
        });
    });
});