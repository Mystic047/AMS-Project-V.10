@extends('admin.layouts.master')

@section('content')
<body style="background-color:#f5f5f5;">
    <section class="section">
        <div class="section-header">
            <h1>Edit Submission</h1>
        </div>
    </section>

    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <form action="{{ route('activity.updateSubmit', $activitySubmit->actSubmitId) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="userId" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userId" name="userId" value="{{ $activitySubmit->userId }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="actId" class="form-label">Activity ID</label>
                        <input type="text" class="form-control" id="actId" name="actId" value="{{ $activitySubmit->actId }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="statusCheckInMorning" class="form-label">Status Check-In Morning</label>
                        <input type="checkbox" id="statusCheckInMorning" name="statusCheckInMorning" value="1" {{ $activitySubmit->statusCheckInMorning ? 'checked' : '' }}>
                    </div>

                    <div class="mb-3">
                        <label for="statusCheckInAfternoon" class="form-label">Status Check-In Afternoon</label>
                        <input type="checkbox" id="statusCheckInAfternoon" name="statusCheckInAfternoon" value="1" {{ $activitySubmit->statusCheckInAfternoon ? 'checked' : '' }}>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $activitySubmit->status }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Submission</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
