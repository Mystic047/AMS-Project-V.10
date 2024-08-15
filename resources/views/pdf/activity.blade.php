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
        h1 {
            text-align: center;
            margin-top: 10px; /* Adjust top margin */
            margin-bottom: 10px; /* Adjust bottom margin */
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }
        .header h3 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            text-align: center;
            line-height: 1.5;
            padding: 4px;
            height: 30px; /* Adjusted height */
            background-color: #e0e0e0;
        }
        .order-column {
            width: 5%;
        }
        .id-column {
            width: 15%;
        }
        .name-column, .lastname-column {
            width: 25%;
        }
        .area-column {
            width: 30%;
        }
        .image-container {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px; /* Adjust right margin */
        }
    </style>
</head>
<body>
    <span>
        <img class="image-container" src="{{ public_path('storage/pictures/scilogo.png') }}" width="205" height="70">
        <h1>{{ $activity->activity_name }}</h1>
    </span>
    <div class="header">
        <h3>รหัสกิจกรรม : {{ $activity->activity_id }}</h3>
        <h3>รายชื่อผู้สมัคร</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th class="order-column">ลำดับที่</th>
                <th class="id-column">รหัส</th>
                <th class="name-column">ชื่อ</th>
                <th class="lastname-column">นามสกุล</th>
                <th class="area-column">สาขา</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activitiesSubmits as $submit)
                <tr>
                    <td class="order-column">{{ $loop->iteration }}</td>
                    <td class="id-column">{{ $submit->student->userId ?? 'N/A' }}</td>
                    <td class="name-column">{{ $submit->student->firstName ?? 'N/A' }}</td>
                    <td class="lastname-column">{{ $submit->student->lastName ?? 'N/A' }}</td>
                    <td class="area-column">{{ $submit->student->area->areaName ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
