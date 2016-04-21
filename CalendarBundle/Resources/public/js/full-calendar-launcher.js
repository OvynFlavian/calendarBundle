/**
 * Created by Ovyn Flavian on 05/04/2016.
 */
$(document).ready(function() {
    /*MODAL DECLARATION*/
    var modalUpdate = $("#modalUpdate");
    modalUpdate.hide();

    /*CALENDAR*/
    var calendar = $('#calendar');
    calendar.fullCalendar({
        lang: 'fr',
        theme: true,
        defaultView: "agendaWeek",
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        minTime: "6:00:00",
        maxTime: "24:00:00",
        editable: true,
        droppable: true,
        eventLimit: true, // allow "more" link when too many events
        events: Routing.generate('calendar_load_events'),
        /*event:{
            //url: "{{ path('calendar_load_events') }}",
            url: Routing.generate('calendar_load_events'),
            method: "post"
        },*/
        loading: function(bool) {
            $('#loading').toggle(bool);
        },
        eventClick: function(calEvent, jsEvent, view){
            console.log("Clique sur "+ calEvent.title);
            console.log("Sa date de départ: "+ calEvent.start.format("YYYY - MM - DD"));
            console.log("Son détail est: "+ calEvent.detail);
        },
        dayClick: function(date, jsEvent, view){
            if(view.name != "month")
            {
                $('#title').val("");
                $('#modalInsert').modal();
                $('#date_startDatetime').datetimepicker({
                    locale: 'fr',
                    defaultDate: date,
                    sideBySide: true
                });
                $('#date_endDatetime').datetimepicker({
                    locale: 'fr',
                    defaultDate: date,
                    sideBySide: true
                });
            }
            else
            {
                calendar.fullCalendar('changeView', 'agendaDay');
                calendar.fullCalendar('gotoDate', date);
            }
        },
        eventDrop: function(event, delta, revertFunc) {
            $("#modalUpdate").dialog({
                open: function(){
                    $("#modalUpdate").show();
                },
                modal: true,
                buttons: {
                    "Confirmer": function() {
                        $( this ).dialog( "close" );
                    },
                    Cancel: function() {
                        revertFunc();
                        $(this).dialog('close');
                    }
                }
            });

        }
    });

});