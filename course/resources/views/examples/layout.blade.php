<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Curso de Laravel 5')</title>
    <style>
        img{
            width: 35%;
            border-radius: 50%;
            margin-top: 50px;
        }

        *{
            font-family:Calibri;
            text-align: center;
            background: #ff5050;
            color: white;
        }

        h1{
            font-size: 3.5em;
        }

        p{
            margin-top: 100px;
            font-size: 1.6em;
            margin-bottom: 150px;
        }
        
        .buttom{
            margin-top: 50px;
            margin-bottom: 50px;
        }
        
    </style>
</head>
<body>

    @yield('content')

    <hr>
    <p class="buttom">http://dulio.me</p>
</body>
</html>