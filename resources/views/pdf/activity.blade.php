<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Submits</title>
    <style>
       @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
        body {
            font-family: 'THSarabunNew', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>{{ $activity->activity_name }}</h1>
    <h3>รายชื่อผู้สมัคร</h3>
    <table>
        <thead>
            <tr>
                <th>รหัส</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>      
                <th>สาขา</th>
                <th>สถานะ</th>                                             
            </tr>
        </thead>
        <tbody>
            @foreach ($activitiesSubmits as $submit)
                <tr>
                    <td>{{ $submit->student->students_id ?? 'N/A' }}</td>
                    <td>{{ $submit->student->firstname ?? 'N/A' }}</td>
                    <td>{{ $submit->student->lastname ?? 'N/A' }}</td>  
                    <td>{{ $submit->student->area->areaName ?? 'N/A' }}</td>
                    <td>{{ $submit->status ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
