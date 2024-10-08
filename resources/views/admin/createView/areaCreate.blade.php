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
            <h1>เพิ่มข้อมูลสาขา</h1>
        </div>
    </section>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('area.create') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="areaId" class="form-label">รหัส สาขา</label>
                        <input type="text" class="form-control" id="areaId" name="areaId" placeholder="">
                    </div>
                    <div class="col-12">
                        <label for="areaName" class="form-label">ชื่อสาขา</label>
                        <input type="text" class="form-control" id="areaName" name="areaName" placeholder="">
                    </div>
                    <div class="col-12">
                        <label for="selectFaculty" class="form-label">คณะ</label>
                        <select class="form-control" id="selectFaculty" name="facultyId">
                            <option value="">เลือก คณะที่สังกัด</option>
                            @foreach($facultys as $faculty)
                                <option value="{{ $faculty->facultyId }}">{{ $faculty->facultyName }}</option>
                            @endforeach
                        </select>
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
