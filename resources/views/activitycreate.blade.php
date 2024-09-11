<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .btn-icon {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 24px;
            transition: background-color 0.3s, color 0.3s;
            line-height: 0;
            text-align: center;
            border: none;
        }

        /* .btn-create {
            background-color: #28a745;
            color: white;
        } */

        .btn-icon:hover {
            opacity: 0.8;
        }
    </style>
</head>

@extends('layout.master')
@section('content')

<body style="background-color:#f5f5f5;">

    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('activity.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="col-md-6">
                        <label for="actId" class="form-label"><i class="fas fa-id-badge"></i> รหัสกิจกรรม</label>
                        <input type="text" name="actId" class="form-control" id="actId" required>
                    </div> --}}
                    <div class="col-md-6">
                        <label for="actName" class="form-label"><i class="fas fa-signature"></i> ชื่อกิจกรรม</label>
                        <input type="text" name="actName" class="form-control" id="actName" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actLocation" class="form-label"><i class="fas fa-map-marker-alt"></i> สถานที่</label>
                        <input type="text" name="actLocation" class="form-control" id="actLocation" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actDate" class="form-label"><i class="fas fa-calendar-alt"></i> วันที่ปิดรับสมัคร</label>
                        <input type="date" name="actDate" class="form-control" id="actDate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actResBranch" class="form-label"><i class="fas fa-building"></i> สาขาที่รับผิดชอบ</label>
                        <input type="text" name="actResBranch" class="form-control" id="actResBranch" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actHour" class="form-label"><i class="fas fa-hourglass-half"></i> ชั่วโมงที่ได้รับ</label>
                        <input type="text" name="actHour" class="form-control" id="actHour" required>
                    </div>
                    <div class="col-md-6">
                        <label for="actRegisLimit" class="form-label"><i class="fas fa-users"></i> จำนวนที่รับ</label>
                        <input type="text" name="actRegisLimit" class="form-control" id="actRegisLimit" required>
                    </div>
                    <div class="col-md-12">
                        <label for="actDetails" class="form-label"><i class="fas fa-info-circle"></i> รายละเอียดกิจกรรม</label>
                        <textarea name="actDetails" class="form-control" id="actDetails" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="assessmentLink" class="form-label"><i class="fas fa-link"></i> ลิงค์ประเมินกิจกรรม</label>
                        <input type="url" name="assessmentLink" class="form-control" id="assessmentLink" required>
                    </div>
                    <div class="col-md-6">
                        <label for="picture" class="form-label"><i class="fas fa-image"></i> รูปภาพ</label>
                        <input type="file" id="picture" name="picture" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label for="responsiblePerson" class="form-label"><i class="fas fa-user"></i> ผู้รับผิดชอบ</label>
                        <input type="text" name="responsiblePerson" class="form-control" id="responsiblePerson" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-icon btn-warning float-end" title="Create Activity">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
@endsection

</html>
