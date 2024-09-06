<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity History</title>
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
            width: 10%;
        }
        .id-column {
            width: 50%;
        }
        .status-column {
            width: 40%;
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
    </span>
    <div class="header">
        <h3>รายชื่อผู้รับผิดชอบของแต่ละโครงการ</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th class="order-column">ลำดับที่</th>
                <th class="id-column">ชื่อกิจกรรม</th>
                <th class="status-column">ผู้รับผิดชอบ</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>
</html>
