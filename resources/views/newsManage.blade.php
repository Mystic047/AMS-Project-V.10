<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .news-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 0%;
        }

        .truncate {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Number of lines to show */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        .btn-icon {
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-icon i {
            font-size: 20px;
        }

        .btn-icon:hover {
            background-color: #0d6efd;
            color: white;
        }

        .btn-report:hover {
            background-color: #198754;
            color: white;
        }

        .btn-secondary i {
            font-size: 18px;
        }

        .btn-report i {
            font-size: 18px;
        }

        .btn-icon:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
        }
    </style>
</head>

@extends('layout.master')
@section('content')

<body style="background-color:#f5f5f5;">

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mx-auto">
                <div class="card w-100 bg-white">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-plus-circle"></i> จัดการข่าวสาร</span>
                            <a href="{{ route('news.showCreateFront') }}" class="btn btn-warning btn-icon me-2" title="เขียนข่าวสาร ประชาสัมพันธ์">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table table-sm">
                                    <tr>
                                        <th class="col-5">ชื่อเรื่อง</th>
                                        <th class="col-6">เนื้อข่าว</th>
                                        <th class="col-1">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td class="truncate">{{ Str::limit(strip_tags($item->details), 150, '...') }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('news.editFront', $item->newsId) }}" class="btn btn-warning btn-sm btn-icon rounded-circle me-2" title="แก้ไข">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('news.delete', $item->newsId) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-warning btn-sm btn-icon rounded-circle" onclick="confirmDelete(this)" type="button" title="ลบ">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $news->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection

</html>
