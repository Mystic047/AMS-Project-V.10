<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Table</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@extends('admin.layouts.master')
@section('content')
    <body style="background-color:#f5f5f5;">
    <section class="section">
        <div class="section-header">
          <h1>แก้ไขข้อมูลแอดมิน</h1>
        </div>
    </section>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('admin.update', $admins->admin_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">ID</label>
                        <input type="text" class="form-control" id="inputAddress" name="coordinators_id" placeholder="ถ้า Auto ก็เอาออก" value="{{ $admins->admin_id }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4"  name="email"value="{{ $admins->email }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password"value="">
                    </div>
                    <div class="col-md-5">
                        <label for="inputEmail4" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="inputEmail4" name="firstname" value="{{ $admins->firstname }}">
                    </div>
                    <div class="col-md-5">
                        <label for="inputPassword4" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="inputPassword4" name="lastname"  value="{{ $admins->lastname }}">
                    </div>
                    <div class="col-md-2">
                        <label for="inputPassword4" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="inputPassword4"  name="nickname" value="{{ $admins->nickname }}">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">faculty_id</label>
                        <input type="text" class="form-control" id="inputAddress" name="faculty_id" value="{{ $admins->faculty_id }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">area_id</label>
                        <input type="text" class="form-control" id="inputCity"  name="area_id" value="{{ $admins->area_id }}">
                    </div>
                    <div class="col-md-6">
                        <label for="profile_picture">Profile Picture:</label><br>
                        <input type="file" name='profile_picture' id="profile_picture">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mx-1 float-end">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and its dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
@endsection
</html>
