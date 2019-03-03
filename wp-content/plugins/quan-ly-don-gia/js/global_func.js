/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
    // Update value
    $('.setting-data').on('change', function () {
        const keyStr = $(this).data('key');
        const keys = keyStr.split('-');
        const _self = this;
        var updateValue = function(data, keys, index){
            if(index < keys.length - 1){
                return updateValue(data[keys[index]], keys, ++index);
            }else{
                const _lastKey = keys[index]; 
                const _fields = ['don_gia', 'don_gia_thue', 'lap_dat', 'van_chuyen', 
                    'don_gia_mot_khung', 'van_chuyen_den', 'van_chuyen_ve', 'thao_do', 'plc',
                    'kiem_dinh_12thang', 'trong_tp_hcm', 'ngoai_tp_hcm',
                    'van_hanh', 'bao_tri', 'gia_bien_tan', 'kiem_dinh'];
                const _finalValue = _fields.indexOf(_lastKey) !== -1 ? addCommas(_self.value) : _self.value;
                data[_lastKey] = _finalValue;
                _self.value = _finalValue || 0;
                return data;
            }
        };
        updateValue(GiaHoangData, keys, 0);

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
