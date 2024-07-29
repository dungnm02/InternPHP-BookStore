<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
</head>
<body>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="post" action="{{url('auth/authenticate')}}">
    @csrf
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required/><br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required/><br>
    <button type="submit">Login</button>
</form>
<a href="/auth/register">
    <button>Register</button>
</a><br>
<a href="/auth/reset-password">
    <button>Forgot Password</button>
</a>
</body>
</html>
