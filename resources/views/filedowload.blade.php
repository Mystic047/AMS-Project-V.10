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
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .text-center-col {
            text-align: center;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 18px;
            transition: background-color 0.3s, color 0.3s;
            line-height: 0;
        }

        .btn-icon:hover {
            background-color: #0d6efd;
            color: white;
        }

        .btn-upload {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 18px;
            background-color: #fbbd08;
            color: white;
            transition: background-color 0.3s, color 0.3s;
            line-height: 0;
        }

        .btn-upload:hover {
            background-color: #fca311;
        }

        .btn-danger {
            line-height: 0;
            padding: 0;
            border-radius: 50%;
        }
    </style>
</head>

@extends('layout.master')
@section('content')

<body style="background-color:#f5f5f5;">
    <div class="container mt-5">
        <div class="row layout-top-spacing layout-spacing">
            <div class="col-lg-12 col-12 layout-spacing">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">เอกสารดาวโหลด</h5>
                        <a href="{{route('file.showUpload')}}" class="btn btn-upload" title="อัปโหลดไฟล์">
                            <i class="fa-solid fa-upload"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered table-hover mb-4">
                                <thead>
                                    <tr>
                                        <th width="75%" class="text-center">รายการ</th>
                                        <th width="10%" class="text-center">วันที่</th>
                                        <th width="10%" class="text-center text-center-col">อ่านไฟล์</th>
                                        <th width="5%" class="text-center text-center-col">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                    <tr>
                                        <td>{{ $file->fileName }}</td>
                                        <td>{{ $file->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
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
                                        <td class="text-center">
                                            <form action="{{ route('file.destroy', $file->fileId) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-warning" title="ลบ">
                                                    <i class="fa-solid fa-trash"></i>
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
            </div>
        </div>
    </div>
</body>
@endsection

</html>
