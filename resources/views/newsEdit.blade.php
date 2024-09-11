<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
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
            background-color: #faf9f8;
            color: #181818;
        }
    </style>
</head>

@extends('layout.master')
@section('content')
<body style="background-color:#f5f5f5;">
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('news.update', $news->newsId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="title" class="form-label">ชื่อหัวข้อข่าว</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ $news->title }}">
                    </div>
                    <div class="col-12">
                        <label for="details" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" id="details" name="details" rows="5">{{ $news->details }}</textarea>
                    </div>
                    <div class="col-12">
                        <label for="imagePath" class="form-label">รูปภาพ</label>
                        <input type="file" class="form-control" id="imagePath" name="imagePath">
                    </div>
                    <div class="col-12">
                        <button onclick="confirmUpdate(this)" type="button" class="btn btn-success btn-icon btn-save mx-1 float-end" title="Save">
                            <i class="fa-solid fa-save"></i>
                        </button>
                        <a href="{{ route('news.manageFront') }}" class="btn btn-icon  btn-danger btn-cancel mx-1 float-end" title="Cancel">
                            <i class="fa-solid fa-times"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Initialize CKEditor 5 -->
    <script>
        ClassicEditor
            .create(document.querySelector('#details'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
@endsection
</html>
