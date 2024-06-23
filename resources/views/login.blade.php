<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS for background image -->
    <link rel="stylesheet"  href="{{ asset('css/login.css') }}">>
</head>

<body>
    <!-- Login 8 - Bootstrap Brain Component -->
    <section class="bg-light p-3 p-md-4 p-xl-5 custom-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0 justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <div class="text-center mb-4">
                                                    <a href="#!">
                                                        <img src="https://img2.pic.in.th/pic/sci-logo-1-removebg-preview.png"
                                                            alt="BootstrapBrain Logo" width="205" height="70">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('login.generic') }}" method="post">
                                        @csrf <!-- Include CSRF token for Laravel form submission -->
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <h6>Email</h6>
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" name="email"
                                                        id="email" placeholder="name@example.com" required>
                                                    <label for="email" class="form-label">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h6>Password</h6>
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" placeholder="Password" required>
                                                    <label for="password" class="form-label">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h6>สถานะ</h6> <!-- Role selection -->
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="role" id="role"
                                                        required>
                                                        <option value="">เลือกสถานะ</option>
                                                        <option value="student">นักศึกษา</option>
                                                        <option value="professor">อาจารย์</option>
                                                        <option value="coordinator">เจ้าหน้าที่คณะ</option>
                                                    </select>
                                                    <label for="role" class="form-label">สถานะ</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="remember_me" id="remember_me">
                                                    <label class="form-check-label text-secondary"
                                                        for="remember_me">
                                                        Keep me logged in
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">เข้าสู่ระบบ</button>
                                                </div>
                                            </div>
                                        </div>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                <li>{{ session('success') }}</li>
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'เข้าสู่ระบบไม่สำเร็จ',
            text: 'โปรดตรวจสอบรหัสผ่านหรือสถานะให้ถูกต้อง',
            showConfirmButton: true,
            confirmButtonText: 'ตกลง',
        });
    </script>
@endif

</body>

</html>
