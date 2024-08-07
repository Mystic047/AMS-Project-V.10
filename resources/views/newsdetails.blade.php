<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข่าวสาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMRzVR9SJ6p4r2pDxaLbM1K3PdHg6KFTsGE4zc" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .news-card {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .news-card img {
            width: 100%;
            border-radius: 10px;
        }

        .news-title {
            margin-top: 20px;
            font-size: 1.5em;
            font-weight: bold;
        }

        .news-details {
            margin-top: 10px;
            color: #555;
        }

        .news-footer {
            margin-top: 10px;
            color: #aaa;
            font-size: 0.9em;
            text-align: center;
        }

        .news-footer span {
            margin: 0 5px;
        }
    </style>
</head>
@extends('layout.master')
@section('content')

<body>
    <div class="container">
        <div class="news-card">
            <img src="{{ asset('storage/' . $news->imagePath) }}" class="card-img-top" alt="...">
            <div class="news-title">{{ $news->title }}</div>
            <div class="news-details">{!! $news->details !!}</div>
            <br><br>
            <div class="news-footer">
                <span><i class="fas fa-user"></i> {{ $news->author }}</span>
                <span><i class="fas fa-calendar-alt"></i> {{ $news->created_at->format('F d, Y') }}</span>
                <span><i class="fas fa-eye"></i> {{ $news->views }}</span>
            </div>
        </div>
    </div>
</body>
@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>
