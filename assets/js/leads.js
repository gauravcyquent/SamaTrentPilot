$(document).ready(function () {
    /*$("#leadform").validate({
        errorPlacement: function (error, element)
        {
            element.before(error);
        },
        rules: {
            category_name: "required",
        }
    });*/

    SearchResult = function () {
        var reqesturl = $('#P_reqesturl').val();
        var value = $('#area_select').val();
        var name = $('#area_select').attr('name');
        $.ajax({
            type: 'POST',
            url: reqesturl,
            data: {
                name:name,value: value
            },
            success: function (res) {
                $("#leads-listing").html(res);
            },
            dataType: 'html'
        });
    }
    
    /*$(document).on("click", ".refer-lead", function () {
        bootbox.confirm("Lead has been Referred successfully.", function (result) {});
    });*/

    $(document).on("click",'.addMoreProduct',function(){
        $( ".productInterest" ).clone().appendTo( ".topProductInterest" );
    });
     



});

