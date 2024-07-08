<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Activity</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

@extends('layout.master')
@section('content')

<body>

    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('activity.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="activity_id" class="form-label"><i class="fas fa-id-badge"></i> รหัสกิจกรรม</label>
                        <input type="text" name="activity_id" class="form-control" id="activity_id">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_name" class="form-label"><i class="fas fa-signature"></i> ชื่อกิจกรรม</label>
                        <input type="text" name="activity_name" class="form-control" id="activity_name">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_location" class="form-label"><i class="fas fa-map-marker-alt"></i> สถานที่</label>
                        <input type="text" name="activity_location" class="form-control" id="activity_location">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_type" class="form-label"><i class="fas fa-list-alt"></i> ประเภทกิจกรรม</label>
                        <input type="text" name="activity_type" class="form-control" id="activity_type">
                    </div>

                    <div class="col-md-6">
                        <label for="activity_date" class="form-label"><i class="fas fa-calendar-alt"></i> วันที่จัด</label>
                        <input type="date" name="activity_date" class="form-control" id="activity_date">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_responsible_branch" class="form-label"><i class="fas fa-building"></i> สาขาที่รับผิดชอบ</label>
                        <input type="text" name="activity_responsible_branch" class="form-control" id="activity_responsible_branch">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_hour_earned" class="form-label"><i class="fas fa-hourglass-half"></i> ชั่วโมงที่ได้รับ</label>
                        <input type="text" name="activity_hour_earned" class="form-control" id="activity_hour_earned">
                    </div>
                    <div class="col-md-6">
                        <label for="activity_register_limit" class="form-label"><i class="fas fa-users"></i> จำนวนที่รับ</label>
                        <input type="text" name="activity_register_limit" class="form-control" id="activity_register_limit">
                    </div>
                    <div class="col-md-12">
                        <label for="activity_detail" class="form-label"><i class="fas fa-info-circle"></i> รายละเอียดกิจกรรม</label>
                        <textarea name="activity_detail" class="form-control" id="activity_detail"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="assessment_link" class="form-label"><i class="fas fa-link"></i> ลิงค์ประเมินกิจกรรม</label>
                        <input type="text" name="assessment_link" class="form-control" id="assessment_link">
                    </div>
                    <div class="col-md-6">
                        <label for="picture" class="form-label"><i class="fas fa-image"></i> รูปภาพ</label>
                        <input type="file" id="picture" name="picture" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="responsible_person" class="form-label"><i class="fas fa-user"></i> ผู้รับผิดชอบ</label>
                        <input type="text" name="responsible_person" class="form-control" id="responsible_person">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success mx-1 float-end">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger mx-1 float-end">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
@endsection
</html>
