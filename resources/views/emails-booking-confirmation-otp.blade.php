<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .content {
            padding: 20px;
        }

        .content p {
            margin-bottom: 15px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Booking Confirmation</h2>
        </div>
        <div class="content">
            <h2>Dear {{ $user->name }},</h2>
            <p>Thank you for your recent action regarding your event booking with us. To verify your identity and ensure
                the security of your account, please use the following one-time</p>
            <p style="text-align: center;"><strong>{{ $otp }}</strong></p>
            <p>Please enter this OTP on the respective page to confirm your action. If you did not initiate this action
                or have any concerns regarding your account security, please contact us immediately at
                meetinginfo@book.com. Thank you for your cooperation. Best regards,</p>
            <p><strong>Company Name (here)</strong></p>
        </div>
        <div class="footer">
            This email is automatically generated. Please do not reply.
        </div>
    </div>
</body>

</html>
