@extends('loyout')
@section('content')
    
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<div align="center">
<form method="post" action="{{route('login.auth')}}" >
    @csrf
    @error('email')
    <p>{{$message}}</p>
    @enderror
    <input type="email" name="email" value="stanislav.rosinskyy@gmail.com"> <br>
    @error('password')
    <p>{{$message}}</p>
    @enderror
    <input type="password" name="password" value="stanislav"><br>
    <input type="submit" name="send" value="Send">

</form>
</div>
</body>
</html>
@endsection
