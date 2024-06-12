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
          <h1>เพิ่มข้อมูลกิจกรรม</h1>
        </div>
    </section>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3">
                     {{-- <div class="col-12">
                        <label for="inputAddress" class="form-label">ID</label>
                        <input type="text" name='students_id'class="form-control" id="inputAddress" placeholder="ถ้า Auto ก็เอาออก">
                    </div>  --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">รหัสกิจกรรม</label>
                        <input type="email" name='email' class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">ชื่อกิจกรรม</label>
                        <input type="password" name='password' class="form-control" id="password">
                    </div>
                    {{-- <div class="col-md-5">
                        <label for="password" class="form-label">ชื่อกิจกรรม</label>
                        <input type="password" name='password' class="form-control" id="password">
                    </div> --}}
                    <div class="col-md-5">
                        <label for="text" class="form-label">สถานที่</label>
                        <input type="text" name='firstname' class="form-control" id="firstname">
                    </div>
                    <div class="col-md-5">
                        <label for="text" class="form-label">สาขาที่รับผิดชอบ</label>
                        <input type="text" name='lastname' class="form-control" id="lastname">
                    </div>
                    <div class="col-md-2">
                        <label for="text" class="form-label">จำนวนที่รับ</label>
                        <input type="text" name='nickname' class="form-control" id="nickname">
                    </div>
                    <div class="col-5">
                        <label for="text" class="form-label">วันที่จัด</label>
                        <input type="text" name='faculty_id' class="form-control" id="faculty_id" placeholder="">
                    </div>
                    <div class="col-5">
                        <label for="text" class="form-label">อาจารย์ที่รับผิดชอบ</label>
                        <input type="text" name='faculty_id' class="form-control" id="faculty_id" placeholder="">
                    </div>
                    <div class="col-2">
                        <label for="text" class="form-label">ชั่วโมงที่ได้รับ</label>
                        <input type="text" name='faculty_id' class="form-control" id="faculty_id" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="text" class="form-label">ลิงค์ประเมินกิจกรรม</label>
                        <input type="text" name='area_id' class="form-control" id="area_id">
                    </div>

                    <div class="col-md-6">
                        <label for="profile_picture">รูปภาพ:</label><br>
                        <input type="file" id="profile_picture" name="profile_picture"><br><br>
                    </div>

                    {{-- <div class="col-md-6">
                        <label for="inputState" class="form-label">ถ้าไม่มีรูปก็เอาออก</label>
                        <div>
                            <input class="form-control " id="formFileLg" type="file" >
                        </div> --}}
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">Create</button>
                    </div>
                    <br>
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
