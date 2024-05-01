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
            width: 40px; /* Adjust as needed */
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
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <a href="{{ ('FacultyCreate') }}" class="btn btn-primary">Create</a>
                </div>

                <!-- User table -->
                <table class="table table-bordered">
                    <thead class="table table-sm">
                        <tr>
                            <th scope="col">faculty_id</th>
                            <th scope="col">faculty_name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeat this block for each user -->
                        <tr>
                            <td>Admin</td>
                            <td>Admin</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <!-- End user block -->
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
                    <a href="{{ ('AreaCreate') }}" class="btn btn-primary">Create</a>
                </div>

                <!-- User table -->
                <table class="table table-bordered">
                    <thead class="table table-sm">
                        <tr>
                            <th scope="col">area_id</th>
                            <th scope="col">area_name</th>
                            <th scope="col">faculty_id</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeat this block for each user -->
                        <tr>
                            <td>Admin</td>
                            <td>Admin</td>
                            <td>Admin</td>
                            <td>
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <!-- End user block -->
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
