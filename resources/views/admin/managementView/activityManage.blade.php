<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <!-- Search bar and Create button -->
                <div class="search-bar mb-3">
                    <div class="search-box w-75">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <a href="{{ route('activity.showCreate') }}" class="btn btn-primary ms-3">Create</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">รหัส</th>
                            <th scope="col">กิจกรรม</th>
                            <th scope="col">ประเภท</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->activity_id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $activity->picture) }}"
                                             class="rounded-circle me-2" alt="Avatar"
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>{{ $activity->activity_name }}</div>
                                    </div>
                                </td>
                                <td>{{ $activity->activity_type }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="activityStatus{{ $activity->activity_id }}"
                                               {{ $activity->is_open ? 'checked' : '' }}
                                               onclick="toggleStatus(this, '{{ $activity->activity_id }}')">
                                        <label class="form-check-label" for="activityStatus{{ $activity->activity_id }}">
                                            {{ $activity->is_open ? 'Open' : 'Closed' }}
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('activity.edit', $activity->activity_id) }}" method="get" class="me-1">
                                            <button class="btn btn-warning btn-sm" type="submit">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </button>
                                        </form>
                                        <form action="{{ route('activity.delete', $activity->activity_id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: 'ต้องการลบข้อมูลนี้?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }

        function toggleStatus(checkbox, activityId) {
            fetch(`/activity/toggle/${activityId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ is_open: checkbox.checked })
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
@endsection



</html>
