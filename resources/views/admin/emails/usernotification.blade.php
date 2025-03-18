<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Set Your New Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            background: #007BFF;
            color: #fff;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            background: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #666;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            Set Your New Password 🔐
        </div>

        <div class="content">
            <p>Hello <strong>{{ $user->name }}</strong>,</p>
            <p>You have requested to set a new password for your account on <strong>{{ config('app.name') }}</strong>.
            </p>
            <p>Click the button below to set your new password:</p>

            <p style="text-align: center;">
                <a href="{{ url('/set_new_password/' . $user->remember_token) }}" class="btn">Set New Password</a>
            </p>

            <p>If you did not request this, please ignore this email.</p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
        </div>
    </div>

</body>

</html>
