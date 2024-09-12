@include('layout.navbar')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
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

<style>
    .footer {
        background-color: #343a40; /* Dark background */
        color: #fff; /* White text color */
        padding: 10px 0; /* Some padding */
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px; /* Set the fixed height of the footer here */
    }
</style>
<style>
    html, body {
        height: 100%;
        margin: 0;
    }
    .main-wrapper {
        min-height: 100%;
        padding-bottom: 60px; /* same height as your footer */
        box-sizing: border-box;
        position: relative;
    }
</style>


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
@yield('content')
<link rel="icon" href="{{ asset('storage/pictures/clicirclelogo.png') }}" type="image/png">
<!-- Footer -->
{{-- <footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container text-center">
        <span>Copyright &copy; 2024 All rights reserved.</span>
    </div>
</footer> --}}

@yield('scripts')

@include('layout.footer')


