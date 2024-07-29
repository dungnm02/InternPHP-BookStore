<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<h1>Register</h1>
<form method="post" action="{{url('auth/register')}}">
    @csrf
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required/><br>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required/><br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required/><br>
    <label for="password_confirmation">Password Confirmation</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required/><br>
    <button type="submit">Register</button>
</form>
</body>
</html>
