/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
    // Update value
    const bindRowEvent = function(){
        $('.setting-data').off('change');
        $('.setting-data').on('change', function () {
            const keyStr = $(this).data('key');
            const keys = keyStr.split('-');
            const _self = this;
            const updateValue = function(data, keys, index){
                data = data || {};
                if(index < keys.length - 1){
                    return updateValue(data[keys[index]], keys, ++index);
                }else{
                    const _lastKey = keys[index]; 
                    const _fields = ['don_gia', 'don_gia_thue', 'lap_dat', 'van_chuyen', 
                        'don_gia_mot_khung', 'van_chuyen_den', 'van_chuyen_ve', 'thao_do', 'plc',
                        'kiem_dinh_12thang', 'trong_tp_hcm', 'ngoai_tp_hcm', 'min', 'max',
                        'van_hanh', 'bao_tri', 'gia_bien_tan', 'kiem_dinh'];
                    const _finalValue = _fields.indexOf(_lastKey) !== -1 ? addCommas(_self.value) : _self.value;
                    data[_lastKey] = _finalValue;
                    _self.value = _finalValue || 0;
                    return data;
                }
            };
            updateValue(GiaHoangData, keys, 0);

        });    
        
        $('.delete-row').off('click');
        $('.delete-row').on('click', function(){
            const parent = $(this).closest('tbody');
            const keyStr = $(this).siblings('input.setting-data').data('key');
            var keys = keyStr.split('-');
            delete GiaHoangData[keys[0]][keys[1]];
            
            var data = [];
            GiaHoangData[keys[0]].forEach(function(item){
                data.push(item);
            });
            GiaHoangData[keys[0]] = data;
            
            $(this).closest('tr').removeClass('display');
            $(this).closest('tr').addClass('hidden');

            $(parent).find('tr.display').each(function(index){
                keys[1] = index;
                $(this).find('input.setting-data').each(function(){
                   $(this).data('key', keys.join('-')); 
                });
            })
            $(this).closest('tr').remove();
        });
    }
    
    bindRowEvent();
    
    $('#add-new-row').on('click', function(a){
        bindRowEvent();
    });

    // Save value
    $('#luu-thay-doi').on('click', function () {
        var promises = [];

        setting_keys.forEach(function (sv_setting_key) {
            promises.push(new Promise(function (resolve, reject) {
                sendPostRequest({action: 'update_setting', setting_key: sv_setting_key, setting_value: JSON.stringify(GiaHoangData[sv_setting_key])}, function (err, success) {
                    if (!err) {
                        console.log('callback success result:', success);
                        resolve();
                    } else {
                        console.log('callback failed!');
                        reject();
                    }
                }, false);
            }));
        });

        Promise.all(promises).then(function(success){
            showSuccessMsg();
        }).catch(function(error){
            showErrorMsg();
        });

    });
});
