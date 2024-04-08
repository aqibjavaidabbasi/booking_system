<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>

<body>
    <p>Status Info,</p>

    <p>Your status details:</p>
    <ul>
        <li><strong>
                {{ $status }}

            </strong> your code is: {{ $user->auth_code }}</li>

    </ul>
    <p>here is the link you can book meeting now <a
            href="http://127.0.0.1:8000/booking/{{ $user->auth_code }}">{{ env('APP_URL') }}/booking/{{ $user->auth_code }}</a>
    </p>

    </p>

    <p>The link will be sent when the slot has been approved.</p>

    <p>Thank you!</p>
</body>

</html>
