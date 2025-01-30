<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notification</title>
    <style>
        .body{
            width: 50%
            background-color: greenyellow;
            border-radius: 20px;
            padding: 20px;
            margin: auto
        }
        .body h1{
            font-size: 25px;
        }
        .body p{
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="body">
        <h1>Dear {{ $data['to'] }},</h1>
        <p>{{ $data['message'] }}</p>
    </div>
    <footer>
        Regards,
    </footer>
</body>
</html>