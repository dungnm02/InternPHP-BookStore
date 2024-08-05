<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/auth-master.css') }}">
</head>
<body>
<form method="post" action="{{route('register.post')}}">
    @csrf
    <h1>Register</h1>
    <label for="fullName">Full name</label>
    <input type="text" id="fullName" name="full_name" required/>
    @if($errors->has('username'))
        <div class="error">{{$errors->first('full_name')}}</div>
    @endif
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required/>
    @if($errors->has('email'))
        <div class="error">{{$errors->first('email')}}</div>
    @endif
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required/>
    <label for="dob">Date of birth</label>
    <input type="date" id="dob" name="dob" min="1900-01-01" required/>
    @if($errors->has('phone_number'))
        <div class="error">{{$errors->first('phone_number')}}</div>
    @endif
    <label for="phoneNumber">Phone number</label>
    <input type="tel" id="phoneNumber" name="phone_number" required/>
    @if($errors->has('password'))
        <div class="error">{{$errors->first('password')}}</div>
    @endif
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required/>
    <label for="password_confirmation">Password Confirmation</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required/>
    <div id="form-link-container">
        <a href="{{route('login.get')}}">Login</a>
        <a href="{{route('reset-password.get')}}">Reset Password</a>
    </div>
    <button type="submit">Register</button>
</form>
</body>
</html>
