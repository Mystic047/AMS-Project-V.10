<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2> you have login</h2>
    @if(Auth::check())
    <p>Welcome, {{ Auth::user()->name }}</p>
    <p> Email , {{ Auth::user()->email }} </p>
@else
    <p>Welcome, Guest</p>
@endif

<form method="POST" action="{{ route('login.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>