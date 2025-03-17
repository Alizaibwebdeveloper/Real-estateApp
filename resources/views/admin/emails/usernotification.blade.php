<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Platform</title>
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
            Welcome to {{ config('app.name') }} 🎉
        </div>

        <div class="content">
            <p>Hello <strong>{{ $user->name }}</strong>,</p>
            <p>Thank you for registering with <strong>{{ config('app.name') }}</strong>! We are excited to have you on
                board.</p>
            <p>You can log in to your account using the button below:</p>

            <p style="text-align: center;">
                <a href="{{ url('/admin/login') }}" class="btn">Login to Your Account</a>
            </p>

            <p>If you did not create an account, please ignore this email.</p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
        </div>
    </div>

</body>

</html>
