<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New</title>
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
            <h1>เพิ่มข้อมูลข่าวสาร ประชาสัมพันธ์</h1>
        </div>
    </section>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{route('area.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label for="area_id" class="form-label">ชื่อหัวข้อข่าว</label>
                        <input type="text" class="form-control" id="area_id" name="area_id" placeholder="">
                    </div>
                    <div class="col-12">
                        <label for="areaName" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" id="areaName" name="areaName" rows="5"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="faculty_id" class="form-label">รูปภาพ</label>
                        <input type="file" class="form-control" id="faculty_id" name="faculty_id">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">Create</button>
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
