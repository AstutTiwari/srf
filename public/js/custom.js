/*mask in rigester page*/ 
$('#phone').mask('(000) 000-0000');
$('#certificate_id').mask('000000000');
 /*here start validation*/
$(document).ready(function () {

    $('#register_form').validate({
        errorClass: 'kt-link--danger', // initialize the plugin
    });


    $('#login_form').validate({
        errorClass: 'kt-link--danger', // initialize the plugin
    });

   /*Product form*/


});

