<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Cards Layout</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link to your custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/activity.css') }}">
</head>
<style>
    /* Add any custom styles here */
</style>
@extends('layout.master')
@section('content')

    <body style="background-color:#f5f5f5;">
        <br>
        <div class="container">
            <div class="row layout-top-spacing layout-spacing">
                <div class="col-lg-9 col-md-12 layout-spacing">
                    <!-- Card 1: Activity Information -->
                    <div class="card card-left">
                        <div class="card-body">
                            <div class="widget-heading mb-4">
                                <h3 class="">โครงการปัจฉิมนิเทศนักศึกษา ประจำปีการศึกษา 2566 <span
                                        class="badge badge-warning">95 View</span></h3>
                            </div>
                            <div class="widget-content border-tab">
                                <ul class="nav nav-tabs mt-3" id="border-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="border-home-tab" data-bs-toggle="tab"
                                            href="#border-home" role="tab" aria-controls="border-home"
                                            aria-selected="true">ข้อมูลกิจกรรม</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="border-profile-tab" data-bs-toggle="tab"
                                            href="#border-profile" role="tab" aria-controls="border-profile"
                                            aria-selected="false">รายชื่อผู้สมัคร</a>
                                    </li>
                                </ul>
                                <br>
                                <div class="tab-content mb-4" id="border-tabsContent">
                                    <div class="tab-pane fade show active" id="border-home" role="tabpanel"
                                        aria-labelledby="border-home-tab">
                                        <h4 class="mb-4"><i class="fas fa-info-circle"></i> เกี่ยวกับกิจกรรม</h4>
                                        <div class="row">
                                            <div class="col-12 col-md-3">ชื่อกิจกรรม</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->activity_name }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">สังกัด</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span
                                                    class="text-primary">{{ $activity->activity_responsible_branch }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-3">จำนวนที่รับสมัคร</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->activity_register_limit }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">ค่าชั่วโมง</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->activity_hour_earned }}
                                                    ชั่วโมง</span>
                                            </div>
                                            <div class="col-12 col-md-3">เปิดรับสมัคร</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span
                                                    class="text-primary">{{ \Carbon\Carbon::parse($activity->activity_date)->format('d F Y') }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">สถานะ</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span
                                                    class="badge {{ $activity->activity_register_limit > 0 ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $activity->activity_register_limit > 0 ? 'เปิดรับสมัคร' : 'ปิดรับสมัคร' }}
                                                </span>
                                            </div>
                                        </div>
                                        <h4 class="mb-4 mt-4"><i class="fas fa-calendar-alt"></i> กำหนดการจัดกิจกรรม</h4>
                                        <div class="row">
                                            <div class="col-12 col-md-3">วันที่จัดกิจกรรม</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span
                                                    class="text-primary">{{ \Carbon\Carbon::parse($activity->activity_date)->format('d F Y') }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">สถานที่</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->activity_location }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">ผู้รับผิดชอบ</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->responsible_person }}</span>
                                            </div>
                                        </div>
                                        @if ($activity->picture)
                                            <div id="image-container" class="mt-4 mb-4">
                                                <img style="border-radius: 20px;"
                                                    src="{{ asset('storage/' . $activity->picture) }}" width="100%">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="border-profile" role="tabpanel"
                                        aria-labelledby="border-profile-tab">
                                        <h4 class="mb-4"><i class="fas fa-user"></i> รายชื่อผู้สมัคร</h4>
                                        <table class="table">
                                            <thead>
                                                <tr class="table-light">
                                                    <th>ลำดับ</th>
                                                    <th>รหัสนักศึกษา</th>
                                                    <th>ชื่อ</th>
                                                    <th>สาขา</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>640112418053</td>
                                                    <td>ชื่อ นามสกุล</td>
                                                    <td>คณะวิทยาศาสตร์</td>
                                                    <td>รอการยืนยัน</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>640112418053</td>
                                                    <td>ชื่อ นามสกุล</td>
                                                    <td>คณะวิทยาศาสตร์</td>
                                                    <td>รอการยืนยัน</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>640112418053</td>
                                                    <td>ชื่อ นามสกุล</td>
                                                    <td>คณะวิทยาศาสตร์</td>
                                                    <td>รอการยืนยัน</td>
                                                </tr>
                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                        <div class="text-end">
                                            <button type="button"
                                                class="btn btn-primary btn-sm">พิมพ์รายชื่อผู้เข้าร่วม</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 layout-spacing">
                    <!-- Card 2: Number of Applicants -->
                    <div class="card card-right">
                        <div class="card-body">
                            <div class="widget widget-one text-center">
                                <div class="widget-heading mb-4">
                                    <i class="fa-solid fa-users"></i>จำนวนผู้สมัครเข้าร่วม
                                </div>
                                <div class="widget-content">
                                    <div class="simple-counter-container d-flex justify-content-around">
                                        <div class="counter-container mx-2">
                                            <div class="counter-content border rounded shadow-sm p-3 mb-2 bg-body">
                                                <h1 class="s-counter">12</h1>
                                            </div>
                                            <p class="s-counter-text">สมัครแล้ว</p>
                                        </div>
                                        <div class="counter-container mx-2">
                                            <div class="counter-content border rounded shadow-sm p-3 mb-2 bg-body">
                                                <h1 class="s-counter">250</h1>
                                            </div>
                                            <p class="s-counter-text">จำนวนที่รับ</p>
                                        </div>
                                    </div>
                                    <br />
                                    <button type="button"
                                        class="btn btn-outline-info">เช็คลงให้ล๊อคอินก่อนลงชื่อใช้งาน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- Card 3: Summary of Application Data -->
                    <div class="card card-right">
                        <div class="card-body">
                            <div class="widget-heading mb-4" style="justify-content: space-around !important;">
                                <h5 class="">สรุปข้อมูลการสมัคร</h5>
                            </div>
                            <div class="widget-content">
                                <div class="row">
                                    <div class="col-9"><i class="tio caret_right"></i> สังคมศาสตร์และมนุษยศาสตร์</div>
                                    <div class="col-3 text-right">0</div>
                                    <div class="col-9"><i class="tio caret_right"></i> ส่วนกลาง(STAFF)</div>
                                    <div class="col-3 text-right">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var borderProfileTab = document.getElementById('border-profile-tab');
                var borderHomeTab = document.getElementById('border-home-tab');
                var imageContainer = document.getElementById('image-container');

                borderProfileTab.addEventListener('shown.bs.tab', function() {
                    imageContainer.style.display = 'none';
                });

                borderHomeTab.addEventListener('shown.bs.tab', function() {
                    imageContainer.style.display = 'block';
                });
            });
        </script>
    </body>
@endsection

</html>
