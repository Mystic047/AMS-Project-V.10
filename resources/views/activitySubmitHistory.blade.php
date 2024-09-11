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
        * {
            font-family: 'Noto Sans Thai', sans-serif;
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

    .btn-report:hover {
        background-color: #281987;
        color: white;
    }

    .btn-report i {
        font-size: 18px;
    }
    </style>
</head>
@extends('layout.master')
@section('content')

    <body style="background-color:#f5f5f5;">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card w-100 bg-white">
                    <div class="card-body">
                        <br>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">
                                <i class="bi bi-plus-circle"></i> ประวัติการเข้าร่วมกิจกรรม
                            </h5>
                            <a href="#" class="btn btn-warning btn-icon btn-report" title="รายงานประวิตการเข้าร่วม"
                                data-bs-toggle="modal" data-bs-target="#reportModal">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-4">
                                <colgroup>
                                    <col style="width: 10%;">
                                    <col style="width: 30%;">
                                    <col style="width: 10%;">
                                    <col style="width: 20%;">
                                    <col style="width: 20%;">
                                    <col style="width: 30%;">
                                </colgroup>
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">สถานะ</th>
                                        <th class="text-center">ชื่อกิจกรรม</th>
                                        <th class="text-center">ชั่วโมงกิจกรรม</th>
                                        <th class="text-center">ดูข้อมูลเพิ่มเติม</th>
                                        <th class="text-center">ยกเลิกลงทะเบียน</th>
                                        <th class="text-center">รับใบประกาศ</th>
                                        <!-- New column for the certificate button -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $submit)
                                        <tr>
                                            <td class="text-center">
                                                {{ $submit->status ?? 'ไม่มีข้อมูล' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $submit->activity->actName ?? 'ไม่มีข้อมูล' }}<br>
                                                จัดโดย {{ $submit->activity->responsiblePerson ?? 'ไม่มีข้อมูล' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $submit->activity->actHour ?? 'ไม่มีข้อมูล' }} ชั่วโมง
                                            </td>
                                            <td class="text-center">
                                                @if ($submit->status !== 'เข้าร่วมกิจกรรมแล้ว')
                                                    <button class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#enterCodeModal"
                                                        data-id="{{ $submit->actSubmitId }}">ใส่รหัส</button>
                                                @endif

                                                @if ($submit->status === 'เข้าร่วมกิจกรรมแล้ว')
                                                    <a href="{{ $submit->activity->assessmentLink }}" class=""
                                                        target="_blank">
                                                        ประเมิณกิจกรรม
                                                    </a>
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                @if ($submit->status === 'เข้าร่วมกิจกรรมแล้ว')
                                                    <span class="text-muted">ไม่สามารถยกเลิกการสมัครได้</span>
                                                @else
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#confirmDeleteModal"
                                                        data-id="{{ $submit->actSubmitId }}">
                                                        ยกเลิกการสมัคร
                                                    </button>
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                @if ($submit->status === 'เข้าร่วมกิจกรรมแล้ว')
                                                    <a href="{{ route('certificate', ['id' => $submit->actSubmitId]) }}"
                                                        class="btn btn-success" target="_blank">
                                                        รับใบประกาศ
                                                    </a>
                                                @else
                                                    <span class="text-muted">ยังไม่สามารถรับใบประกาศได้</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($history->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">ไม่มีข้อมูลการเข้าร่วมกิจกรรม</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">ยืนยันการยกเลิก</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        แน่ใจใช่หรือไม่ที่จะทำการยกเลิกการลงทะเบียนกิจกรรม?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <form id="deleteForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ยืนยัน</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="enterCodeModal" tabindex="-1" aria-labelledby="enterCodeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="enterCodeModalLabel">กรุณาใส่รหัสยืนยันการเข้าร่วม</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="confirmForm" method="POST" action="{{ route('activity.confirmSubmit') }}">
                            @csrf
                            <input type="hidden" name="actSubmitId" id="actSubmitId">

                            <div class="mb-3">
                                <label for="codeInput" class="form-label">รหัส:</label>
                                <input type="text" class="form-control" id="codeInput" name="code" required>
                            </div>

                            <div class="mb-3">
                                <label for="sessionSelect" class="form-label">เลือกช่วงเวลา:</label>
                                <select class="form-select" id="sessionSelect" name="session" required>
                                    <option value="morning">เช้า</option>
                                    <option value="afternoon">บ่าย</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reportModalLabel">เลือกวันที่สำหรับรายงาน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('activity.history.pdf') }}" method="GET" target="_blank">
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

    </body>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var confirmDeleteModal = document.getElementById('confirmDeleteModal');
            confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var actSubmitId = button.getAttribute('data-id');
                var form = confirmDeleteModal.querySelector('#deleteForm');
                form.action = '/submit-cancel/' + actSubmitId;
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var enterCodeModal = document.getElementById('enterCodeModal');
            enterCodeModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var actSubmitId = button.getAttribute('data-id');
                var form = enterCodeModal.querySelector('#confirmForm');
                form.querySelector('#actSubmitId').value = actSubmitId;
            });
        });
    </script>
@endsection

</html>
