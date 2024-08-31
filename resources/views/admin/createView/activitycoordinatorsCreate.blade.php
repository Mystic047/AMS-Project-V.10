<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Table</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@extends('admin.layouts.master')
@section('content')
    <body style="background-color:#f5f5f5;">
    <section class="section">
        <div class="section-header">
          <h1>เพิ่มข้อมูลฝ่ายกิจกรรม</h1>
        </div>
    </section>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('coordinator.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="col-md-5">
                        <label for="firstName" class="form-label">ชื่อ</label>
                        <input type="text" name="firstName" class="form-control" id="firstName">
                    </div>
                    <div class="col-md-5">
                        <label for="lastName" class="form-label">นามสกุล</label>
                        <input type="text" name="lastName" class="form-control" id="lastName">
                    </div>
                    <div class="col-md-2">
                        <label for="nickName" class="form-label">ชื่อเล่น</label>
                        <input type="text" name="nickName" class="form-control" id="nickName">
                    </div>
                    <div class="col-md-6">
                        <label for="areaId" class="form-label">สาขาที่สังกัด</label>
                        <select class="form-control" id="areaId" name="areaId">
                            <option value="">เลือกสาขาที่สังกัด</option>
                            @foreach($area as $areas)
                                <option value="{{ $areas->areaId }}">{{ $areas->areaName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="profilePicture" class="form-label">รูปโปรไฟล์</label>
                        <input type="file" id="profilePicture" name="profilePicture" class="form-control">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">สร้าง</button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and its dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
@endsection
</html>
