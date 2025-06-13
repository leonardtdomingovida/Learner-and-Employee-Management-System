<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome Email Sender</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="color: #333;">Welcome, {{ $user->name }}!</h2>

        <p>Thank you for registering with us. We're excited to have you on board.</p>

        <p>Your registered email is <strong>{{ $user->email }}</strong>.</p>

        <p>Feel free to explore, and let us know if you have any questions or need assistance.</p>

        <br>
        <p>Kind regards,<br>
        <strong>Leonard T. Domingo</strong><br>
        BSIT-3A</p>
    </div>
</body>
</html>
