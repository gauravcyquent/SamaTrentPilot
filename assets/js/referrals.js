$(document).ready(function () {

    $('.dataTables-example').DataTable({
        "dom": 'lTfigt',
        "tableTools": {
            "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
        }
    });

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    /*$(document).on("click", ".indi-refer", function () {
     bootbox.confirm("Lead has been Referred successfully.", function (result) {
     });
     });*/

    $("#ref_form").validate({
        errorPlacement: function (error, element)
        {
            element.before(error);
        },
        rules: {
            lead_name: "required",
        },
        submitHandler: function (form) {
            bootbox.confirm("Lead has been Referred successfully.", function (result) {
                if (result == true) {
                    form.submit();
                }
            });
        }
    });

});

