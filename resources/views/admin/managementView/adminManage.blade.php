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
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            10
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Test</h4>
                        </div>
                        <div class="card-body">
                            1,201
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Test</h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Test</h4>
                        </div>
                        <div class="card-body">
                            42
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <!-- Search bar and Create button -->
                <div class="search-bar">
                    <form action="{{ route('admin.search') }}" method="GET" class="d-flex w-100 me-3">
                        <input type="text" name="query" class="form-control me-2" placeholder="Search..." value="{{ request()->input('query') }}">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </form>
                    <a href="{{ route('admin.showCreate') }}" class="btn btn-primary ms-3">Create</a>
                </div>
                <!-- User table -->
                <table class="table table-bordered">
                    <thead class="table-sm">
                        <tr>
                            <th scope="col" class="col-3">รหัส</th>
                            <th scope="col" class="col-4">ชื่อ</th>
                            <th scope="col" class="col-3">สาขา</th>
                            <th scope="col" class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td class="col-3">{{ $admin->userId }}</td>
                                <td class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $admin->profilePicture) }}"
                                            class="rounded-circle me-2" alt="Avatar"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>{{ $admin->firstName }} {{ $admin->lastName }}</div>
                                    </div>
                                </td>
                                <td class="col-3">{{ $admin->facultyId }}</td> <!-- Assuming faculty relation exists -->
                                <td class="col-2">
                                    <form action="{{ route('admin.edit', $admin->userId) }}" method="get"
                                        style="display: inline;">
                                        <button class="btn btn-warning btn-sm" type="submit">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.delete', $admin->userId) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(button) {
                Swal.fire({
                    title: 'ต้องการลบข้อมูลนี้?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
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
