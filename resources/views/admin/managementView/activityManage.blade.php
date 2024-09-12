<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 0%;
        }
    </style>
</head>
@extends('admin.layouts.master')

@section('content')
<body style="background-color:#f5f5f5;">
    <section class="section">
        <div class="section-header">
            <h1>จัดการข้อมูลกิจกรรม</h1>
        </div>
    </section>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <div class="search-bar mb-3">
                    <div class="search-box w-75">
                        <input type="text" class="form-control" placeholder="ค้นหา...">
                    </div>
                    <a href="{{ route('activity.showCreate') }}" class="btn btn-primary ms-3">สร้าง</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">รหัส</th>
                            <th scope="col">กิจกรรม</th>
                            <th scope="col">รหัสเข้าร่วม</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->actId }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>{{ $activity->actName }}</div>
                                    </div>
                                </td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-info btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#participationCodeModal{{ $activity->actId }}">
                                        ดูรหัส
                                    </button>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="activityStatus{{ $activity->actId }}"
                                               {{ $activity->isOpen ? 'checked' : '' }}
                                               onclick="toggleStatus(this, '{{ $activity->actId }}')">
                                        <label class="form-check-label" for="activityStatus{{ $activity->actId }}">
                                            {{ $activity->isOpen ? 'Open' : 'Closed' }}
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('activity.edit', $activity->actId) }}" method="get" class="me-1">
                                            <button class="btn btn-warning btn-sm" type="submit">
                                                <i class="fas fa-pencil-alt"></i> แก้ไข
                                            </button>
                                        </form>
                                        <form action="{{ route('activity.delete', $activity->actId) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                                <i class="fas fa-trash"></i> ลบ
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="participationCodeModal{{ $activity->actId }}"
                                tabindex="-1"
                                aria-labelledby="participationCodeModalLabel{{ $activity->actId }}"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="participationCodeModalLabel{{ $activity->actId }}">
                                                รหัสเข้าร่วมกิจกรรม</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            รหัสเข้าร่วมของกิจกรรมช่วงเช้า:
                                            <br>{{ $activity->morningEnrollmentKey ?? 'ไม่มีรหัส' }}
                                        </div>
                                        <div class="modal-body">
                                            รหัสเข้าร่วมของกิจกรรมช่วงบ่าย:
                                            <br>{{ $activity->afternoonEnrollmentKey ?? 'ไม่มีรหัส' }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">ปิด</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

    
        function toggleStatus(checkbox, activityId) {
            fetch(`/activity/toggle/${activityId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ isOpen: checkbox.checked })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const label = checkbox.nextElementSibling;
                    if (checkbox.checked) {
                        label.textContent = 'Open';
                        checkbox.classList.add('switch-open');
                        checkbox.classList.remove('switch-closed');
                    } else {
                        label.textContent = 'Closed';
                        checkbox.classList.add('switch-closed');
                        checkbox.classList.remove('switch-open');
                    }
                } else {
                    alert('Error toggling status');
                }
            });
        }
    
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkbox.classList.add('switch-open');
                } else {
                    checkbox.classList.add('switch-closed');
                }
            });
        });
    </script>
    
    <style>
        .form-check-input.switch-open {
            background-color: #198754 !important;
            border-color: #0a0a0a !important;
        }
        .form-check-input.switch-closed {
            background-color: #dc3545 !important;
            border-color: #0a0a0a !important;
        }
    </style>
    
</body>

</html>
