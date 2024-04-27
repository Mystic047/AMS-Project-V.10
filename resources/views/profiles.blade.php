<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile Page Design</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  /* Additional styles to achieve the exact look may be necessary */
</style>
</head>
@extends('layout.master')
@section('content')
<body>

<div class="container mt-3">
  <div class="row">
    <!-- Profile Card -->
   <!-- Profile Card -->
<div class="col-lg-4">
    <div class="card">
      <img src="https://img.soccersuck.com/images/2024/01/01/winter._.aespa8_1704114398_3270671089573757393_51418693029.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Dominic Keller" style="width: 150px; height: 150px; object-fit: cover;">
      <div class="card-body text-center">
        <h5 class="card-title">Dominic Keller</h5>
        <p class="text-muted">Founder</p>
        <a href="#" class="btn btn-success me-2">Follow</a>
        <a href="#" class="btn btn-danger">Message</a>
        <div class="mt-4">
          <h6>ABOUT ME:</h6>
          <p class="card-text">Hi! I'm Johnathan Doe, has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Full Name: Geneva D. McKnight</li>
          <li class="list-group-item">Mobile: (123) 123 1234</li>
          <li class="list-group-item">Email: user@email.domain</li>
          <li class="list-group-item">Location: USA</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="card-link"><i class="fab fa-google"></i></a>
          <a href="#" class="card-link"><i class="fab fa-twitter"></i></a>
          <a href="#" class="card-link"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
    </div>
  </div>

    <!-- Editable Information Card -->
    <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5>โปรไฟล์ส่วนตัว แดะแก้</h5> <!-- บรรทัดนี้เพิ่มเข้ามา -->
          </div>
          <div class="card-body">
            <form>
              <!-- Form Fields -->
              <div class="row mb-3">
                <div class="col">
                  <label for="first_name" class="form-label">First name</label>
                  <input type="text" class="form-control" id="first_name" placeholder="Enter your first name">
                </div>
                <div class="col">
                  <label for="last_name" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="last_name" placeholder="Enter your last name">
                </div>
              </div>
              <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control" id="bio" placeholder="Enter your bio" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email address">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password">
              </div>
              <button type="submit" class="btn btn-primary">Update Info</button>
            </form>
          </div>
        </div>
      </div>

  </div>

</div>


<!-- Icons (make sure to include the library for icons) -->
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
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
