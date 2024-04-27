<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
    </style>
</head>
@extends('layout.master')
@section('content')
<body>
    <div class="container my-5">
        <div class="page-container">
            <div class="upload-container">
                <div class="upload-header mb-3">
                    <h4>อัปโหลดเอกสาร</h4>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="documentTitle" class="form-label">ชื่อเอกสาร</label>
                        <input type="text" class="form-control" id="documentTitle" placeholder="พิมพ์ชื่อเอกสาร">
                    </div>
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">เลือกไฟล์</label>
                        <input type="file" class="form-control" id="fileUpload">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">อัปโหลด</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

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
