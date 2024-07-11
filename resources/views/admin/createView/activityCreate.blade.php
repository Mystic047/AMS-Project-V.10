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
                        <label for="actId" class="form-label">รหัสกิจกรรม</label>
                        <input type="text" name="actId" class="form-control" id="actId">
                    </div>
                    <div class="col-md-6">
                        <label for="actName" class="form-label">ชื่อกิจกรรม</label>
                        <input type="text" name="actName" class="form-control" id="actName">
                    </div>
                    <div class="col-md-6">
                        <label for="actLocation" class="form-label">สถานที่</label>
                        <input type="text" name="actLocation" class="form-control" id="actLocation">
                    </div>
                    <div class="col-md-6">
                        <label for="actType" class="form-label">ประเภทกิจกรรม</label>
                        <input type="text" name="actType" class="form-control" id="actType">
                    </div>
                    <div class="col-md-6">
                        <label for="actDate" class="form-label">วันที่จัด</label>
                        <input type="date" name="actDate" class="form-control" id="actDate">
                    </div>
                    <div class="col-md-6">
                        <label for="actResBranch" class="form-label">สาขาที่รับผิดชอบ</label>
                        <input type="text" name="actResBranch" class="form-control" id="actResBranch">
                    </div>
                    <div class="col-md-6">
                        <label for="actHour" class="form-label">ชั่วโมงที่ได้รับ</label>
                        <input type="text" name="actHour" class="form-control" id="actHour">
                    </div>
                    <div class="col-md-6">
                        <label for="actRegisLimit" class="form-label">จำนวนที่รับ</label>
                        <input type="text" name="actRegisLimit" class="form-control" id="actRegisLimit">
                    </div>
                    <div class="col-md-12">
                        <label for="actDetails" class="form-label">รายละเอียดกิจกรรม</label>
                        <textarea name="actDetails" class="form-control" id="actDetails"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="assessmentLink" class="form-label">ลิงค์ประเมินกิจกรรม</label>
                        <input type="text" name="assessmentLink" class="form-control" id="assessmentLink">
                    </div>
                    <div class="col-md-6">
                        <label for="picture" class="form-label">รูปภาพ</label>
                        <input type="file" id="picture" name="picture" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="responsiblePerson" class="form-label">ผู้รับผิดชอบ</label>
                        <input type="text" name="responsiblePerson" class="form-control" id="responsiblePerson">
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
