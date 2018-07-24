$(document).ready(function () {
    $("#calenderForm").validate({
        errorPlacement: function (error, element)
        {
            element.before(error);
        },
        rules: {
            name: "required",
        }
    });

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    /* initialize the external events
     -----------------------------------------------------------------*/


    $('#external-events div.external-event').each(function () {

// store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
        });
        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 1111999,
            revert: true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
    });
    /* initialize the calendar
     -----------------------------------------------------------------*/
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        dayClick: function (date, jsEvent, view) {
            $('#starts').val(date.format("YYYY/MM/DD hh:mm:ss"));
            $('#ends').val(date.format("YYYY/MM/DD hh:mm:ss"));
            $('#calenderActivity').modal();
            /*alert('Clicked on: ' + date.format());
             alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
             alert('Current view: ' + view.name);
             // change the day's background color just for fun
             $(this).css('background-color', 'red');*/
        },
        eventClick: function (event) {
            var activityId = event.id;
            $.ajax({
                type: 'POST',
                url: base_url + 'activity/getActivity',
                data: {activity_id: activityId},
                success: function (res) {
                    var obj = JSON.parse(res);
                    if (obj['status'] == true) {
                        $('.cal_activity_title').text(obj['result']['name']);
                        //$('#cal_activity_url').text(obj['result']['url']);
                        $('#cal_activity_company').text(obj['result']['company']);
                        $('#cal_activity_purpose').text(obj['result']['purpose']);
                        $('#cal_activity_notes').text(obj['result']['description']);
                        $('#cal_activity_start_time').text(obj['result']['start_date']);
                        $('#cal_activity_end_time').text(obj['result']['end_date']);
                        $('#calenderSingleActivity').modal();

                    } else {
                        alert("Bad request");
                    }
                },
            });

        },
        timeFormat: 'HH:mm{ - HH:mm}',
        editable: true,
        defaultView: 'agendaWeek',
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function () {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },
        events: activities
    });
    $('#datetimepicker4').datetimepicker({
        format: 'YYYY-MM-DD hh:mm a',
    });

    /*$(document).on("click", ".fc-time-grid-event", function () {
     //$('#calenderSingleActivity').modal();
     var titleActivity=$(this).find('.fc-title').text();
     alert(titleActivity);
     });*/



    $('#flash-message').delay(5000).fadeOut('slow');


});





