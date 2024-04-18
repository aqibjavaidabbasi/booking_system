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
            <p>Thank you for reaching out to make changes to your upcoming event booking with us.
                We have received your request to modify the details of your booking. Our team is currently reviewing
                your changes and will confirm them as soon as possible.
                Please note that your event details are subject to availability and our team will do their best to
                accommodate your request.
                If you have any further questions or concerns, please don't hesitate to contact us at
                meetinginfo@book.com.
                Thank you for choosing us for your event needs. We appreciate your understanding and cooperation.
                Best regards</p>
            <p><strong>Ikoninc pvt(Ltd)</strong></p>

        </div>
        <div class="footer">
            This email is automatically generated. Please do not reply.
        </div>
    </div>
</body>

</html>
