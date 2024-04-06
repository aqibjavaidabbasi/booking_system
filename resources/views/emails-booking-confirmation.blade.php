<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>

<body>
    <p>Booking Info,</p>

    <p>Your time slot has been booked successfully.</p>

    <p>Your booking details:</p>
    <ul>
        <li><strong>Start Time:</strong> {{ $booking->start_time }}</li>
        <li><strong>End Time:</strong> {{ $booking->end_time }}</li>
    </ul>

    <p>The link will be sent when the slot has been approved.</p>

    <p>Thank you!</p>
</body>

</html>
