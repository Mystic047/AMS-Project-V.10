@extends('admin.layouts.master')

@section('title', 'เพิ่มข้อมูลนักศึกษา')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>เพิ่มข้อมูลนักศึกษา</h1>
    </div>
</section>

<div class="container">
    <div class="card my-5">
        <div class="card-body">
            <form class="row g-3" action="{{ route('student.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="col-md-5">
                    <label for="firstname" class="form-label">ชื่อ</label>
                    <input type="text" name="firstName" class="form-control" id="firstname" value="{{ old('firstName') }}">
                </div>
                <div class="col-md-5">
                    <label for="lastname" class="form-label">นามสกุล</label>
                    <input type="text" name="lastName" class="form-control" id="lastname" value="{{ old('lastName') }}">
                </div>
                <div class="col-md-2">
                    <label for="nickname" class="form-label">ชื่อเล่น</label>
                    <input type="text" name="nickName" class="form-control" id="nickname" value="{{ old('nickName') }}">
                </div>
                <div class="col-md-6">
                    <label for="areaId" class="form-label">สาขาที่สังกัด</label>
                    <select class="form-control" id="areaId" name="areaId">
                        <option value="">เลือกสาขาที่สังกัด</option>
                        @foreach ($area as $areas)
                        <option value="{{ $areas->areaId }}" {{ old('areaId') == $areas->areaId ? 'selected' : '' }}>
                            {{ $areas->areaName }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="profilePicture" class="form-label">รูปโปรไฟล์</label>
                    <input type="file" id="profilePicture" name="profilePicture" class="form-control">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">สร้าง</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


