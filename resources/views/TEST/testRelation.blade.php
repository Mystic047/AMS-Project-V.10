<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty and Area Relations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Faculties and Their Areas</h1>
        @if($faculties->isEmpty())
            <p>No faculties found.</p>
        @else
            @foreach($faculties as $faculty)
                <div class="col-md-12 mt-3">
                    <h3>{{ $faculty->facultyName }}</h3>
                    @if($faculty->areas->isEmpty())
                        <p>No areas found for this faculty.</p>
                    @else
                        <ul>
                            @foreach($faculty->areas as $area)
                                <li>{{ $area->areaName }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
