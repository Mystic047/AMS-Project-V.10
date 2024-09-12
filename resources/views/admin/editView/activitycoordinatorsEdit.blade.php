<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
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
                <h1>แก้ไขข้อมูลฝ่ายกิจกรรม</h1>
            </div>
        </section>
        <div class="container">
            <div class="card my-5">
                <div class="card-body">
                    <form class="row g-3" action="{{ route('coordinator.update', $coordinators->userId) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="userId" class="form-label">รหัส</label>
                            <input type="text" class="form-control" id="userId" name="userId" placeholder="ถ้า Auto ก็เอาออก" value="{{ $coordinators->userId }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $coordinators->email }}">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                        </div>
                        <div class="col-md-5">
                            <label for="firstName" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $coordinators->firstName }}">
                        </div>
                        <div class="col-md-5">
                            <label for="lastName" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $coordinators->lastName }}">
                        </div>
                        <div class="col-md-2">
                            <label for="nickName" class="form-label">ชื่อเล่น</label>
                            <input type="text" class="form-control" id="nickName" name="nickName" value="{{ $coordinators->nickName }}">
                        </div>
                        <div class="col-md-6">
                            <label for="areaId" class="form-label">รหัสสาขา</label>
                            <input type="text" class="form-control" id="areaId" name="areaId" value="{{ $coordinators->areaId }}">
                        </div>
                        <div class="col-md-6">
                            <label for="profilePicture" class="form-label">รูปโปรไฟล์</label><br>
                            <input type="file"  class="form-control" name="profilePicture" id="profilePicture">
                        </div>
                        <div class="col-12">
                            <button onclick="confirmUpdate(this)" type="button" class="btn btn-primary mx-1 float-end">บันทึก</button>
                            <a href="{{ route('coordinator.manage') }}" class="btn btn-danger mx-1 float-end">ยกเลิก</a>
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
