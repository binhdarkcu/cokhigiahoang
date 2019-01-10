/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
    // Update value
    $('.setting-data').on('change', function () {
        const key = $(this).data('key');
        const index = $(this).data('index');
        var finaValue = (index === 'don_gia' || index ==='don_gia_thue') ? addCommas(this.value) : this.value;
        GianGiao[key][index] = finaValue || 0;
        this.value = finaValue || 0;
        
        console.log(`key; ${key} - index: ${index} - value: ${this.value}`);

    });

    // Save value
    $('#luu-thay-doi').on('click', function () {
        sendPostRequest({action: 'update_setting', setting_key: 'gian_giao',setting_value: JSON.stringify(GianGiao)}, function (err, success) {
            if (!err) {
                console.log('callback success result:', success);
            } else {
                console.log('callback failed!');
            }
        });
    });
});
console.log('Hello from gian_giao.js');