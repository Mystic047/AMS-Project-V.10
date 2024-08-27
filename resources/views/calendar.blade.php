<!DOCTYPE html>
<html>

<head>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <style>
        .calendar-container {
            padding: 0 15px;
        }


        .fc-toolbar-title,
        .fc-daygrid-day-number,
        .fc-event-title,
        .fc-daygrid-day,
        .fc-daygrid-day-number a,
        .fc-col-header-cell-cushion,
        .fc-col-header-cell-cushion a {
            text-decoration: none !important;
        }


        .fc-event:hover {
            background-color: #007bff !important;
            cursor: pointer;
            transform: scale(1.05);
            transition: transform .2s, background-color .2s;
        }


        .fc-daygrid-day:hover {
            background-color: #f8f9fa;
            transition: background-color .2s;
        }


        .fc-col-header-cell {
            background-color: #f0f0f0;
            color: #333;
            padding: 10px;
        }

        .fc-col-header-cell.fc-day-sun {
            background-color: #ffdddd;
        }

        .fc-col-header-cell.fc-day-mon {
            background-color: #ffebcc;
        }

        .fc-col-header-cell.fc-day-tue {
            background-color: #fff0b3;
        }

        .fc-col-header-cell.fc-day-wed {
            background-color: #e6ffcc;
        }

        .fc-col-header-cell.fc-day-thu {
            background-color: #ccffcc;
        }

        .fc-col-header-cell.fc-day-fri {
            background-color: #ccf2ff;
        }

        .fc-col-header-cell.fc-day-sat {
            background-color: #cce0ff;
        }
        * {
           font-family: 'Noto Sans Thai', sans-serif;
       }
    </style>
</head>

<body>
    @extends('layout.master')
    @section('content')
        <div class="container mt-5 calendar-container">
            <h1>กิจกรรมปฏิทิน</h1>
            <div id='calendar'></div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: '/activity-calendar',
                    locale: 'th',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    height: 'auto',
                    eventClick: function(info) {
                        var actId = info.event.id;
                        window.location.href = '/activity-info/' + actId;
                    }
                });
                calendar.render();
            });
        </script>

    </body>
@endsection

</html>
