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
          <h1>เพิ่มข้อมูลกิจกรรม</h1>
        </div>
    </section>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('activity.update', $activities->actId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="actId" class="form-label">รหัสกิจกรรม</label>
                        <input type="text" class="form-control" id="actId" name="actId" value="{{ $activities->actId }}" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="actLocation" class="form-label">สถานที่</label>
                        <input type="text" class="form-control" id="actLocation" name="actLocation" value="{{ $activities->actLocation }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="actName" class="form-label">ชื่อกิจกรรม</label>
                        <input type="text" class="form-control" id="actName" name="actName" value="{{ $activities->actName }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="actDate" class="form-label">วันที่ปิดรับสมัคร</label>
                        <input type="date" class="form-control" id="actDate" name="actDate" value="{{ $activities->actDate }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="actResBranch" class="form-label">สาขาที่่รับผิดชอบ</label>
                        <input type="text" class="form-control" id="actResBranch" name="actResBranch" value="{{ $activities->actResBranch }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="actHour" class="form-label">จํานวนชั่วโมง</label>
                        <input type="text" class="form-control" id="actHour" name="actHour" value="{{ $activities->actHour }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="actRegisLimit" class="form-label">จำนวนที่รับสมัคร</label>
                        <input type="text" class="form-control" id="actRegisLimit" name="actRegisLimit" value="{{ $activities->actRegisLimit }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="actDetails" class="form-label">รายละเอียดกิจกรรม</label>
                        <textarea class="form-control" id="actDetails" name="actDetails" required>{{ $activities->actDetails }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="assessmentLink" class="form-label">ลื้งแบบประเมิณ</label>
                        <input type="url" class="form-control" id="assessmentLink" name="assessmentLink" value="{{ $activities->assessmentLink }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="responsiblePerson" class="form-label">ผู้รับผิดชอบ</label>
                        <input type="text" class="form-control" id="responsiblePerson" name="responsiblePerson" value="{{ $activities->responsiblePerson }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="picture" class="form-label">รูปภาพ</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        @if ($activities->picture)
                            <img src="{{ asset('storage/' . $activities->picture) }}" alt="Activity Picture" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                    
                    <div class="col-12">
                        <button onclick="confirmUpdate(this)" type="button" class="btn btn-success mx-1 float-end">บันทึก</button>
                        <a href="{{ route('activity.manage') }}" class="btn btn-danger mx-1 float-end">ยกเลิก</a>
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
