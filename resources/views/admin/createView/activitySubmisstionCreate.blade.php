@extends('admin.layouts.master')

@section('title', 'Add Submission')

@section('content')
    <body style="background-color:#f5f5f5;">
        <section class="section">
            <div class="section-header">
                <h1>เพิ่มข้อมูลคนลงทะเบียนกิจกรรม</h1>
            </div>
        </section>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <h5>Manually Add Submission</h5>
                    <form action="{{ route('activity.storeSubmission') }}" method="POST">
                        @csrf
                        <input type="hidden" name="actId" value="{{ $activity->actId }}">

                        <div class="mb-3">
                            <label for="userId" class="form-label">เลือกนักศึกษา</label>
                            <!-- Make the select searchable using Select2 -->
                            <select name="userId" class="form-select" id="userId" required>
                                <option value="">เลือกนักศึกษา</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->userId }}">{{ $user->firstName }} {{ $user->lastName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="actName" class="form-label">ชื่อกิจกรรม</label>
                            <input type="text" class="form-control" id="actName" value="{{ $activity->actName }}" disabled>
                        </div>

                        <button type="submit" class="btn btn-primary">เพิ่มคนลงทะเบียน</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('styles')
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <!-- Include Select2 JS and initialize it -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 on the userId select element
            $('#userId').select2({
                placeholder: 'Search for a user',
                allowClear: true
            });
        });
    </script>
@endsection
