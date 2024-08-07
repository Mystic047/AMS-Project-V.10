<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMRzVR9SJ6p4r2pDxaLbM1K3PdHg6KFTsGE4zc" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .card-img-top {
            width: 250px;
            height: 180px;
            object-fit: cover;
        }

        .card-footer {
            border-top: 1px solid #dee2e6;
            padding-top: 10px;
            margin-top: 10px;
        }
    </style>
</head>

@extends('layout.master')
@section('content')

<body style="background-color:#f5f5f5;">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>ข่าวสาร ประชาสัมพันธ์</h2>
            {{-- <a href="" class="btn btn-danger">เทสไปหน้า Edit</a> --}}
            <a href="{{ route('news.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
        </div>
        <div class="row">
            @foreach ($news as $item)
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('storage/' . $item->imagePath) }}" class="card-img-top" alt="...">
                            </div>
                            <div class="col-9">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <hr>
                                <p class="card-text">{!! $item->details !!}</p>
                            
                                <form action="{{ route('news.details', $item->newsId) }}" method="get"
                                    style="display: inline;">
                                    <button class="btn btn-warning btn-sm" type="submit">
                                        <i class=""></i> readmore
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="row">
                            <div class="col-4">
                                <p class="card-text">ผู้เขียน: {{ $item->author }}</p>
                            </div>
                            <div class="col-4">
                                <p class="card-text">วันที่: {{ $item->created_at->format('F d, Y') }}</p>
                            </div>
                            <div class="col-4">
                                <p class="card-text">การเข้าชม: {{ $item->views }} views</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous">
    </script>
</body>
@endsection

</html>
