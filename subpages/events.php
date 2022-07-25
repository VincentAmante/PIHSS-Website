<!-- Events -->
<?php include '../admin/assets/functions/get-calendar-content.php' ?>

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
<div class="tab-content" id="calendar-container">
    <div id='calendar'></div>
</div> <!-- #calendar-container -->

<!-- Scripts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/add-to-calendar-button/assets/css/atcb.min.css">
<script>
    let eventsContent = JSON.parse(`<?php echo $eventsList ?>`);
    let eventsList = [];
    let eventObjects = [];

    eventsContent.forEach((element, index) => {
        let newEvent = new CalendarEvent(element, index);
        eventObjects.push(newEvent);
        eventsList.push(newEvent.fullCalendarEvent);
    });

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
            events: eventsList,

            // Code for adding event to calendar
            eventClick: function(event, jsEvent) {
                let index = event.className[0].substr('id-'.length);
                const eventConfig = eventObjects[index];
                atcb_action(eventConfig.eventConfig, null);
            },
        });

        $('#calendar').fullCalendar('render');
    });
</script>