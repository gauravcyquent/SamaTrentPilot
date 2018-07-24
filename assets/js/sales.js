$(document).ready(function () {

    $('.dataTables-example').DataTable({
        "dom": 'lTfigt',
        "tableTools": {
            "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
        }
    });
    /* Init DataTables */
    var oTable = $('#editable').DataTable();
    /* Apply the jEditable handlers to the table */
    oTable.$('td').editable('../example_ajax.php', {
        "callback": function (sValue, y) {
            var aPos = oTable.fnGetPosition(this);
            oTable.fnUpdate(sValue, aPos[0], aPos[1]);
        },
        "submitdata": function (value, settings) {
            return {
                "row_id": this.parentNode.getAttribute('id'),
                "column": oTable.fnGetPosition(this)[2]
            };
        },
        "width": "90%",
        "height": "100%"
    });
    $(document).on("click", ".finish-product", function () {
        bootbox.confirm("Selection has been saved successfully.", function (result) {
            if (result == true) {
                window.location = base_url + 'sales/bundle';
            }
        });
    });
    $(document).on("click", ".email-finish", function () {
        bootbox.confirm("Product Selection Summary has been sent successfully.", function (result) {
        });
    });
    $('.ref-check').change(function () {
        location.reload();
    });
    $(".industryPicker").change(function () {
        var classSelect = $(this).val();
        $('.industry .contact-box').removeClass('orange-bg').addClass('light-grey-bg');
        $('#checkbox4').prop('checked', false);
        $('#checkbox5').prop('checked', false);
        $('#checkbox6').prop('checked', false);
        $('.' + classSelect).closest('.contact-box').removeClass('light-grey-bg').addClass('orange-bg');
        $('.' + classSelect).prop('checked', true);
    });
    $(".loanPicker").change(function () {
        var classSelect = $(this).val();
        $('.loan .contact-box').removeClass('orange-bg').addClass('light-grey-bg');
        $('#checkbox11').prop('checked', false);
        $('#checkbox12').prop('checked', false);
        $('#checkbox13').prop('checked', false);
        $('.' + classSelect).closest('.contact-box').removeClass('light-grey-bg').addClass('orange-bg');
        $('.' + classSelect).prop('checked', true);
    });
    $('input[type=checkbox]').click(function () {
        if ($(this).is(':checked')) {
            $(this).closest('.contact-box').removeClass('light-grey-bg').addClass('orange-bg');
        } else {
            $(this).closest('.contact-box').removeClass('orange-bg').addClass('light-grey-bg');
        }
    });
    $(document).on("click", ".finish-email-details", function () {
        var email_val = $('#email-pro').val();
        if (email_val != '') {
            if (isEmail(email_val)) {
                $('.form-email').hide();
                $('.form-message').show();
            } else {
                $('.error-email').html('Please enter Valid email');
            }
        } else {
            $('.error-email').html('Please enter email');
        }
    });

    $('#myEmailModal').on('hidden.bs.modal', function () {
        $('.form-email').show();
        $('.error-email').html('');
        $('.form-message').hide();
        $('#email-pro').val('');
    })

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $(document).on("click", ".edit-doc", function () {
        var name = $(this).attr('name');
        var id = $(this).attr('id');
        $('#document_name').val(name);
        $('#document_id').val(id);
        $('#edit').modal();
    });

    $(document).on("click", ".remove-product", function () {
        var loyality = $(this).attr('name');
        var amount = $(this).attr('id');
        var totalAmount = $("#total_amount_col").text();
        var totalPoints = $("#total_points_col").text();
        $("#total_amount_col").text(totalAmount - amount);
        $("#total_points_col").text(totalPoints - loyality);
        $('#').closest('tr').removeClass("notwithdraw").addClass("already-withdrawn");
        $(this).closest('tr').fadeOut(300, function () {
            $(this).closest('tr').remove();
        });
    });
    $(document).on("click", ".edit-form-app", function () {
        //$("input.checks").prop("disabled", false);
        $(".withdraw1").removeClass("withdraw1").addClass("withdraw checkboxes-docs-remove");
    });

    /*$(document).on("change", "input.checkboxes-docs", function () {
     $(this).closest('li').fadeOut(300);
     });*/
    $('input.checkboxes-docs').change(function () {
        $(this).closest('li').fadeOut(300);
    });
    $(document).on("click", ".checkboxes-docs-remove", function () {
        $(this).closest('li').fadeOut(300);
    });

    $(".amount-box").keyup(function () {
        var amount_value = $(this).val();
        var loyality_id = $(this).attr('name');
        if (amount_value >= 500 && amount_value <= 999) {
            var loyality = 50000;
        } else if (amount_value >= 1000 && amount_value <= 1499) {
            var loyality = 75000;
        } else if (amount_value >= 1500 && amount_value <= 2000) {
            var loyality = 100000;
        }  else {
            var loyality = '';
        }
        var sum = 0;
        $('#loyal' + loyality_id).val(loyality);
        $('.amount-box').each(function () {
            var thisval = $(this).val();
            sum += sum + thisval;
        });

    });

    $(document).on("click", ".enable-button", function () {
        $('.submit-product').attr('disabled', false);
    });
    

});

