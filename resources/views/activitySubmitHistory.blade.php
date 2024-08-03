<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }
    </style>
</head>
@extends('layout.master')
@section('content')
<body>

    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <div class="card w-100 bg-white">
                <div class="card-body">
                    <h5>
                        <i class="bi bi-plus-circle"></i> ประวัติการเข้าร่วมกิจกรรม
                    </h5><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-4">
                            <colgroup>
                                <col style="width: 20%;">
                                <col style="width: 30%;">
                                <col style="width: 30%;">
                                <col style="width: 20%;">
                            </colgroup>
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">ชื่อกิจกรรม</th>
                                    <th class="text-center">ชั่วโมงกิจกรรม</th>
                                    <th class="text-center">ดูข้อมูลเพิ่มเติม</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $submit)
                                    <tr>
                                        <td class="text-center">
                                            {{ $submit->status ?? 'ไม่มีข้อมูล' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $submit->activity->actName ?? 'ไม่มีข้อมูล' }}<br>
                                            จัดโดย {{ $submit->activity->responsiblePerson ?? 'ไม่มีข้อมูล' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $submit->activity->actHour ?? 'ไม่มีข้อมูล' }} ชั่วโมง
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#enterCodeModal">ใส่รหัส</button>
                                            <button class="btn btn-success">รับใบประกาศ</button>
                                        </td>
                                    </tr>
                                @endforeach
                                @if($history->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">ไม่มีข้อมูลการเข้าร่วมกิจกรรม</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Modal เพื่อใส่รหัส -->
    <!-- Modal เพื่อใส่รหัส -->
<div class="modal fade" id="enterCodeModal" tabindex="-1" aria-labelledby="enterCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enterCodeModalLabel">กรุณาใส่รหัสยืนยันการเข้าร่วม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="codeInput" class="form-label">รหัส:</label>
                        <input type="text" class="form-control" id="codeInput">
                    </div>
                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
@endsection
</html>
