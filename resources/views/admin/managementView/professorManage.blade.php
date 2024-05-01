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
            <h1>จัดการข้อมูลอาจารย์</h1>
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
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <a href="{{route('professor.showCreate')}}" class="btn btn-primary">Add New</a>
                </div>

                <!-- User table -->
                <table class="table table-bordered">
                    <thead class="table table-sm">
                        <tr>
                            <th scope="col" class="col-3">รหัส</th>
                            <th scope="col" class="col-4">ชื่อ</th>
                            <th scope="col" class="col-3">สาขา</th>
                            <th scope="col" class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeat this block for each user -->
                        <tr>
                            <td class="col-3">Admin</td>
                            <td class="col-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" class="rounded-circle me-2" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>John Doe ดึงรูปจากพาทที่เก็บ + ชื่อ</div>
                                </div>
                            </td>
                            <td>22/03/2022</td>
                            <td  class="col-3">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                  </button>
                                  <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                  </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-3">Admin</td>
                            <td class="col-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" class="rounded-circle me-2" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>John Doe ดึงรูปจากพาทที่เก็บ + ชื่อ</div>
                                </div>
                            </td>
                            <td>22/03/2022</td>
                            <td  class="col-3">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                  </button>
                                  <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                  </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-3">Admin</td>
                            <td class="col-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" class="rounded-circle me-2" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>John Doe ดึงรูปจากพาทที่เก็บ + ชื่อ</div>
                                </div>
                            </td>
                            <td>22/03/2022</td>
                            <td  class="col-3">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                  </button>
                                  <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                  </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-3">Admin</td>
                            <td class="col-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" class="rounded-circle me-2" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                                    <div>John Doe ดึงรูปจากพาทที่เก็บ + ชื่อ</div>
                                </div>
                            </td>
                            <td>22/03/2022</td>
                            <td  class="col-3">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                  </button>
                                  <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                  </button>
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
