<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer with Social Icons</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        .content {
            flex: 1;
        }

        .main-footer {
            background-color: #000; /* พื้นหลังสีดำ */
            color: #fff; /* ตัวอักษรสีขาว */
            padding: 20px 0;
            text-align: center;
            width: 100%;
        }

        .footer-center {
            display: inline-block;
            font-size: 14px;
        }

        .bullet {
            margin: 0 5px;
        }

        .main-footer a {
            color: #fff; /* สีตัวอักษรลิงก์สีขาว */
            text-decoration: none;
            margin: 0 10px;
        }

        .main-footer a:hover {
            color: #ccc; /* สีเมื่อลากเมาส์ไปที่ลิงก์ */
        }

        .social-icons a {
            font-size: 24px;
        }
    </style>
</head>
<body>

    <div class="content">
        <!-- เนื้อหาของเพจที่นี่ -->
        {{-- <p>เนื้อหาที่คุณต้องการ</p>
        <p>เพิ่มเนื้อหาตามที่ต้องการ</p> --}}
    </div>

    <footer class="main-footer">
        <div class="footer-center">
            Copyright &copy; 2024 <span class="bullet">ระบบงานกิจกรรมนักศึกษา คณะวิทยาศาสตร์ มหาวิทยาลัยราชภัฏบุรีรัมย์</span>
        </div>
        <div class="footer-right">
            <div class="social-icons">
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div>
        </div>
    </footer>

</body>
</html>
