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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="col-md-12">
            <div class="card w-100 bg-white border-0">
                <div class="card-body">
                    <h5 class="card-title">กิจกรรมที่เปิดรับสมัคร</h5>
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
                                @foreach ($activities as $activity)
                                    <tr>
                                        <td class="text-center">
                                            @if ($activity->registration_status == 'open')
                                                <span class="badge bg-success">เปิด</span>
                                            @else
                                                <span class="badge bg-danger">ปิด</span>
                                            @endif
                                        </td>
                                        <td>
                                            <i class="fa-solid fa-house"></i> กิจกรรม: <span
                                                style="color: blue;">{{ $activity->actName }}</span>
                                            <br><i class="fa-solid fa-list"></i> จัดโดย: {{ $activity->actResBranch }}
                                            &nbsp;&nbsp; <i class="fa-solid fa-location-dot"></i> สถานที่:
                                            {{ $activity->actLocation }}
                                            <br><i class="fa-solid fa-clock"></i> ชั่วโมงกิจกรรมที่ได้รับ:
                                            {{ $activity->actHour }} ชั่วโมง
                                        </td>
                                        <td class="text-center">
                                            <i class="fa-solid fa-calendar-days"></i> รับสมัครถึงวันที่:
                                            {{ $activity->actDate }}
                                            <br><i class="fa-solid fa-user"></i> จำนวนที่รับ: <span
                                                style="color: red;">{{ $activity->actRegisLimit }}</span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-success"
                                                onclick="location.href='{{ route('activity.info', $activity->actId) }}'">ดูข้อมูล</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination Links using the custom pagination template -->
                        <div class="d-flex justify-content-center">
                            {{ $activities->links('vendor.pagination.bootstrap-5') }}
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

@endsection
</html>
