<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
@extends('admin.layouts.master')
@section('content')

<body style="background-color:#f5f5f5;">
    <section class="section">
        <div class="section-header">
            <h1>รายงานข้อมูล</h1>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">รายงาน กิจกรรมทั้งหมด</h5>
                            <i class="fas fa-file-alt fa-3x text-primary"></i>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('activity.report.pdf')}}"  target="_blank" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#reportModal">>ออกรายงาน</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">รายงาน 2</h5>
                            <i class="fas fa-chart-bar fa-3x text-success"></i>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-success">ออกรายงาน</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">รายงาน 3</h5>
                            <i class="fas fa-chart-pie fa-3x text-danger"></i>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-danger">ออกรายงาน</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Report Modal -->
     <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">เลือกวันที่สำหรับรายงาน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('activity.report.pdf')}}" method="GET" target="_blank">
                        @csrf
                        <div class="mb-3">
                            <label for="startDate" class="form-label">วันที่เริ่มต้น</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">วันที่สิ้นสุด</label>
                            <input type="date" class="form-control" id="endDate" name="endDate" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection

</html>
