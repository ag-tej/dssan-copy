<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback Message | DSSAN</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            margin: auto;
            padding: 2rem;
            background-color: #edf2f7;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            justify-content: center;
            align-items: center;
        }

        .mailBody {
            padding: 1rem;
            background-color: #ffffff;
            border-color: #e8e5ef;
            border-radius: 2px;
            border-width: 1px;
            box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015);
            width: 600px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        p {
            color: #718096;
            font-size: 16px;
            line-height: 1.5em;
        }

        footer {
            font-size: small;
            color: #b0adc5;
        }
    </style>
</head>

<body>
    <img src="{{ asset('images/logo/dssanblue.png') }}" alt="DSSAN" style="height: 4rem;">
    <div class="mailBody">
        <p style="font-size: 18px; font-weight:bold;">Hello DSSAN Team!</p>
        <p>We received a new feedback message from <b>{{ $feedback->full_name }}, {{ $feedback->batch }}</b>.</p>
        <p>"{{ $feedback->message }}"</p>
        <p>To take further actions on this feedback message, kindly login to the <a
                href="{{ config('app.url') . '/login' }}">DSSAN Admin Panel</a>.</p>
        <p style="font-style: italic">This is a system generated message, please do not reply to this email.</p>
        <p>Regards,<br>DSSAN.</p>
    </div>
    <footer>© 2023 DSSAN. All rights reserved.</footer>
</body>

</html>
