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
            margin-top: 20px;
            /* Added margin */
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
            Thank you for submitting your booking request with us. We have received your request for the following time
            slot:
            <ul>
                <li><strong>Start Time:</strong> {{ $booking->start_time }}</li>
                <li><strong>End Time:</strong> {{ $booking->end_time }}</li>
            </ul>
            Please note that your booking is currently pending confirmation. Once your slot is confirmed, you will
            receive a confirmation email with all the necessary details.
            If you need to make any changes to or cancel your booking, please use the following link:
            <a class="button" href="http://127.0.0.1:8000/booking/{{ $user->auth_code }}">Book Now</a>.
            We appreciate your trust in our services and look forward to serving you soon.
            Best regards,
            <p><strong>Ikoninc pvt(Ltd)</strong></p>
        </div>
        <div class="footer">
            This email is automatically generated. Please do not reply.
        </div>
    </div>
</body>

</html>
