<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page Design</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>
@extends('layout.master')
@section('content')
    @php
        $user = getAuthenticatedUser();
    @endphp

    <body>

        <div class="container mt-3">
            <div class="row">

                <div class="col-lg-4">
                    <div class="card">
                        <img src="{{ $user->profilePicture ? asset('storage/' . $user->profilePicture) : 'https://via.placeholder.com/200' }}"
                            class="card-img-top rounded-circle mx-auto mt-3" alt="Dominic Keller"
                            style="width: 150px; height: 150px; object-fit: cover;">
                        <div class="card-body text-center">
                            <div>
                                <h5 class="card-title">{{ $user->firstName }} {{ $user->lastName }}</h5>
                            </div>
                            <p class="text-muted">{{ $user->nickName }}</p>
                            <a href="#" class="btn btn-success me-2">อัปโหลดรูปภาพ</a>
                            <div class="mt-4">
                                <h6>ABOUT ME:</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">รหัสนักศึกษา: {{ $user->userId }}</li>
                                <li class="list-group-item">Email: {{ $user->email }}</li>
                                <li class="list-group-item">สาขาวิชา: {{ $user->area->areaName }}</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="card-link"><i class="fab fa-google"></i></a>
                                <a href="#" class="card-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="card-link"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>โปรไฟล์ส่วนตัว แดะแก้</h5> <!-- บรรทัดนี้เพิ่มเข้ามา -->
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- Form Fields -->
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="first_name" class="form-label">รหัสนักศึกษา</label>
                                        <input type="text" class="form-control" id="first_name"
                                            placeholder="ให้โชว์แล้วเป็น disable" value="{{ $user->userId }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="last_name" class="form-label">อีเมล</label>
                                        <input type="text" class="form-control" id="last_name"
                                            placeholder="ให้โชว์แล้วเป็น disable" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="first_name" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" id="first_name"
                                            placeholder="Enter your first name" value="{{ $user->firstName }}">
                                    </div>
                                    <div class="col">
                                        <label for="last_name" class="form-label">นามสกุล</label>
                                        <input type="text" class="form-control" id="last_name"
                                            placeholder="Enter your last name" value="{{ $user->lastName }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bio" class="form-label">ชื่อเล่น</label>
                                    <input type="text" class="form-control" id="last_name"
                                        placeholder="Enter your last name" value="{{ $user->nickName }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">สาขาวิชา</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="ให้โชว์แล้วเป็น disable" value="{{ $user->area->areaName }}">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Info</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- Icons (make sure to include the library for icons) -->
        <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>
    </body>
@endsection

</html>
