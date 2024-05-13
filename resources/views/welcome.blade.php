<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Point of Sale System</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
            color: #374151;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background-color: #EF3B2D;
            color: white;
            font-size: 1.2rem;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #DC2626;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome the OQP Point of Sale System</h1>
        <p>Empower your business with our intuitive and efficient Point of Sale solution.</p>
        <a href="{{ route('login') }}" class="button">Log in</a>
        <a href="{{ route('register') }}" class="button">Register</a>
    </div>
</body>

</html>
