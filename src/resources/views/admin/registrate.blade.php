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
<form method="post" action="{{route('registrate.auth')}}">
    @csrf
    @error('name')
    <p>{{$message}}</p>
    @enderror
    <input type="tetx" name="name" value="stanislav"> <br>
    @error('email')
    <p>{{$message}}</p>
    @enderror
    <input type="email" name="email" value="stanislavy@gmail.com"> <br>
    @error('password')
    <p>{{$message}}</p>
    @enderror
    <input type="password" name="password" value="stanislav"><br>
    <input type="submit" name="send" value="Send">

</form>
</body>
</html>
