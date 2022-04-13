<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library Management System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #DCBE87;
            color: black;
            font-family: 'Helvetica';
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 80px;
        }

        .links>a {
            color: black;
            padding: 0 25px;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        #enterLink {
            font-size: 30px;
            background-color: cyan;
        }

    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">

        @if (Route::has('login') && Auth::check())
        <div class="top-right links">
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        </div>
        @elseif (Route::has('login') && !Auth::check())
        <div class="top-right links">
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
        @endif

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img style="max-width:50%" class="thumbnail-photo" src="library2.png">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="title m-b-md">
                            Library Management System
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="links">
                            <a href="/books" id="enterLink">Enter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
