<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                        <!-- Search bar and Create button -->
                    <div class="search-bar">
                        <div class="search-box">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <a href="{{route('file.showCreate')}}" class="btn btn-primary">Create</a>
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
                                    @if($file->file_path)
                                        <a href="{{ Storage::url($file->file_path) }}" target="_blank">
                                            <i class="fa-solid fa-file-pdf fa-2x" style="color: #f6420bde;"></i> <!-- Changed icon to PDF and made it larger -->
                                        </a>
                                    @else
                                        ไม่มีไฟล์
                                    @endif
                                </td>
                                <td>{{ $file->created_by }} {{ $file->created_by_role }}</td>
                                <td>
                                    <form action="{{ route('file.destroy', $file->file_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
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
    </body>
@endsection

</html>
