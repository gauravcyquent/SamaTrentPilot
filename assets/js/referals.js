$(document).ready(function () {


    /*$(document).on("click", ".indi-refer", function () {
        bootbox.confirm("Your referral has been recorded successfully. Thank you.", function (result) {
        });
    });*/

    $("#ref_form").validate({
        errorPlacement: function (error, element)
        {
            element.before(error);
        },
        rules: {
            Company_Name: "required",
        }
    });



});

