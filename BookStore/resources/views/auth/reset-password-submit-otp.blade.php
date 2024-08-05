<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit OTP</title>
    <link rel="stylesheet" href="{{ asset('/css/auth-master.css') }}">
</head>
<body>
<div>
    <form action="{{route('reset-password-check-otp.post')}}" method="POST">
        @csrf
        <h1>OTP Verification for {{ session('email') }}</h1>
        @if(session('message'))
            <div class="message">{{ session('message') }}</div>
        @endif
        <label for="otp">OTP:</label>
        <input type="text" id="otp" name="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</div>
</body>
</html>
