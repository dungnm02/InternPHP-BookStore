<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #444;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Reset Your Password</h1>
    <p>You have requested to reset your password. Use the OTP below to proceed with resetting your password. This OTP is
        valid for 10 minutes.</p>
    <p><strong>OTP:</strong> {{ $otp }}</p>
    <p>If you did not request a password reset, no further action is required.</p>
</div>
</body>
</html>
