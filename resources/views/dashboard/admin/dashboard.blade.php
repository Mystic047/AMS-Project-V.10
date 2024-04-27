<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Admin Dashboard</h1>

    @if(Auth::guard('admin')->check())
    <p>Welcome Admin, {{ Auth::guard('admin')->user()->name }}</p>
    <p>Login by Email , {{ Auth::guard('admin')->user()->email }} </p>
@else
    <p>Welcome, Guest</p>
@endif

<form method="POST" action="{{ route('login.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>