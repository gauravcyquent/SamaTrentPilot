$(document).ready(function () {

    /*$('input:radio').change(
            function () {
                bootbox.confirm("Do you really want to withdraw this lead?", function (result) {
                });
            }); */


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

   
    $('#performance_decade_view1 .input-group.date').datepicker({
     todayBtn: "linked",
     keyboardNavigation: false,
     forceParse: false,
     calendarWeeks: true,
     autoclose: true
     });
     $('#performance_decade_view2 .input-group.date').datepicker({
     todayBtn: "linked",
     keyboardNavigation: false,
     forceParse: false,
     calendarWeeks: true,
     autoclose: true
     });



});

