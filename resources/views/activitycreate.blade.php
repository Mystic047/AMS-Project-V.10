<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Activity</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

@extends('layout.master')
@section('content')

<body>

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      Add New Activity
    </div>
    <div class="card-body">
      <form enctype="multipart/form-data">
        <!-- Image Upload -->
        <div class="mb-3">
          <label for="activityImage" class="form-label">Activity Image</label>
          <input class="form-control" type="file" id="activityImage" name="activityImage">
        </div>

        <!-- Activity ID -->
        <div class="mb-3">
          <label for="activityId" class="form-label">Activity ID</label>
          <input type="text" class="form-control" id="activityId" name="activity_id" required>
        </div>

        <!-- Activity Name -->
        <div class="mb-3">
          <label for="activityName" class="form-label">Activity Name</label>
          <input type="text" class="form-control" id="activityName" name="activity_name" required>
        </div>

        <!-- Activity Type -->
        <div class="mb-3">
          <label for="activityType" class="form-label">Activity Type</label>
          <input type="text" class="form-control" id="activityType" name="activity_type" required>
        </div>

        <!-- Activity Date -->
        <div class="mb-3">
          <label for="activityDate" class="form-label">Activity Date</label>
          <input type="date" class="form-control" id="activityDate" name="activity_date" required>
        </div>

        <!-- Activity Responsible Branch -->
        <div class="mb-3">
          <label for="activityResponsibleBranch" class="form-label">Responsible Branch</label>
          <input type="text" class="form-control" id="activityResponsibleBranch" name="activity_reponsible_branch" required>
        </div>

        <!-- Latitude -->
        <div class="mb-3">
          <label for="latitude" class="form-label">Latitude</label>
          <input type="text" class="form-control" id="latitude" name="latitude" required>
        </div>

        <!-- Longitude -->
        <div class="mb-3">
          <label for="longitude" class="form-label">Longitude</label>
          <input type="text" class="form-control" id="longitude" name="longitude" required>
        </div>

        <!-- Activity Hour Earned -->
        <div class="mb-3">
          <label for="activityHourEarned" class="form-label">Hour Earned</label>
          <input type="text" class="form-control" id="activityHourEarned" name="activity_hour_earned" required>
        </div>

        <!-- Activity Register Limit -->
        <div class="mb-3">
          <label for="activityRegisterLimit" class="form-label">Register Limit</label>
          <input type="text" class="form-control" id="activityRegisterLimit" name="activity_register_limit" required>
        </div>

        <!-- Activity Detail -->
        <div class="mb-3">
          <label for="activityDetail" class="form-label">Activity Detail</label>
          <textarea class="form-control" id="activityDetail" name="activity_detail" rows="3" required></textarea>
        </div>

        <!-- Assessment Link -->
        <div class="mb-3">
          <label for="assessmentLink" class="form-label">Assessment Link</label>
          <input type="text" class="form-control" id="assessmentLink" name="assentment_link">
        </div>

        <!-- Professors ID -->
        <div class="mb-3">
          <label for="professorsId" class="form-label">Professors ID</label>
          <input type="text" class="form-control" id="professorsId" name="professors_id" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
</body>
@endsection
</html>
