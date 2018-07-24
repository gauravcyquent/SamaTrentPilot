$(document).ready(function () {

    /*$('input:radio').change(
            function () {
                bootbox.confirm("Do you really want to withdraw this lead?", function (result) {
                });
            }); */


    $('.dataTables-example').DataTable({
        "dom": 'lTfigt',
        "order": [[ 3, "desc" ]],
        "aLengthMenu": [100],
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

    $(document).on("click", ".withdraw", function () {
        var delID = $(this).attr('name');
        var withdrawUrl = $("#P_withdrawurl").val();
        bootbox.confirm("Do you really want to withdraw this lead?", function (result) {
            if (result == true) {
                $.ajax({
                    type: 'POST',
                    url: withdrawUrl,
                    data: {company_id: delID},
                    success: function (res) {
                        var obj = JSON.parse(res);
                        if (obj['status'] == true) {
                            $('#' + delID).attr('class', 'withdrawn');
                            $('#' + delID).html('<i class="fa fa-check"></i>');
                            $('#' + delID).closest('tr').removeClass("notwithdraw").addClass("already-withdrawn");
                            $('#' + delID).closest('tr').fadeOut(300,function() { $("#notification").remove(); });
                            //$('#' + delID).attr('class', 'withdrawn');
                            //$('#' + delID).prop('checked', true);
                            //$('#' + delID).closest('tr').removeClass("notwithdraw").addClass("already-withdrawn");
                            //location.reload();
                        } else {
                            alert("Bad request");
                        }
                    },
                });
            } else {
                $('#' + delID).closest('td').html('<input id="' + delID + '" class="withdraw" name="' + delID + '" type="checkbox">');
            }
        });
    });

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    $('#data_5 .input-daterange').datepicker({
     keyboardNavigation: false,
     forceParse: false,
     autoclose: true
     });
     
     $('#data_decade_view1 .input-group.date').datepicker({
     todayBtn: "linked",
     keyboardNavigation: false,
     forceParse: false,
     calendarWeeks: true,
     autoclose: true
     });
     $('#data_decade_view2 .input-group.date').datepicker({
     todayBtn: "linked",
     keyboardNavigation: false,
     forceParse: false,
     calendarWeeks: true,
     autoclose: true
     });




});


function delete_id(id)
{
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='<?php echo base_url();?>Referrals/deleteReffrals/'+id;
     }
}

