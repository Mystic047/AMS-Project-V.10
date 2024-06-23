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
                <form class="row g-3" action="{{ route('activity.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="activity_id" class="form-label">รหัสกิจกรรม</label>
                        <input type="text" name="activity_id" class="form-control" id="activity_id">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_name" class="form-label">ชื่อกิจกรรม</label>
                        <input type="text" name="activity_name" class="form-control" id="activity_name">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_type" class="form-label">ประเภทกิจกรรม</label>
                        <input type="text" name="activity_type" class="form-control" id="activity_type">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_date" class="form-label">วันที่จัด</label>
                        <input type="date" name="activity_date" class="form-control" id="activity_date">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_responsible_branch" class="form-label">สาขาที่รับผิดชอบ</label>
                        <input type="text" name="activity_responsible_branch" class="form-control" id="activity_responsible_branch">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_hour_earned" class="form-label">ชั่วโมงที่ได้รับ</label>
                        <input type="text" name="activity_hour_earned" class="form-control" id="activity_hour_earned">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_register_limit" class="form-label">จำนวนที่รับ</label>
                        <input type="text" name="activity_register_limit" class="form-control" id="activity_register_limit">
                    </div>
                    <div class="col-md-12">
                        <label for="activity_detail" class="form-label">รายละเอียดกิจกรรม</label>
                        <textarea name="activity_detail" class="form-control" id="activity_detail"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="assessment_link" class="form-label">ลิงค์ประเมินกิจกรรม</label>
                        <input type="text" name="assessment_link" class="form-control" id="assessment_link">
                    </div>
                    <div class="col-md-6">
                        <label for="picture" class="form-label">รูปภาพ</label>
                        <input type="file" id="picture" name="picture" class="form-control">
                    </div>
                    <div class="col-md-6"> 
                        <label for="responsible_person" class="form-label">ผู้รับผิดชอบ</label>
                        <input type="text" name="responsible_person" class="form-control" id="responsible_person">
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
