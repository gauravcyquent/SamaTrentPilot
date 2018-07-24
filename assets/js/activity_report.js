$(document).ready(function () {
    $('#data_start .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    $('#data_end .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    

    setTimeout(function () {
        if ($('#flash-message').length > 0) {
            console.log('this is a hsd');
            window.location.href = base_url+"activity";
        }
    }, 5000);
    
    $("#calenderForm").validate({
        errorPlacement: function (error, element)
        {
            element.before(error);
        },
        rules: {
            name: "required",
        }
    });
    
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
    $('#datetimepicker2').datetimepicker({
      language: 'pt-BR'
    });
    $('#datetimepicker3').datetimepicker({
      language: 'pt-BR'
    });
    $('#datetimepicker4').datetimepicker({
      language: 'pt-BR'
    });


});