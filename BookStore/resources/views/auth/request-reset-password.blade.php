<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password Request</title>
</head>
<body>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="/auth/reset-password" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <button type="submit">Send Password Reset Link</button>
</form>
</body>
</html>
