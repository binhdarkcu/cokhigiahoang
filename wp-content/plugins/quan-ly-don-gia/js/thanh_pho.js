/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
    // Update value
    $('.geography-data').on('change', function () {
        const city = $(this).data('city');
        const district = $(this).data('district');
        const index = $(this).data('index')
        Cities[city][district][index] = this.value;
    });

    // Save value
    $('#luu-thay-doi').on('click', function () {
        sendPostRequest({action: 'update_setting', setting_key: server_setting_key,setting_value: JSON.stringify(Cities)}, function (err, success) {
            if (!err) {
                console.log('callback success result:', success);
            } else {
                console.log('callback failed!');
            }
        });
    });


});
console.log('Hello from thanh_pho.js');