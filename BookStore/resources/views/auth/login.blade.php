<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('/css/auth-master.css') }}">
</head>
<body>

<form method="post" action="{{route('login.post')}}">
    @csrf
    <h1>Login</h1>
    {{--message--}}
    @if(session('message'))
        <div class="message">{{ session('message') }}</div>
    @endif
    <label for="emailOrUsername">Email/Username</label>
    <input type="text" id="emailOrUsername" name="emailOrUsername" required/>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required/>
    <div id="form-link-container">
        <a href="{{route('register.get')}}">Register</a>
        <a href="{{route('reset-password.get')}}">Reset Password</a>
    </div>
    <button type="submit">Login</button>
</form>
</body>
</html>
