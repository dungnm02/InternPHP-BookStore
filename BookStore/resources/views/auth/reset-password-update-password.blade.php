<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('/css/auth-master.css') }}">
</head>
<body>
<div>
    <form action="{{ route('reset-password-update-password.post') }}" method="POST">
        @csrf
        <h1>Update Password</h1>
        @if($errors->has('password'))
            <div class="error">{{$errors->first('password')}}</div>
        @endif
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="password_confirmation">Confirm New Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <button type="submit">Update Password</button>
    </form>
</div>
</body>
</html>
