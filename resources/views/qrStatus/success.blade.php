<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
</head>
<body>
    @section('content')
    <div class="container">
        <div class="alert alert-success">
            เช็คอินสำเร็จแล้ว!
        </div>
        <a href="{{ route('welcome.home') }}" class="btn btn-primary">กลับสู่หน้าแรก</a>
    </div>
@endsection
</body>
</html>