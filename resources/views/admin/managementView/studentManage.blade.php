<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
    <style>
        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-image {
            width: 40px;
            /* Adjust as needed */
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>


</head>
@extends('admin.layouts.master')
@section('content')

    <body style="background-color:#f5f5f5;">
        <section class="section">
            <div class="section-header">
                <h1>จัดการข้อมูลนักศึกษา</h1>
            </div>
        </section>
        

        <div class="card mt-5">
            <div class="card-body">
                <!-- Search bar and Create button -->

                <div class="search-bar">
                    <form action="{{ route('student.search') }}" method="GET" class="d-flex w-100 me-3">
                        <input type="text" name="query" class="form-control me-2" placeholder="Search..."
                            value="{{ request()->input('query') }}">
                        <button class="btn btn-outline-secondary" type="submit">ค้นหา</button>
                    </form>
                    <a href="{{ route('student.showCreate') }}" class="btn btn-primary ms-3">สร้าง</a>
                </div>

                <!-- User table -->
                <table class="table table-bordered">
                    <thead class="table-sm">
                        <tr>
                            <th scope="col" class="col-3">รหัส</th>
                            <th scope="col" class="col-4">ชื่อ</th>
                            <th scope="col" class="col-3">สาขา</th>
                            <th scope="col" class="col-2">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="col-3">{{ $student->userId }}</td>
                                <td class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . ($student->profilePicture ?? 'profile_pictures/default/default.jpg')) }}"
                                            class="rounded-circle me-2" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>{{ $student->firstName }} {{ $student->lastName }}</div>
                                    </div>
                                </td>                         
                                <td class="col-3">{{ $student->area->areaName }}</td>
                                <td class="col-2">
                                    <!-- Edit button -->
                                    <form action="{{ route('student.edit', $student->userId) }}" method="get" style="display: inline;">
                                        <button class="btn btn-warning btn-sm" type="submit">
                                            <i class="fas fa-pencil-alt"></i> แก้ไข
                                        </button>
                                    </form>
                
                                    <!-- Delete button -->
                                    <form action="{{ route('student.delete', $student->userId) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                            <i class="fas fa-trash"></i> ลบ
                                        </button>
                                    </form>
                
                                    <!-- PDF button -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#pdfModal{{ $student->userId }}">
                                        <i class="fas fa-file-pdf"></i> PDF
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            <!-- Modal (move outside the loop to avoid issues with binding) -->
@foreach ($students as $student)
<div class="modal fade" id="pdfModal{{ $student->userId }}" tabindex="-1"
    aria-labelledby="pdfModalLabel{{ $student->userId }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel{{ $student->userId }}">เลือกช่วงวันที่</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.activity.history.pdf', $student->userId) }}" method="get" target="_blank">
                    <div class="mb-3">
                        <label for="start_date_{{ $student->userId }}" class="form-label">วันที่เริ่ม</label>
                        <input type="date" class="form-control" id="start_date_{{ $student->userId }}" name="start_date"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date_{{ $student->userId }}" class="form-label">วันที่สิ้นสุด</label>
                        <input type="date" class="form-control" id="end_date_{{ $student->userId }}" name="end_date"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ออก PDF</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
@endsection

</html>
