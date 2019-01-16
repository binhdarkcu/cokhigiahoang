/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
    // Update value
    $('.setting-data').on('change', function () {
        const setting_key_index = $(this).data('setting-key-index');
        const setting_key = setting_keys[setting_key_index];
        const key = $(this).data('key');
        const index = $(this).data('index');
        var finalValue = (index === 'don_gia' || index === 'don_gia_thue' || index === 'lap_dat' || index === 'van_chuyen') ? addCommas(this.value) : this.value;
        // no key [1: 'a', 2: 'b']
        // has key [1 :[data: 'abc', index: '456']]
        key ? GiaHoangData[setting_key][key][index] = finalValue || 0 : GiaHoangData[setting_key][index] = finalValue || 0
        this.value = finalValue || 0;

        console.log(`key; ${key} - index: ${index} - value: ${this.value}`);

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
