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
    </style>
</head>
<body>
    <div class="certificate-content">
        <img src="{{ public_path('storage/certificate/certificate.png') }}" alt="Certificate Image" class="certificate-image">
    </div>
</body>
</html>
