@extends('admin.layouts.master')

@section('content')
<body style="background-color:#f5f5f5;">
    <section class="section">
        <div class="section-header">
            <h1>Submissions for Activity</h1>
        </div>
    </section>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <!-- Report Button at the top right of the table -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div></div> <!-- Placeholder for future left-side content -->
                    <div>
                        <a href="{{ route('activity.createSubmissions', $actId) }}" class="btn btn-primary">Create Submission</a>
                        <a href="{{ route('admin.activity.history.pdf', $actId) }}" class="btn btn-info" target="_blank">Report</a>
                    </div>
                </div>
                
                <!-- Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Submission ID</th>
                            <th scope="col">Activity ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activitySubmits as $submit)
                            <tr>
                                <td>{{ $submit->actSubmitId }}</td>
                                <td>{{ $submit->actId }}</td>
                                <td>{{ $submit->userId }}</td>
                                <td>
                                    <a href="{{ route('activity.editSubmit', $submit->actSubmitId) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('activity.cancelSubmit', $submit->actSubmitId) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete(this)" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
