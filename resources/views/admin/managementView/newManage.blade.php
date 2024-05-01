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
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 0%;
        }
    </style>
</head>
@extends('admin.layouts.master')
@section('content')

    <body style="background-color:#f5f5f5;">
        <section class="section">
            <div class="section-header">
                <h1>จัดการข้อมูลข่าวสาร ประชาสัมพันธ์</h1>
            </div>
        </section>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <p>จัดการข้อมูลข่าวสาร ประชาสัมพันธ์</p>
                    <!-- Search bar and Create button -->
                    <div class="search-bar">
                        <div class="search-box">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <a href="{{ 'FacultyCreate' }}" class="btn btn-primary">Create</a>
                    </div>

                    <!-- User table -->
                    <table class="table table-bordered">
                        <thead class="table table-sm">
                            <tr>
                                <th class="col-3">รูปภาพ</th>
                                <th class="col-3">ชื่อเรื่อง</th>
                                <th class="col-4">เนื้อข่าว</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Repeat this block for each user -->
                            <tr>
                                <td>
                                    <img src="https://assets.goal.com/images/v3/blt9d6049d253efdce4/GOAL_-_Blank_WEB_-_Facebook_-_2024-04-07T170338.128.jpg?auto=webp&format=pjpg&width=3840&quality=60"
                                        alt="User Image" class="user-image" style="width: 150px; height: 150px;">
                                </td>
                                <td>ชื่อเรื่อง</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo eligendi repellendus accusantium vel ab? Voluptas commodi reiciendis, nisi dignissimos similique quibusdam quasi sunt necessitatibus eveniet cumque. A ipsa quae voluptas!</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">แก้ไข</button>
                                    <button class="btn btn-danger btn-sm">ลบ</button>
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
