<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Dashboard</title>
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
                    <div class="search-bar">
                        <div class="search-box">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <a href="{{ 'ActivityCreate' }}" class="btn btn-primary">Create</a>
                    </div>

                    <table class="table table-bordered">
                        <thead class="table-sm">
                            <tr>
                                <th scope="col" class="col-3">รหัส</th>
                                <th scope="col" class="col-4">กิจกรรม</th>
                                <th scope="col" class="col-3">ประเภท</th>
                                <th scope="col" class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td class="col-3">{{ $activity->activity_id }}</td>
                                    <td class="col-4">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $activity->picture) }}"
                                                class="rounded-circle me-2" alt="Avatar"
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                            <div>{{ $activity->activity_name }} </div>
                                        </div>
                                    </td>
                                    <td class="col-3">{{ $activity->activity_type }}</td> 
                                    <td class="col-2">
                                        <form action="{{ route('activity.edit',$activity->activity_id) }}" method="get"
                                            style="display: inline;">
                                            <button class="btn btn-warning btn-sm" type="submit">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </button>
                                        </form>
                                        <form action="{{ route('activity.delete', $activity->activity_id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete(this)">
                                                <i class="fas fa-trash"></i> Delete
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
        </script>
    </body>
@endsection

</html>
