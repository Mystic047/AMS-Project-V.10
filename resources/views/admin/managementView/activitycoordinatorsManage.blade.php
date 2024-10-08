<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-image {
            width: 40px;
            /* Adjust as needed */
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
@extends('admin.layouts.master')
@section('content')

    <body style="background-color:#f5f5f5;">
        <section class="section">
            <div class="section-header">
                <h1>จัดการข้อมูลฝ่ายกิจกรรม</h1>
            </div>
        </section>
       

        <div class="card mt-5">
            <div class="card-body">
                <!-- Search bar and Create button -->
                <div class="search-bar">
                    <form action="{{ route('coordinator.search') }}" method="GET" class="d-flex w-100 me-3">
                        <input type="text" name="query" class="form-control me-2" placeholder="Search..."
                            value="{{ request()->input('query') }}">
                        <button class="btn btn-outline-secondary" type="submit">ค้นห้า</button>
                    </form>
                    <a href="{{ route('coordinator.showCreate') }}" class="btn btn-primary ms-3">สร้าง</a>
                </div>
                <!-- User table -->
                <table class="table table-bordered">
                    <thead class="table-sm">
                        <tr>
                            <th scope="col" class="col-3">รหัส</th>
                            <th scope="col" class="col-4">ชื่อ</th>
                            <th scope="col" class="col-3">สาขา</th>
                            <th scope="col" class="col-2">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coordinators as $coordinator)
                            <tr>
                                <td class="col-3">{{ $coordinator->userId }}</td>
                                <td class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . ($coordinator->profilePicture ?? 'profile_pictures/default/default.jpg')) }}"
                                            class="rounded-circle me-2" alt="Avatar"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>{{ $coordinator->firstName }} {{ $coordinator->lastName }}</div>
                                    </div>
                                </td>
                                
                                <td class="col-3">{{ $coordinator->area->areaName }}</td>
                                <!-- Assuming faculty relation exists -->
                                <td class="col-2">
                                    <form action="{{ route('coordinator.edit', $coordinator->userId) }}" method="get"
                                        style="display: inline;">
                                        <button class="btn btn-warning btn-sm" type="submit">
                                            <i class="fas fa-pencil-alt"></i> แก้ไข
                                        </button>
                                    </form>
                                    <form action="{{ route('coordinator.delete', $coordinator->userId) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                            <i class="fas fa-trash"></i> ลบ
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function confirmDelete(button) {
                alertify.confirm(
                    'ยืนยันการลบ', // Title in Thai
                    'คุณแน่ใจหรือว่าต้องการลบรายการนี้? การกระทำนี้ไม่สามารถยกเลิกได้.', // Message in Thai
                    function() {
                        // On confirm
                        button.closest('form').submit();
                        // alertify.success('ลบรายการสำเร็จ');
                    },
                    function() {
                        // On cancel
                        alertify.error('ยกเลิกการกระทำ');
                    }
                ).set({
                    labels: {
                        ok: 'ใช่, ลบเลย!',
                        cancel: 'ยกเลิก'
                    }, // Custom button labels in Thai
                    transition: 'zoom', // Smooth zoom transition
                    movable: false, // Prevent the dialog from being moved
                    closableByDimmer: false, // Prevent closing the dialog by clicking outside
                });
            }
        </script>

        <script>
            // Initialize Notyf
            var notyf = new Notyf({
                duration: 5000, // Set the duration of the notification
                position: {
                    x: 'right',
                    y: 'top'
                }, // Set the position
                ripple: true, // Enable ripple effect
            });

            // Display success notification
            @if (Session::has('success'))
                notyf.success("{{ Session::get('success') }}");
            @endif

            // Display error notification
            @if (Session::has('error'))
                notyf.error("{{ Session::get('error') }}");
            @endif

            // Display form validation errors
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    notyf.error("{{ $error }}");
                @endforeach
            @endif
        </script>
    </body>
@endsection

</html>
