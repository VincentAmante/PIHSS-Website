
<?php include './assets/functions/header.php'?>
<?php
    if ($conn->connect_error) {
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $events = array();

        $eventsQuery = $conn->query("SELECT * from events");    

        while ($event = $eventsQuery->fetch_assoc()){
            $eventObj = (object) 
                array('id'=> $event['ID'],
                    'title' => $event['title'], 
                    'startDate' => $event['startDate'], 
                    'endDate' => $event['endDate']);

            array_push($events, $eventObj);
        }

        $eventsList = json_encode($events);
        var_dump($eventsList);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/add-article.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/add-to-calendar-button/assets/css/atcb.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</head>
<body>
<main>
    <section id="calendar-view">
        <div id="calendar-container">
            <div id='calendar'>

            </div>
        </div>
    </section>
    <section>
        <div id='alert'></div>
    </section>
    <section>
        <div class="form-wrapper">
            <form class="admin-form" id="admin-form" action="./assets/functions/submit-event.php" method="POST" enctype="multipart/form-data">
                <!-- Title -->
                <div class="form-item">
                    <label for="event-title">Title</label>
                    <input type="text" id="event-title" name="event-title" spellcheck="false" autocomplete="off" required placeholder="Article Title">
                </div>

                <!-- Start Date -->
                <div class="form-item">
                    <label for="start-date">Start Date</label>
                    <input type="date" name="start-date" required value="<?php echo date("Y-m-d")?>">
                </div>
                
                <!-- End Date -->
                <div class="form-item">
                    <label for="end-date">End Date</label>
                    <input type="date" name="end-date" required value="<?php echo date("Y-m-d")?>">
                </div>
            
                <!-- Form Buttons -->
                <div class="form-item form-item-empty">
                    <div class="buttons">
                        <button class="form-button form-submit" name="add-event">Add</button>
                        <button class="form-button form-reset" type="reset">Clear</button>
                    </div>
                </div>
            </form>  <!-- #admin-form -->
        </div> <!-- .form-wrapper -->
    </section>
</main>

<div id="alerts"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/assets/js/calendar-script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/add-to-calendar-button" async defer></script>
<!-- Scripts for FullCalendar-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/gcal.min.js" integrity="sha512-RNx7SF8EJxJ8DMmlgPg6bTZbMilWFlu883XE7OLXKAdEAlfRDjS4YPBHd0WMvCNHugxESvDZIlU+y1M06duXGQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let events = JSON.parse(`<?php echo $eventsList?>`);
    let eventsList = [];
    let eventObjects = [];

    events.forEach(element => {
        let newEvent = new CalendarEvent(element);
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
            
            eventClick: function(event) {
                let id = event.className[0].substr('id-'.length) - 1;
                const eventConfig = eventObjects[id];
                const button = document.querySelector('#default-button');
                atcb_action(eventConfig.eventConfig, null);
            }
        });

        $('#calendar').fullCalendar('render');
    });
    
</script>
</body>
</html>