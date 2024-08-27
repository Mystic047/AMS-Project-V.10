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
</head>

<style>
    * {
        font-family: 'Noto Sans Thai', sans-serif;
    }
</style>
<style>
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
</style>
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
                            <a href="{{ route('news.showCreateFront') }}" class="btn btn-light">
                                <i class="bi bi-plus-circle"></i> เขียนข่าวสาร ประชาสัมพันธ์
                            </a>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table table-sm">
                                    <tr>
                                        <th class="col-3">รูปภาพ</th>
                                        <th class="col-3">ชื่อเรื่อง</th>
                                        <th class="col-4">เนื้อข่าว</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->imagePath) }}" alt="News Image" class="news-image">
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td class="truncate">{{ Str::limit(strip_tags($item->details), 300, '...') }}</td>
                                            <td>
                                                <a href="{{ route('news.editFront', $item->newsId) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                                <form action="{{ route('news.delete', $item->newsId) }}" method="POST" style="display:inline;">
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
