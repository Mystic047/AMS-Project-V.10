<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>


    <!-- Login 8 - Bootstrap Brain Component -->
    <!-- Login 8 - Bootstrap Brain Component -->
    <section class="bg-light p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                    src="https://img.freepik.com/free-photo/sunset-silhouettes-trees-mountains-generative-ai_169016-29371.jpg"
                                    alt="Welcome back you've been missed!">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center mb-4">
                                                        <a href="#!">
                                                            <img src="./assets/img/bsb-logo.svg"
                                                                alt="BootstrapBrain Logo" width="175" height="57">
                                                            ใส้ logo
                                                        </a>
                                                    </div>
                                                    <h4 class="text-center">Professor Login Form!</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('professor.login') }}" method="POST">
                                            <!-- Specify method="POST" -->

                                            @csrf <!-- Add CSRF token for security -->
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
                                                            id="password" value="" placeholder="Password"
                                                            required>
                                                        <label for="password" class="form-label">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="remember_me" id="remember_me">
                                                        <label class="form-check-label text-secondary"
                                                            for="remember_me">
                                                            Keep me logged in
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-dark btn-lg" type="submit">Log in
                                                            now</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

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
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
