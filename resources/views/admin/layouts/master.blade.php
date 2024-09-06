<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Include CSS and other head elements here -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- Optional custom styles -->
    @yield('styles') <!-- Section for page-specific styles -->

    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .navbar-nav .dropdown-menu {
            position: absolute;
            right: 0;
            left: auto;
        }

        .nav-link-user {
            display: flex;
            align-items: center;
        }

        .nav-link-user img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            margin-right: 8px;
        }

        .nav-link-user div {
            display: flex;
            align-items: center;
        }
    </style>

    <style>
        .ajs-header {
            font-weight: bold !important;
            font-size: 1.5rem !important;
            color: #333 !important;
            background-color: #f7f7f7 !important;
            padding: 15px !important;
            border-bottom: 1px solid #ddd !important;
            border-top-left-radius: 8px !important;
            border-top-right-radius: 8px !important;
        }

        .ajs-footer {
            border-top: 1px solid #ddd !important;
            padding: 15px !important;
            background-color: #f7f7f7 !important;
            border-bottom-left-radius: 8px !important;
            border-bottom-right-radius: 8px !important;
        }

        .ajs-button.ajs-ok {
            background-color: #28a745 !important;
            /* Green */
            color: white !important;
            font-weight: bold !important;
            border-radius: 5px !important;
            padding: 8px 16px !important;
            margin: 0 10px !important;
            transition: transform 0.2s, box-shadow 0.2s;
            /* Add smooth transition */
        }

        .ajs-button.ajs-cancel {
            background-color: #dc3545 !important;
            /* Red */
            color: white !important;
            border-radius: 5px !important;
            padding: 8px 16px !important;
            margin: 0 10px !important;
            transition: transform 0.2s, box-shadow 0.2s;
            /* Add smooth transition */
        }

        .ajs-button.ajs-ok:hover {
            transform: scale(1.05);
            /* Slightly enlarge on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Add shadow on hover */
        }

        .ajs-button.ajs-cancel:hover {
            transform: scale(1.05);
            /* Slightly enlarge on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Add shadow on hover */
        }

        .ajs-content {
            font-size: 1.1rem !important;
            color: #555 !important;
            padding: 20px !important;
        }

        .ajs-modal {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
            border-radius: 8px !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin.layouts.navbar')

            @include('admin.layouts.sidebar')
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="">สุดหล่อ</a>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>

    <!-- Include JS scripts here -->
    <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

    <script>
        // Initialize Notyf
        var notyf = new Notyf({
            duration: 5000, // Set the duration of the notification
            position: {
                x: 'right',
                y: 'top'
            }, // Set the position
            ripple: true, // Enable ripple effect
        });

        // Display success notification
        @if (Session::has('success'))
            notyf.success("{{ Session::get('success') }}");
        @endif

        // Display error notification
        @if (Session::has('error'))
            notyf.error("{{ Session::get('error') }}");
        @endif

        // Display form validation errors
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                notyf.error("{{ $error }}");
            @endforeach
        @endif
    </script>
    <script>
        function confirmDelete(button) {
            alertify.confirm(
                'ยืนยันการลบ', // Title in Thai
                'คุณแน่ใจหรือว่าต้องการลบรายการนี้? การกระทำนี้ไม่สามารถยกเลิกได้.', // Message in Thai
                function() {
                    // On confirm
                    button.closest('form').submit();
                },
                function() {
                    // On cancel, do nothing
                    alertify.error('ยกเลิกการกระทำ');
                }
            ).set({
                labels: {
                    ok: 'ใช่, ลบเลย!',
                    cancel: 'ยกเลิก'
                },
                transition: 'zoom', // Smooth zoom transition
                movable: false, // Prevent the dialog from being moved
                closableByDimmer: false, // Prevent closing the dialog by clicking outside
            });

            // Prevent the form from submitting by default
            return false;
        }
        function confirmUpdate(button) {
            alertify.confirm(
                'ยืนยันการเปลี่ยนแปลง', // Title in Thai
                'คุณแน่ใจหรือว่าต้องการเปลี่ยนแปลงรายการนี้? การกระทำนี้ไม่สามารถยกเลิกได้.', // Message in Thai
                function() {
                    // On confirm
                    button.closest('form').submit();
                },
                function() {
                    // On cancel, do nothing
                    alertify.error('ยกเลิกการกระทำ');
                }
            ).set({
                labels: {
                    ok: 'ใช่, เปลี่ยนเลย!',
                    cancel: 'ยกเลิก'
                },
                transition: 'zoom', // Smooth zoom transition
                movable: false, // Prevent the dialog from being moved
                closableByDimmer: false, // Prevent closing the dialog by clicking outside
            });

            // Prevent the form from submitting by default
            return false;
        }
    </script>

    @yield('scripts') <!-- Section for page-specific scripts -->
</body>

</html>
