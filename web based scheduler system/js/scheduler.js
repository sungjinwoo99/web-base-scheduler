document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        editable: true,
        events: '/api/fetch_events.php',
        eventDrop: function(info) {
            // Logic for handling event drop/resize, e.g. updating the DB
        }
    });

    calendar.render();
});
