$(document).ready(function () {
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });

    $('.i-checks').each(function () {
        if ($(this).prop("checked") == true) {
            var checkedCheck= true;
        }
        if(checkedCheck){
            $('.submit-product').attr('disabled', false);
        }
    });
});
