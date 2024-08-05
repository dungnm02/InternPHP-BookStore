<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password Request</title>
    <link rel="stylesheet" href="{{ asset('/css/auth-master.css') }}">
</head>
<body>
<form action={{route('reset-password.post')}} method="POST">
    @csrf
    <h1>Reset Password</h1>
    @if(session('message'))
        <div class="message">{{ session('message') }}</div>
    @endif
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required><br>
    <button type="submit">Send</button>
</form>
</body>
</html>
