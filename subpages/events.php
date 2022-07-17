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

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script src="./calendarScript.js"></script> -->
<script>
    $('#calendar').fullCalendar();
    $("#calendar").fullCalendar().appendTo("#calendar-container");


    document.addEventListener("DOMContentLoaded", function() {
        console.log("scripts loading");
        var calendarEl = document.getElementById("calendar");

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,listYear",
            },
            initialView: "dayGridMonth",
            eventColor: "#0f6938",
            googleCalendarApiKey: "AIzaSyAsGenDe0TQE8hXkf5Z7o8mSN6gz5ut6v8",
            events: "r715rphqoahom925dclifqcph0@group.calendar.google.com",

            eventClick: function(arg) {
                // opens events in a popup window
                window.open(arg.event.url, "_blank", "width=600,height=600");

                // prevents current tab from navigating
                arg.jsEvent.preventDefault();
            },
        });
        calendar.render();
    });
</script>

<!-- STYLESHEET -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">