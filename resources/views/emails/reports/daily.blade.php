<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        .container {
            width: calc(80%);
            margin: 0 auto;
        }

        .head {
            padding: 1rem;
            background: #222222;
            color: white;
        }

        .head .logo {
            text-align: left;
        }

        .head .logo img {
            width: 15rem;
        }

        p {
            padding: 1rem;
            margin-top: 1rem;
        }

        .heading-1 {
            margin-top: 1rem;
            padding-left: 1rem;
            font-weight: 300;
        }

        .btn {
            padding: 0.5rem 2rem;
            color: white;
            background: #1ABC9C;
            border-radius: 3px;
            border: 1px solid #1ABC9C;
        }
    </style>
</head>

<body>
    <div class="head">
        <div class="container">
            <div class="logo">
                <img src="http://dtutimes.dtu.ac.in/images/logo-dark.png" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="heading-1">Daily Report</h1>
        @foreach ($stats as $types)
        <h3>{{ $types }}</h3> <hr>
            @foreach ($types as $item)
                <div>
                    {{ $item->title }}
                </div>
                <hr>
            @endforeach
        @endforeach

    </div>
</body>

</html>