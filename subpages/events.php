<!-- Events -->

<!-- Overview -->
<div class=" content-text" id="overview">
    <div class=" h1-border">
        <span></span>

        <h1 id="tab-header">Events</h1>
    </div>

    <p class="tab-overview">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt dolorum odio corporis soluta ratione!
        Totam sint corporis doloribus asperiores soluta! Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        Sunt dolorum odio corporis soluta ratione!
        Totam sint corporis doloribus asperiores soluta!
    </p>
</div>

<!-- Content -->
<div id="calendar-container">
    <div id='calendar'></div>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            themeSystem: 'standard',
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'month,agendaWeek,listMonth'
            },
            aspectRatio: 2,
            weekNumbers: false,
            eventLimit: true, // allow "more" link when too many events
            initialView: "dayGridMonth",
            eventColor: "#0f6938",
            googleCalendarApiKey: "AIzaSyB0YUm15OfH1qIriXy_rDRLwrBgwkbYlxk",
            events: {
                googleCalendarId: "r715rphqoahom925dclifqcph0@group.calendar.google.com"
            },

            eventClick: function(arg) {
                // opens events in a popup window
                window.open(arg.event.url, "_blank", "width=600,height=600");

                // prevents current tab from navigating
                arg.jsEvent.preventDefault();
            }
        });

        $('#calendar').fullCalendar('render');
    });
</script>