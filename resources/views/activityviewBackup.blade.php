<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>
@extends('layout.master')
@section('content')
<body>

    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <div class="card w-100 bg-white">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between">
                        <i class="bi bi-plus-circle"></i> สมัครเข้าร่วมกิจกรรมออนไลน์
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle bi bi-gear" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{'ActivityCreate'}}"><i class="bi bi-plus-circle"></i> สร้างกิจกรรม</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> แก้ไขกิจกรรม</a></li>
                            </ul>
                        </div>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <colgroup>
                                <col style="width: 20%;">
                                <col style="width: 40%;">
                                <col style="width: 40%;">
                            </colgroup>
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">ข้อมูล</th>
                                    <th class="text-center">ชื่อกิจกรรม</th>
                                    <th class="text-center">การรับสมัคร</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>สถานะเปิดปิด</td>
                                    <td>ชื่อกิจจัดโดย .... <br>
                                        สถานที่ ......
                                    </td>
                                    <td>รับสมัครวันที่ .... จำนวนที่รับ ......
                                    </td>
                                </tr>
                                <tr>
                                    <td>สถานะเปิดปิด</td>
                                    <td>ชื่อกิจจัดโดย .... <br>
                                        สถานที่ ......
                                    </td>
                                    <td>รับสมัครวันที่ .... จำนวนที่รับ ......
                                    </td>
                                </tr>
                                <tr>
                                    <td>สถานะเปิดปิด</td>
                                    <td>ชื่อกิจจัดโดย .... <br>
                                        สถานที่ ......
                                    </td>
                                    <td>รับสมัครวันที่ .... จำนวนที่รับ ......
                                    </td>
                                </tr>
                                <tr>
                                    <td>สถานะเปิดปิด</td>
                                    <td>ชื่อกิจจัดโดย .... <br>
                                        สถานที่ ......
                                    </td>
                                    <td>รับสมัครวันที่ .... จำนวนที่รับ ......
                                    </td>
                                </tr>
                                <tr>
                                    <td>สถานะเปิดปิด</td>
                                    <td>ชื่อกิจจัดโดย .... <br>
                                        สถานที่ ......
                                    </td>
                                    <td>รับสมัครวันที่ .... จำนวนที่รับ ......
                                    </td>
                                </tr>
                                <tr>
                                    <td>สถานะเปิดปิด</td>
                                    <td>ชื่อกิจจัดโดย .... <br>
                                        สถานที่ ......
                                    </td>
                                    <td>รับสมัครวันที่ .... จำนวนที่รับ ......
                                    </td>
                                </tr>
                                <!-- ตารางที่เหลือ -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
</html>
