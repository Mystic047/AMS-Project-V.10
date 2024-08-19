<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Logo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* เพิ่มขนาดภาพให้มีขนาดพอดีกับ Navbar */
        .navbar-brand img {
            width: 150px;
            /* ปรับขนาดของรูปภาพตามความต้องการ */
            height: auto;
            /* รักษาอัตราส่วนของรูปภาพ */
        }

        /* ปรับลักษณะของ Navbar ให้แบ่งเป็นสองส่วน */
        .bottom-navbar {
            background-color: #ffc000;
            /* สีพื้นหลังส่วนบน */
        }

        .top-navbar {
            background-color: white;
            /* สีพื้นหลังส่วนล่าง */
        }

        /* ปรับระยะห่างระหว่างไอคอนและข้อความในเมนู Navbar */
        .nav-link i {
            margin-right: 0.25rem;
            /* ปรับระยะห่างด้านขวาของไอคอน */
        }

        /* ปรับระยะห่างของหัวข้อเมนู */
        .nav-link {
            margin-right: 2rem;
            /* ปรับระยะห่างด้านขวาของหัวข้อเมนู */
        }

        .navbar-nav .nav-link {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .navbar-nav .nav-link:hover {
            color: black;
            /* เปลี่ยนสีของตัวหนังสือเป็นสีดำเมื่อมีการชี้ */
        }
    </style>
</head>

<body>
    <nav class="sticky-top">
        <nav class="navbar navbar-expand-lg top-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://img2.pic.in.th/pic/sci-logo-1-removebg-preview.png" alt="Navbar Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- Login Buttons -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('login.show') }}" class="btn btn-outline-primary">ลงชื่อเข้าใช้</a>
                            <a href="{{ route('adminlogin.show') }}" class="btn btn-outline-success">เจ้าหน้าที่</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg bottom-navbar">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div
                        class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center w-100">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}"><i
                                        class="fas fa-home"></i> หน้าแรก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news.list') }}"><i class="fas fa-newspaper"></i>
                                    ข่าวสาร</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('filedowload') }}"><i class="fas fa-file-download"></i>
                                    เอกสารดาวน์โหลด</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#notificationModal">
                                    <i class="fas fa-bell"></i> รับการแจ้งเตือนกิจกรรมใหม่</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-calendar"></i> งานกิจกรรม
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('activity.calendar')}}"><i class="fas fa-calendar"></i>
                                            ปฏิทินกิจกรรม</a></li>
                                    <li><a class="dropdown-item" href="{{ route('activity.manageFront') }}"><i
                                                class="fas fa-pen-square"></i> จัดการกิจกรรม</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i>
                                            Something else here</a></li>
                                </ul>
                            </li>
                        </ul>

                        @php
                            $user = getAuthenticatedUser();
                        @endphp

                        @if ($user)
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user"></i> {{ $user->firstName }}'s Profile
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ url('Profile') }}"><i
                                                    class="fas fa-cog"></i> แก้ไขข้อมูล</a></li>
                                        <li><a class="dropdown-item" href="{{ route("activity.submit.history" , $user->userId) }}"><i
                                                    class="fas fa-pen-square"></i>
                                                ประวัติการเข้าร่วม</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <!-- Logout Form -->
                                            <form action="{{ route('login.logout') }}" method="POST"
                                                style="display: none;" id="logout-form">
                                                @csrf
                                            </form>
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-door-closed"></i> ล๊อคเอ้า
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                        @endif

                    </div>
                </div>
            </div>
        </nav>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Qrcode กลุ่มแจ้งเตือนกิจกรรมใหม่ </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('storage/pictures/Qrcode.png') }}" class="img-fluid mx-auto d-block"
                        alt="กิจกรรมใหม่" style="width: 200px; height: 200px;">
                    <p class="mt-2">แจ้งเตือนกิจกรรมใหม่ คณะวิทยาศาสตร์</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
