<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
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
    .card-square {
        width: 300px;
        height: 300px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .widget {
        padding: 20px;
    }

    .widget-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .counters {
        margin-top: 20px;
    }

    .counter {
        width: 120px;
        height: 120px;
        border-radius: 10px;
        background-color: #f7f7f7;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .counter-number {
        font-size: 36px;
        font-weight: bold;
    }

    .counter-text {
        font-size: 18px;
        font-weight: bold;
    }

    .bg-register-limit {
        background-color: #EE4E4E;
        color: #fff;
    }

    .bg-submitted {
        background-color: #A1DD70;
        color: #fff;
    }

    .widget-heading {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .widget-content {
        padding: 20px;
    }

    .row {
        margin-top: 20px;
    }

    .col-9 {
        font-size: 18px;
        font-weight: bold;
    }

    .col-3 {
        font-size: 18px;
        font-weight: bold;
        text-align: right;
    }

    .spacer {
        width: 20px;
    }
    .btn-icon {
        width: 45px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        font-size: 20px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-icon i {
        font-size: 20px;
    }

    .btn-report:hover {
        background-color: #161a08;
        color: white;
    }
</style>
@extends('layout.master')
@section('content')

    <body style="background-color:#f5f5f5;">
        <br>
        <div class="container">
            <div class="row layout-top-spacing layout-spacing">
                <div class="col-lg-9 col-md-12 layout-spacing">
                    <div class="card card-left">
                        <div class="card-body">
                            <div class="widget-heading mb-4">
                                <h3 class="">{{ $activity->actName }} <span class="badge badge-warning">95 View</span>
                                </h3>
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
                                                <span class="text-primary">{{ $activity->actName }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">สังกัด</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->actResBranch }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-3">จำนวนที่รับสมัคร</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->actRegisLimit }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">ค่าชั่วโมง</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->actHour }}
                                                    ชั่วโมง</span>
                                            </div>
                                            <div class="col-12 col-md-3">เปิดรับสมัคร</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span
                                                    class="text-primary">{{ \Carbon\Carbon::parse($activity->actDate)->format('d F Y') }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">สถานะ</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="badge {{ $activity->registration_status == 'open' ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $activity->registration_status == 'open' ? 'เปิดรับสมัคร' : 'ปิดรับสมัคร' }}
                                                </span>
                                            </div>
                                            
                                            
                                        </div>
                                        <h4 class="mb-4 mt-4"><i class="fas fa-calendar-alt"></i> กำหนดการจัดกิจกรรม</h4>
                                        <div class="row">
                                            <div class="col-12 col-md-3">วันที่จัดกิจกรรม</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span
                                                    class="text-primary">{{ \Carbon\Carbon::parse($activity->actDate)->format('d F Y') }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">สถานที่</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->actLocation }}</span>
                                            </div>
                                            <div class="col-12 col-md-3">ผู้รับผิดชอบ</div>
                                            <div class="col-12 col-md-9">
                                                <i class="fa-solid fa-play"></i>
                                                <span class="text-primary">{{ $activity->responsiblePerson }}</span>
                                            </div>
                                        </div>
                                        @if ($activity->picture)
                                            <div id="image-container" class="mt-4 mb-4">
                                                <img style="border-radius: 20px;"
                                                    src="{{ asset('storage/' . $activity->picture) }}" width="100%">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="border-profile" role="tabpanel" aria-labelledby="border-profile-tab">
                                        <h4 class="mb-4"><i class="fas fa-user"></i> รายชื่อผู้สมัคร</h4>
                                        <!-- แถบค้นหาและปุ่มรายงาน -->
                                        <div class="d-flex mb-3">
                                            <!-- แถบค้นหา -->
                                            <input type="text" class="form-control me-2" placeholder="ค้นหา..." aria-label="ค้นหา">
                                            <!-- ปุ่มรายงาน -->
                                            <a href="{{ route('activity.pdf', ['id' => $activity->actId]) }}" class="btn btn-warning btn-icon btn-report" target="_blank" title="รายงานกิจกรรม">
                                                <i class="fas fa-file-alt"></i> 
                                            </a>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>รหัส</th>
                                                    <th>ชื่อ</th>
                                                    <th>นามสกุล</th>
                                                    <th>สาขา</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($activitiesSubmits as $submit)
                                                    <tr>
                                                        <td>{{ $submit->student->userId }}</td>
                                                        <td>{{ $submit->student->firstName }}</td>
                                                        <td>{{ $submit->student->lastName }}</td>
                                                        <td>{{ $submit->student->area->areaName }}</td>
                                                        <td>{{ $submit->status }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <!-- Card 1: Number of Applicants -->
                    <div class="card bg-white rounded-lg overflow-hidden">
                        <div class="card-body text-center">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">
                                <i class="fa-solid fa-users mr-2"></i> จำนวนผู้สมัคร
                            </h3>
                            <div class="d-flex justify-content-between align-items-stretch mb-4">
                                <div class="bg-light border border-danger p-4 rounded w-100 mx-1 d-flex flex-column justify-content-center">
                                    <h2 class="text-danger font-weight-bold">{{ $activity->actRegisLimit }}</h2>
                                    <p class="text-muted">จำนวนที่รับสมัคร</p>
                                </div>
                                <div class="bg-light border border-success p-4 rounded w-100 mx-1 d-flex flex-column justify-content-center">
                                    <h2 class="text-success font-weight-bold">{{ $activitiesSubmits->count() }}</h2>
                                    <p class="text-muted">สมัครแล้ว</p>
                                </div>
                            </div>
                    
                        @php
                            $user = getAuthenticatedUser(); // Check the authenticated user with multiple guards
                        @endphp
                        
                        @if ($user)
                        @if ($user->role == 'student')
                            <!-- Show the form if the user is a student -->
                            <form method="post" action="{{ route('activity.submit') }}" class="mt-4">
                                @csrf
                                <input type="hidden" name="userId" value="{{ $user->userId }}">
                                <input type="hidden" name="actId" value="{{ $activity->actId }}">
                                <button type="button" 
                                        onclick="confirmSubmit(this)" 
                                        class="btn btn-warning font-weight-bold" 
                                        {{ $activity->registration_status != 'open' ? 'disabled' : '' }}>
                                    {{ $activity->registration_status == 'open' ? 'ลงชื่อเข้าร่วมกิจกรรม' : 'กิจกรรมปิดรับสมัคร' }}
                                </button>
                            </form>
                        @else
                            <!-- Show message for non-student roles -->
                            <div class="alert alert-danger mt-4">
                                ลงชื่อเข้าร่วมได้เฉพาะนักศึกษาเท่านั้น
                            </div>
                        @endif
                    @else
                        <!-- Display a message or alternative content for unauthenticated users -->
                        <div class="alert alert-danger mt-4">
                            กรุณาเข้าสู่ระบบเพื่อทำการลงชื่อเข้าร่วมกิจกรรม
                        </div>
                    @endif
                    
                        
                        </div>
                    </div>
                    

                    <br>

                    <!-- Card 2: Summary of Application Data -->
                    <div class="card bg-white rounded-lg overflow-hidden">
                        <div class="card-body">
                            <h5 class="text-xl font-bold text-gray-800 mb-4">สรุปผลการสมัคร</h5>
                            <div class="space-y-2">
                                @foreach ($activitiesSubmits->groupBy('student.area.areaName') as $areaName => $submissions)
                                    <div class="d-flex justify-content-between align-items-center text-muted">
                                        <span><i class="fas fa-map-marker-alt text-secondary mr-1"></i> {{ $areaName }}</span>
                                        <span class="font-weight-bold">
                                            จำนวน: <span class="text-danger">{{ $submissions->count() }}</span> คน
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            function confirmSubmit(button) {
                Swal.fire({
                    title: 'ลงชื่อเข้าร่วมกิจกรรม?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ใช่',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('form').submit();
                    }
                });
            }
        </script>


    </body>
@endsection

</html>
