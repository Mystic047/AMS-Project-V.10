<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        body {
            font-family: 'THSarabunNew', sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .certificate-content {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .certificate-image {
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
        }

        .text-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #000;
            text-align: center;
        }

        .text-content h1 {
            font-size: 48px;
            margin: 0;
        }

        .text-content p {
            font-size: 36px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="certificate-content">
        <img src="{{ public_path('storage/certificate/certificate.png') }}" alt="Certificate Image" class="certificate-image">
        <div class="text-content">
            <h2>{{ $data->student->firstName }} {{ $data->student->lastName }}</h2>
            <h2>{{ $data->activity->actName }}</h2>
            <h2>{{ $data->activity->actDate }}</h2>
            <h2>{{ $data->activity->actHour }}</h2>
        </div>
    </div>
</body>
</html>
