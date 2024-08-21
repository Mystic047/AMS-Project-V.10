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
<body style="background-color:#f5f5f5;">

    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <div class="card w-100 bg-white">
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-between">
                        <i class="bi bi-plus-circle"></i> กิจกรรมทั้งหมด
                        <div class="dropdown">

                        </div>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">รายละเอียด</th>
                                    <th class="text-center">การรับสมัคร</th>
                                    <th class="text-center">ดูข้อมูลเพิ่มเติม</th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                               </tr>
                            </tbody>
                        </table><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
@endsection
</html>
