$(document).ready(function () {
    $(document).on("click", ".withdraw", function () {
        var delID = $(this).attr('name');
        var withdrawUrl = $("#P_withdrawurl").val();
        bootbox.confirm("Do you really want to Delete this refer?", function (result) {
            if (result == true) {
                $.ajax({
                    type: 'POST',
                    url: withdrawUrl,
                    data: {reffer_id: delID},
                    success: function (res) {
                        var obj = JSON.parse(res);
                        if (obj['status'] == true) {
                            $('#' + delID).closest('tr').fadeOut(300);
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
	
	

						$('.dataTables-example').DataTable({
        "dom": 'lTfigt',
        "order": [[ 3, "asc" ]],
        "aLengthMenu": [100],
        "tableTools": {
            "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
        }
    });
	});

    

