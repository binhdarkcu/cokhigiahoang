/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    $('#bao-gia').DataTable();
    $("#modal").iziModal({
         title: 'tttttttttttt',
    subtitle: 'sssssssssssss',
        width: 700,
        radius: 5,
        loop: true
    });
    $(document).on('click', '.xem', function (event) {
        event.preventDefault();
        // $('#modal').iziModal('setZindex', 99999);
        // $('#modal').iziModal('open', { zindex: 99999 });
        $('#modal').iziModal('open');
    });
});