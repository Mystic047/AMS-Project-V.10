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
          <h1>แก้ไขข้อมูลคณะ</h1>
        </div>
    </section>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('faculty.update', $facultys->facultyId) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">รหัสคณะ</label>
                        <input type="text" class="form-control" id="facultyId" name="facultyId" placeholder="" value="{{$facultys->facultyId}}">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">ชื่อคณะ</label>
                        <input type="text" class="form-control" id="facultyName" name="facultyName" placeholder="" value="{{$facultys->facultyName}}">
                    </div>
                    <div class="col-12">
                        <button onclick="confirmUpdate(this)" type="button" class="btn btn-primary mx-1 float-end">บันทึก</button>
                        <a href="{{ route('faculty.manage') }}" class="btn btn-danger mx-1 float-end">ยกเลิก</a>
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
