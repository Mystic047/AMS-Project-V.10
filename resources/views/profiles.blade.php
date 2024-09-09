<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page Design</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .hidden {
            display: none;
        }

        body {
            background-color: #f5f5f5;
        }

        .card {
            height: 100%;
        }

        .card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>

@extends('layout.master')
@section('content')
    @php
        $user = getAuthenticatedUser();
    @endphp

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img id="profilePicturePreview"
                        src="{{ $user->profilePicture ? asset('storage/' . $user->profilePicture) : 'https://via.placeholder.com/200' }}"
                        class="card-img-top rounded-circle mx-auto mt-3" alt="{{ $user->firstName }} {{ $user->lastName }}"
                        style="width: 150px; height: 150px; object-fit: cover;">
                    <div class="card-body text-center">
                        <div>
                            <h5 class="card-title">{{ $user->firstName }} {{ $user->lastName }}</h5>
                        </div>
                        <p class="text-muted">{{ $user->nickName }}</p>
                        <form id="profilePictureForm" class="d-inline" action="{{ route('profile.updatePicture') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="profilePictureInput" name="profilePicture" class="hidden"
                                accept="image/*" onchange="previewProfilePicture(event)">
                            <button type="button" class="btn btn-success"
                                onclick="document.getElementById('profilePictureInput').click();">อัปโหลดรูปภาพ</button>
                        </form>
                        <div id="profilePictureButtons" class="hidden mt-2">
                            <button type="button" class="btn btn-primary" onclick="saveProfilePicture()">Save</button>
                            <button type="button" class="btn btn-secondary"
                                onclick="cancelProfilePicture()">Cancel</button>
                        </div>

                        <div class="mt-4">
                            <h6>ABOUT ME:</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">รหัสนักศึกษา: {{ $user->userId }}</li>
                            <li class="list-group-item">Email: {{ $user->email }}</li>
                            <li class="list-group-item">สาขาวิชา: {{ $user->area->areaName }}</li>
                            <li class="list-group-item">ชั่วโมงสะสม: {{ getTotalCompletedActivityHours() }}</li>
        

                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5>โปรไฟล์ส่วนตัว</h5>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="first_name" class="form-label">รหัสนักศึกษา</label>
                                    <input type="text" class="form-control" id="userId" value="{{ $user->userId }}"
                                        disabled>
                                </div>
                                <div class="col">
                                    <label for="email" class="form-label">อีเมล</label>
                                    <input type="text" class="form-control" id="email" value="{{ $user->email }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="firstName" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                        value="{{ $user->firstName }}">
                                </div>
                                <div class="col">
                                    <label for="lastName" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName"
                                        value="{{ $user->lastName }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nickName" class="form-label">ชื่อเล่น</label>
                                <input type="text" class="form-control" id="nickName" name="nickName"
                                    value="{{ $user->nickName }}">
                            </div>
                            <div class="mb-3">
                                <label for="areaName" class="form-label">สาขาวิชา</label>
                                <input type="text" class="form-control" id="areaName"
                                    value="{{ $user->area->areaName }}" disabled>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewProfilePicture(event) {
            var output = document.getElementById('profilePicturePreview');
            output.src = URL.createObjectURL(event.target.files[0]);
            document.getElementById('profilePictureButtons').classList.remove('hidden');
        }

        function saveProfilePicture() {
            // Submit the form directly
            document.getElementById('profilePictureForm').submit();
        }

        function cancelProfilePicture() {
            document.getElementById('profilePictureInput').value = "";
            document.getElementById('profilePicturePreview').src =
                "{{ $user->profilePicture ? asset('storage/' . $user->profilePicture) : 'https://via.placeholder.com/200' }}";
            document.getElementById('profilePictureButtons').classList.add('hidden');
        }
    </script>
@endsection

</html>
