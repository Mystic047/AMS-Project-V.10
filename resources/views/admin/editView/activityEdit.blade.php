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
          <h1>เพิ่มข้อมูลกิจกรรม</h1>
        </div>
    </section>
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <form class="row g-3" action="{{ route('activity.update', $activities->activity_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="activity_id" class="form-label">Activity ID</label>
                        <input type="text" class="form-control" id="activity_id" name="activity_id" value="{{ $activities->activity_id }}" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="activity_location" class="form-label">Activity Location</label>
                        <input type="text" class="form-control" id="activity_location" name="activity_location" value="{{ $activities->activity_location }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="activity_name" class="form-label">Activity Name</label>
                        <input type="text" class="form-control" id="activity_name" name="activity_name" value="{{ $activities->activity_name }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="activity_type" class="form-label">Activity Type</label>
                        <input type="text" class="form-control" id="activity_type" name="activity_type" value="{{ $activities->activity_type }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="activity_date" class="form-label">Activity Date</label>
                        <input type="date" class="form-control" id="activity_date" name="activity_date" value="{{ $activities->activity_date }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="activity_responsible_branch" class="form-label">Responsible Branch</label>
                        <input type="text" class="form-control" id="activity_responsible_branch" name="activity_responsible_branch" value="{{ $activities->activity_responsible_branch }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="activity_hour_earned" class="form-label">Activity Hours Earned</label>
                        <input type="text" class="form-control" id="activity_hour_earned" name="activity_hour_earned" value="{{ $activities->activity_hour_earned }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="activity_register_limit" class="form-label">Register Limit</label>
                        <input type="text" class="form-control" id="activity_register_limit" name="activity_register_limit" value="{{ $activities->activity_register_limit }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="activity_detail" class="form-label">Activity Detail</label>
                        <textarea class="form-control" id="activity_detail" name="activity_detail" required>{{ $activities->activity_detail }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="assessment_link" class="form-label">Assessment Link</label>
                        <input type="url" class="form-control" id="assessment_link" name="assessment_link" value="{{ $activities->assessment_link }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="responsible_person" class="form-label">Responsible Person</label>
                        <input type="text" class="form-control" id="responsible_person" name="responsible_person" value="{{ $activities->responsible_person }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        @if ($activities->picture)
                            <img src="{{ asset('storage/' . $activities->picture) }}" alt="Activity Picture" class="img-thumbnail mt-2" width="150">
                        @endif
                    </div>
                    
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update Activity</button>
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
