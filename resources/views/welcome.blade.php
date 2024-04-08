<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=figtree:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/dist/img/ISTA.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .header {
            position: fixed;
            top: 0;
            right: 0;
            padding: 20px;
        }

        .header a {
            text-decoration: none;
            color: white;
            margin-left: 20px;
            transition: color 0.3s ease;
        }

        .header a:hover {
            color: #ff0000;
        }

        .content {
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .content.show {
            opacity: 1;
        }

        .title, .subtitle {
            opacity: 0;
        }

        .title.show, .subtitle.show {
            opacity: 1;
            animation: moveUp 5s infinite linear;
        }

        .title {
            font-size: 3rem;
            margin-bottom: 20px;
            color: white;
        }

        .subtitle {
            font-size: 1.5rem;
            color: white;
        }

        @keyframes moveUp {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="header">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <div class="content">
        <h1 class="title">Welcome, Director!</h1>
        <p class="subtitle">Explore ISTA City and manage your department effectively</p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".content").classList.add("show");
            document.querySelector(".title").classList.add("show");
            document.querySelector(".subtitle").classList.add("show");
        });
    </script>
</body>
</html>
