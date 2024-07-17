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
                <h1>จัดการไฟล์ เอกสาร</h1>
            </div>
        </section>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Search bar and Create button -->
                    <div class="search-bar">
                        <div class="search-box">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <a href="{{ route('file.showCreate') }}" class="btn btn-primary">Create</a>
                    </div>

                    <!-- User table -->
                    <table class="table table-bordered">
                        <thead class="table table-sm">
                            <tr>
                                <th class="col-3">ชื่อไฟล์</th>
                                <th class="col-3">ไฟล์</th>
                                <th class="col-3">ผู้อัปโหลด</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->fileName }}</td>
                                    <td>
                                        @if ($file->filePath)
                                            <a href="{{ Storage::url($file->filePath) }}" target="_blank">
                                                @php
                                                    $extension = pathinfo($file->filePath, PATHINFO_EXTENSION);
                                                @endphp
                                                @if ($extension == 'pdf')
                                                    <i class="fa-solid fa-file-pdf fa-2x" style="color: #f6420bde;"></i>
                                                @elseif(in_array($extension, ['jpeg', 'jpg', 'png']))
                                                    <i class="fa-solid fa-file-image fa-2x" style="color: #4caf50;"></i>
                                                @else
                                                    <i class="fa-solid fa-file fa-2x" style="color: #6c757d;"></i>
                                                @endif
                                            </a>
                                        @else
                                            ไม่มีไฟล์
                                        @endif
                                    </td>
                                    <td>{{ $file->created_by }} {{ $file->createdByRole }}</td>
                                    <td>
                                        {{-- <form action="{{ route('file.destroy', $file->file_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                                        </form> --}}

                                        <div class="d-flex">
                                            <form action="{{ route('file.edit', $file->fileId) }}" method="get"
                                                class="me-1">
                                                <button class="btn btn-warning btn-sm" type="submit">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </button>
                                            </form>
                                            <form action="{{ route('file.destroy', $file->fileId) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="button"
                                                    onclick="confirmDelete(this)">
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
        </script>
    </body>
@endsection

</html>
