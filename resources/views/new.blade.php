<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .card-img-top {
            width: 250px;
            height: 180px;
            object-fit: cover;
        }

        .card-footer {
            border-top: 1px solid #dee2e6; /* เพิ่มเส้นใต้แบ่ง */
            padding-top: 10px; /* เพิ่มระยะห่างด้านบน */
            margin-top: 10px; /* เพิ่มระยะห่างด้านบน */
        }
    </style>
</head>

@extends('layout.master')
@section('content')

<body style="background-color:#f5f5f5;">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                            </div>
                            <div class="col-9">
                                <h5 class="card-title">ชื่อเรื่อง</h5>
                                <hr> <!-- เพิ่มเส้นใต้ชื่อเรื่อง -->
                                <p class="card-text">เนื้อเรื่อง</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center"> <!-- ใช้ text-center เพื่อย้ายข้อมูลไปตรงกลาง -->
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">ผู้เขียน: John Doe</p> <!-- เพิ่มข้อมูลผู้เขียน -->
                            </div>
                            <div class="col-4">
                                <p class="card-text">วันที่: January 1, 2024</p> <!-- เพิ่มข้อมูลวันที่ -->
                            </div>
                            <div class="col-4">
                                <p class="card-text">การเข้าชม: 100 views</p> <!-- เพิ่มข้อมูลการเข้าชม -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous">
    </script>
</body>
@endsection

</html>
