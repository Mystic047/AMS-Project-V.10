<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <style>
        .page-container {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }
        .upload-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .upload-header {
            border-bottom: 2px solid #007bff;
            margin-bottom: 15px;
            padding-bottom: 5px;
        }
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }
        /* Adjust button size and position */
        .upload-container .btn-primary {
            width: auto;
            white-space: nowrap;
        }
    </style>
</head>
@extends('layout.master')
@section('content')
<body>
    <div class="container my-5">
        <div class="page-container">
            <div class="upload-container">
                <div class="upload-header mb-3">
                    <h4>เขียนข่าวสาร ประชาสัมพันธ์</h4>
                </div>
                    <form class="row g-3" action="{{ route('news.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="title" class="form-label">ชื่อหัวข้อข่าว</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="">
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">รายละเอียด</label>
                            <textarea class="form-control" id="details" name="details" rows="5"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="imagePath" class="form-label">รูปภาพ</label>
                            <input type="file" class="form-control" id="imagePath" name="imagePath">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">อัปโหลด</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Initialize CKEditor -->
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>
</body>
@endsection
</html>