$(document).ready(function () {
    $("#allocatorForm").validate({
        errorPlacement: function (error, element)
        {
            element.before(error);
        },
        rules: {
            region: "required",
            area: "required",
        }
    });
});





