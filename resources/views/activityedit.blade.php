<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

@extends('layout.master')
@section('content')
<style>
    * {
        font-family: 'Noto Sans Thai', sans-serif;
    }

    .search-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .news-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 0%;
    }

    .truncate {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Number of lines to show */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }

    .btn-icon {
        width: 45px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        font-size: 20px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-icon i {
        font-size: 20px;
    }

    .btn-icon:hover {
        background-color: #0d6efd;
        color: white;
    }

    .btn-report:hover {
        background-color: #198754;
        color: white;
    }

    .btn-secondary i {
        font-size: 18px;
    }

    .btn-report i {
        font-size: 18px;
    }

    .btn-icon:hover {
        background-color: #faf9f8;
        color: #181818;
    }
</style>
<body>

    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('activity.update', $activities->actId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="actId" class="form-label"><i class="fas fa-id-badge"></i> รหัสกิจกรรม</label>
                        <input type="text" name="actId" class="form-control" id="actId" value="{{ $activities->actId }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actName" class="form-label"><i class="fas fa-signature"></i> ชื่อกิจกรรม</label>
                        <input type="text" name="actName" class="form-control" id="actName" value="{{ $activities->actName }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actLocation" class="form-label"><i class="fas fa-map-marker-alt"></i> สถานที่</label>
                        <input type="text" name="actLocation" class="form-control" id="actLocation" value="{{ $activities->actLocation }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actDate" class="form-label"><i class="fas fa-calendar-alt"></i> วันที่ปิดรับสมัคร</label>
                        <input type="date" name="actDate" class="form-control" id="actDate" value="{{ $activities->actDate }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actResBranch" class="form-label"><i class="fas fa-building"></i> สาขาที่รับผิดชอบ</label>
                        <input type="text" name="actResBranch" class="form-control" id="actResBranch" value="{{ $activities->actResBranch }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actHour" class="form-label"><i class="fas fa-hourglass-half"></i> ชั่วโมงที่ได้รับ</label>
                        <input type="text" name="actHour" class="form-control" id="actHour" value="{{ $activities->actHour }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actRegisLimit" class="form-label"><i class="fas fa-users"></i> จำนวนที่รับ</label>
                        <input type="text" name="actRegisLimit" class="form-control" id="actRegisLimit" value="{{ $activities->actRegisLimit }}" required>
                    </div>
                    <div class="col-md-12">
                        <label for="actDetails" class="form-label"><i class="fas fa-info-circle"></i> รายละเอียดกิจกรรม</label>
                        <textarea name="actDetails" class="form-control" id="actDetails" required>{{ $activities->actDetails }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="assessmentLink" class="form-label"><i class="fas fa-link"></i> ลิงค์ประเมินกิจกรรม</label>
                        <input type="url" name="assessmentLink" class="form-control" id="assessmentLink" value="{{ $activities->assessmentLink }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="picture" class="form-label"><i class="fas fa-image"></i> รูปภาพ</label>
                        <input type="file" id="picture" name="picture" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label for="responsiblePerson" class="form-label"><i class="fas fa-user"></i> ผู้รับผิดชอบ</label>
                        <input type="text" name="responsiblePerson" class="form-control" id="responsiblePerson" value="{{ $activities->responsiblePerson }}" required>
                    </div>
                    {{-- <div class="col-12">
                        <button onclick="confirmUpdate(this)" type="button" class="btn btn-success float-end">อัปเดตกิจกรรม</button>
                    </div> --}}
                    <div class="col-12">
                        <button onclick="confirmUpdate(this)" type="button" class="btn btn-success btn-icon btn-save mx-1 float-end" title="Save">
                            <i class="fa-solid fa-save"></i>
                        </button>
                        <a href="{{ route('activity.manageFront') }}" class="btn btn-icon  btn-danger btn-cancel mx-1 float-end" title="Cancel">
                            <i class="fa-solid fa-times"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Bootstrap Bundle with Popper -->
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
@endsection
</html>
