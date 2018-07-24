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

    SearchAreaResult = function () {
        var reqesturl = $('#P_reqesturl').val();
        var reqesturl_sales = $('#P_reqesturl_sales').val();
        var value = $('#area_select').val();
        var name = $('#area_select').attr('name');
        $.ajax({
            type: 'POST',
            url: reqesturl,
            data: {
                name: name, value: value
            },
            success: function (res) {
                $("#leads-listing").html(res);
            },
            dataType: 'html'
        });
        $.ajax({
            type: 'POST',
            url: reqesturl_sales,
            data: {
                name: name, value: value
            },
            success: function (res) {
                $("#sales-listing").html(res);
            },
            dataType: 'html'
        });
    }
    SearchIndustryResult = function () {
        var reqesturl = $('#P_reqesturl').val();
        var reqesturl_sales = $('#P_reqesturl_sales').val();
        var value = $('#indus_id').val();
        var name = $('#indus_id').attr('name');
        $.ajax({
            type: 'POST',
            url: reqesturl,
            data: {
                name: name, value: value
            },
            success: function (res) {
                $("#leads-listing").html(res);
            },
            dataType: 'html'
        });
        $.ajax({
            type: 'POST',
            url: reqesturl_sales,
            data: {
                name: name, value: value
            },
            success: function (res) {
                $("#sales-listing").html(res);
            },
            dataType: 'html'
        });
    }
    SearchSectorResult = function () {
        var reqesturl = $('#P_reqesturl').val();
        var reqesturl_sales = $('#P_reqesturl_sales').val();
        var value = $('#product_interest').val();
        var name = $('#product_interest').attr('name');
        $.ajax({
            type: 'POST',
            url: reqesturl,
            data: {
                name: name, value: value
            },
            success: function (res) {
                $("#leads-listing").html(res);
            },
            dataType: 'html'
        });
        $.ajax({
            type: 'POST',
            url: reqesturl_sales,
            data: {
                name: name, value: value
            },
            success: function (res) {
                $("#sales-listing").html(res);
            },
            dataType: 'html'
        });
    }

    $(document).on("click", ".refer-lead", function () {
        bootbox.confirm("Lead has been Referred successfully.", function (result) {
        });
    });

$('.dataTables-example').DataTable({
        "dom": 'lTfigt',
        "order": [[ 3, "desc" ]],
        "aLengthMenu": [100],
        "tableTools": {
            "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
        }
    });



});

