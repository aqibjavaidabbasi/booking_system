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

        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
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
            <p><strong>Status Info,</strong></p>
            <p>Your booking details:</p>
            <ul>
                <li><strong>Booking Code:</strong> {{ Crypt::decryptString($user->auth_code) }}</li>
            </ul>
            <p>You can book your meeting using the link below:</p>
            <p><a class="button" href="http://127.0.0.1:8000/booking/{{ $user->auth_code }}">Book Now</a>
            </p>
            <p>Please note that the link will be activated once the slot has been approved.</p>
            <p>Thank you!</p>
        </div>
        <div class="footer">
            This email is automatically generated. Please do not reply.
        </div>
    </div>
</body>

</html>
