<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
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
            <h1>จัดการข้อมูลคณะและสาขา</h1>
        </div>
    </section>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <p>จัดการข้อมูลคณะ</p>
                <!-- Search bar and Create button -->
                <div class="search-bar">
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="ค้นหา...">
                    </div>
                    <a href="{{ route('faculty.showCreate') }}" class="btn btn-primary">สร้าง</a>
                </div>

                <table class="table table-bordered">
                    <thead class="table table-sm">
                        <tr>
                            <th scope="col">รหัสคณะ</th>
                            <th scope="col">ชื่อคณะ</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facultys as $faculty)
                            <tr>
                                <td>{{ $faculty->facultyId }}</td>
                                <td>{{ $faculty->facultyName }}</td>
                                <td class="col-2">
                                    <div class="d-flex">
                                        <form action="{{ route('faculty.edit', $faculty->facultyId) }}" method="get" class="me-2">
                                            <button class="btn btn-warning btn-sm" type="submit">
                                                <i class="fas fa-pencil-alt"></i> แก้ไข
                                            </button>
                                        </form>
                                        <form action="{{ route('faculty.delete', $faculty->facultyId) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                                <i class="fas fa-trash"></i> ลบ
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
        <div class="card mt-5">
            <div class="card-body">
                <!-- Search bar and Create button -->
                <p>จัดการข้อมูลสาขา</p>
                <div class="search-bar">
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <a href="{{ route('area.showCreate') }}" class="btn btn-primary">สร้าง</a>
                </div>

                <!-- User table -->
                <table class="table table-bordered">
                    <thead class="table table-sm">
                        <tr>
                            <th scope="col">รหัสสาขา</th>
                            <th scope="col">ชื่อสาขา</th>
                            <th scope="col">รหัสคณะ</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr>
                                <td>{{ $area->areaId }}</td>
                                <td>{{ $area->areaName }}</td>
                                <td>{{ $area->facultyId }}</td>
                                <td class="col-2">
                                    <div class="d-flex">
                                        <form action="{{ route('area.edit', $area->areaId) }}" method="get" class="me-2">
                                            <button class="btn btn-warning btn-sm" type="submit">
                                                <i class="fas fa-pencil-alt"></i> แก้ไข
                                            </button>
                                        </form>
                                        <form action="{{ route('area.delete', $area->areaId) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                                <i class="fas fa-trash"></i> ลบ
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

@endsection

</html>
