<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<style>
    * {
        font-family: 'Noto Sans Thai', sans-serif;
    }
</style>

@extends('layout.master')
@section('content')

    <body style="background-color:#f5f5f5;">

        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 mx-auto">
                    <div class="card w-100 bg-white">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-plus-circle"></i> จัดการกิจกรรม</span>
                            </h5>
                            <div class="row mb-3">
                                <div class="col-auto">
                                    <a href="{{ route('activity.createFront') }}" class="btn btn-secondary">
                                        <i class="bi bi-plus-circle"></i> สร้างกิจกรรม
                                    </a>
                                    <a href="" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#reportModal">
                                        <i class="bi bi-plus-circle"></i> รายงานกิจกรรม
                                    </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">รหัส</th>
                                            <th scope="col">กิจกรรม</th>
                                            <th scope="col">รหัสเข้าร่วม</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $activity)
                                            <tr>
                                                <td>{{ $activity->actId }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div>{{ $activity->actName }}</div>
                                                    </div>
                                                </td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#participationCodeModal{{ $activity->actId }}">
                                                        ดูรหัส
                                                    </button>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="activityStatus{{ $activity->actId }}"
                                                            {{ $activity->isOpen ? 'checked' : '' }}
                                                            onclick="toggleStatus(this, '{{ $activity->actId }}')">
                                                        <label class="form-check-label"
                                                            for="activityStatus{{ $activity->actId }}">
                                                            {{ $activity->isOpen ? 'เปิด' : 'ปิด' }}
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="{{ route('activity.editFront', $activity->actId) }}"
                                                            method="get" class="me-1">
                                                            <button class="btn btn-warning btn-sm" type="submit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('activity.delete', $activity->actId) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" type="button"
                                                                onclick="confirmDelete(this)">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
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

        <!-- Report Modal -->
        <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reportModalLabel">เลือกวันที่สำหรับรายงาน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('activity.report.pdf') }}" method="GET" target="_blank">
                            @csrf
                            <div class="mb-3">
                                <label for="startDate" class="form-label">วันที่เริ่มต้น</label>
                                <input type="date" class="form-control" id="startDate" name="startDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label">วันที่สิ้นสุด</label>
                                <input type="date" class="form-control" id="endDate" name="endDate" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Enroll Modal --}}
        @foreach ($activities as $activity)
            <div class="modal fade" id="participationCodeModal{{ $activity->actId }}" tabindex="-1"
                aria-labelledby="participationCodeModalLabel{{ $activity->actId }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="participationCodeModalLabel{{ $activity->actId }}">
                                รหัสเข้าร่วมกิจกรรม
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            รหัสเข้าร่วมของกิจกรรมช่วงเช้า:
                            <br>{{ $activity->morningEnrollmentKey ?? 'ไม่มีรหัส' }}
                            <br><br>
                            <h5>QR Code สำหรับช่วงเช้า:</h5>
                            @php
                                $morningQrCodeUrl = route('activity.confirmSubmitQR', [
                                    'actId' => $activity->actId,
                                    'code' => $activity->morningEnrollmentKey,
                                    'session' => 'morning',
                                ]);
                            @endphp
                            {!! QrCode::size(200)->generate($morningQrCodeUrl) !!}
                            <br>
                            <a href="data:image/svg+xml;base64,{{ base64_encode(QrCode::format('svg')->size(200)->generate($morningQrCodeUrl)) }}"
                                download="morning_qrcode_{{ $activity->actId }}.svg" class="btn btn-primary mt-2">
                                ดาวน์โหลด QR Code สำหรับช่วงเช้า
                            </a>
                        </div>
                        <div class="modal-body">
                            รหัสเข้าร่วมของกิจกรรมช่วงบ่าย:
                            <br>{{ $activity->afternoonEnrollmentKey ?? 'ไม่มีรหัส' }}
                            <br><br>
                            <h5>QR Code สำหรับช่วงบ่าย:</h5>
                            @php
                                $afternoonQrCodeUrl = route('activity.confirmSubmitQR', [
                                    'actId' => $activity->actId,
                                    'code' => $activity->afternoonEnrollmentKey,
                                    'session' => 'afternoon',
                                ]);
                            @endphp
                            {!! QrCode::size(200)->generate($afternoonQrCodeUrl) !!}
                            <br>
                            <a href="data:image/svg+xml;base64,{{ base64_encode(QrCode::format('svg')->size(200)->generate($afternoonQrCodeUrl)) }}"
                                download="afternoon_qrcode_{{ $activity->actId }}.svg" class="btn btn-primary mt-2">
                                ดาวน์โหลด QR Code สำหรับช่วงบ่าย
                            </a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </body>
    <!-- Bootstrap JS Bundle with Popper -->
    <script>
        function toggleStatus(checkbox, activityId) {
            fetch(`/activity/toggle/${activityId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        isOpen: checkbox.checked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const label = checkbox.nextElementSibling;
                        if (checkbox.checked) {
                            label.textContent = 'เปิด';
                            checkbox.classList.add('switch-open');
                            checkbox.classList.remove('switch-closed');
                        } else {
                            label.textContent = 'ปิด';
                            checkbox.classList.add('switch-closed');
                            checkbox.classList.remove('switch-open');
                        }
                    } else {
                        alert('Error toggling status');
                    }
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkbox.classList.add('switch-open');
                } else {
                    checkbox.classList.add('switch-closed');
                }
            });
        });
    </script>

    <style>
        .form-check-input.switch-open {
            background-color: #198754 !important;
            border-color: #0a0a0a !important;
        }

        .form-check-input.switch-closed {
            background-color: #dc3545 !important;
            border-color: #0a0a0a !important;
        }
    </style>
@endsection

</html>
