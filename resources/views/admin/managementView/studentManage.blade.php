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
            <h1>จัดการข้อมูลนักศึกษา</h1>
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
                    <a href="{{ route('student.showCreate') }}" class="btn btn-primary">Add New</a>
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
                      @foreach ($students as $student)
                      <tr>
                          <td class="col-3">{{ $student->students_id }}</td>
                          <td class="col-4">
                              <div class="d-flex align-items-center">
                                   <img src="{{ asset('storage/'.$student->profile_picture) }}" class="rounded-circle me-2" alt="Avatar" style="width: 40px; height: 40px; object-fit: cover;">
                                  <div>{{ $student->firstname }} {{ $student->lastname }}</div> 
                              </div>
                          </td>
                          <td class="col-3">{{ $student->faculty_id }}</td> <!-- Assuming faculty relation exists -->
                          <td class="col-2">
                            {{-- <button class="btn btn-warning btn-sm" onclick="window.location.href = '{{ route('student.edit', $student->id) }}'"> --}}
                              <button class="btn btn-warning btn-sm" onclick="window.location.href = ''">
                                  <i class="fas fa-pencil-alt"></i> Edit
                              </button>
                              {{-- <form action="{{ route('student.destroy', $student->id) }}" method="post" style="display: inline;"> --}}
                              <form action="" method="post" style="display: inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm" type="submit">
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
</body>
@endsection
</html>
