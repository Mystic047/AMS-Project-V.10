<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Table</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    * {
        font-family: 'Noto Sans Thai', sans-serif;
    }
</style>
@extends('layout.master')
@section('content')

    <body style="background-color:#f5f5f5;">
        <div class="container mt-5">
            <div class="row layout-top-spacing layout-spacing">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">เอกสารดาวโหลด</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive bg-white">
                                <table class="table table-bordered table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th width="70%" class="text-center">รายการ</th>
                                            <th width="10%" class="text-center">วันที่</th>
                                            <th width="10%" class="text-center">อ่านไฟล์</th>
                                            <th width="10%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $file)
                                        <tr>
                                            <td>{{ $file->fileName }}</td>
                                            {{-- <td>{{ $file->created_by }} {{ $file->created_by_role }}</td> --}}
                                            <td>{{ $file->created_at }} </td>
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

                                            <td>
                                                <form action="{{ route('file.destroy', $file->fileId) }}" method="POST">
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
                        <div class="card-footer text-muted">
                            <a href="{{route('file.showUpload')}}" class="btn btn-primary">อัปโหลดไฟล์</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Link to Bootstrap JS and its dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>
    </body>
@endsection

</html>
