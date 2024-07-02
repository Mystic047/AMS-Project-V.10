<!DOCTYPE html>
<html>
<head>
    <title>Activity Submits</title>
    <style>
        body {
            font-family: 'Sarabun', sans-serif; /* Update this line with your font */
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
                    <td>{{ $submit->student->students_id }}</td>
                    <td>{{ $submit->student->firstname }}</td>
                    <td>{{ $submit->student->lastname }}</td>  
                    <td>{{ $submit->student->area->areaName }}</td>
                    <td>{{ $submit->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
