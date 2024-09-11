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
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form class="row g-3" action="{{ route('file.update', $files->fileId) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="fileName" class="form-label">ชื่อไฟล์</label>
                            <input type="text" class="form-control" id="fileName" name="fileName"
                                value="{{ $files->fileName }}" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="file_path" class="form-label">อัปโหลดไฟล์</label>
                            <input type="file" class="form-control" id="filePath" name="filePath">
                        </div>
                        <div class="col-12">
                            <button onclick="confirmUpdate(this)" type="button" class="btn btn-success mx-1 float-end">บันทึก</button>
                            <a href="{{ route('file.manage') }}" class="btn btn-danger mx-1 float-end">ยกเลิก</a>
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
