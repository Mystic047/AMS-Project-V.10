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
                <form>
                    <div class="mb-3">
                        <label for="documentTitle" class="form-label">หัวข้อเรื่อง</label>
                        <input type="text" class="form-control" id="documentTitle" placeholder="พิมพ์ชื่อเอกสาร">
                    </div>
                    <div class="mb-3">
                        <label for="documentDetails" class="form-label">รายละเอียดข่าว</label>
                        <textarea class="form-control" id="documentDetails" rows="4" placeholder="พิมพ์รายละเอียดข่าว"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">เลือกรูปภาพ</label>
                        <input type="file" class="form-control" id="fileUpload">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-danger" type="submit">ลบ</button>
                        <button class="btn btn-primary" type="submit">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Initialize CKEditor -->
    <script>
        ClassicEditor
            .create(document.querySelector('#documentDetails'), {
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
</body>
@endsection
</html>
