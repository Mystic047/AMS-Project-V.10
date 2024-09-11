<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h1>จัดการข้อมูลแอดมิน</h1>
            </div>
        </section>
    

        <div class="card mt-5">
            <div class="card-body">
                <!-- Search bar and Create button -->
                <div class="search-bar">
                    <form action="{{ route('admin.search') }}" method="GET" class="d-flex w-100 me-3">
                        <input type="text" name="query" class="form-control me-2" placeholder="Search..."
                            value="{{ request()->input('query') }}">
                        <button class="btn btn-outline-secondary" type="submit">ค้นห้า</button>
                    </form>
                    <a href="{{ route('admin.showCreate') }}" class="btn btn-primary ms-3">สร้าง</a>
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
                        @foreach ($admins as $admin)
                            <tr>
                                <td class="col-3">{{ $admin->userId }}</td>
                                <td class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . ($admin->profilePicture ?? 'profile_pictures/default/default.jpg')) }}"
                                            class="rounded-circle me-2" alt="Avatar"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>{{ $admin->firstName }} {{ $admin->lastName }}</div>
                                    </div>
                                </td>                                
                                <td class="col-3">{{ $admin->area->areaName }}</td>
                                <!-- Assuming faculty relation exists -->
                                <td class="col-2">
                                    <form action="{{ route('admin.edit', $admin->userId) }}" method="get"
                                        style="display: inline;">
                                        <button class="btn btn-warning btn-sm" type="submit">
                                            <i class="fas fa-pencil-alt"></i> แก้ไข
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.delete', $admin->userId) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                            <i class="fas fa-trash"></i> ลบ
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    </body>
@endsection

</html>
