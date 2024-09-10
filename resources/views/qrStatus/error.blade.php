<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts for the message -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600&display=swap" rel="stylesheet">
    <!-- Animate.css for animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f0f0f0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Prompt', sans-serif;
        }
        .error-message {
            text-align: center;
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-in-out;
        }
        .error-message h1 {
            font-size: 4rem;
            color: #dc3545;
        }
        .error-message p {
            font-size: 1.5rem;
            color: #6c757d;
        }
        .error-message .btn {
            margin-top: 20px;
            padding: 10px 30px;
        }
    </style>
</head>
<body>
    <div class="error-message animate__animated animate__bounceInDown">
        <i class="fas fa-exclamation-circle fa-5x text-danger mb-3"></i>
        <h1>เกิดข้อผิดพลาด</h1>
        <p>   {{ $error ?? 'เกิดข้อผิดพลาดในการเช็คอิน' }}</p>
        <a href="{{ route('welcome.home') }}" class="btn btn-gray btn-lg animate__animated animate__pulse animate__infinite">กลับสู่หน้าแรก</a>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
