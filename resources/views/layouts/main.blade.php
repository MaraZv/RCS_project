<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-family: 'Nunito', sans-serif;
            }
            
            h1 {
                text-align: center;
            }
            h2 {
                margin: 0 auto;
            }
            h5 {
                margin: 0 auto;
            }
            .headerContainer {
                background-color: aquamarine;
                font-size: 26px;
                text-transform: capitalize;
                height: 60px;
                text-align: center;
            }
            a {
                color: black;
            }
            a:hover {
                background-color: #bdbdbd;
                text-decoration: none;
            }
            table {
                text-align: center;
            }
            }
        </style>

        <!-- vai var šai modelí ielikt IFu par autorizétiem lietotájiem un tad redirect neautorizētos uz homepage
        -->
    </head>
    <body>
        <header>
            <div class="headerContainer">
                <div class="links">
                    <a href="{{ url("/login") }}">Home</a>
                    @if ($user_id = null)
                        <a href="">Log In</a>
                    @endif
                    @if ($user_id = session('user'))
                        <a href="{{ url("login.blade") }}">Log out</a>
                    @endif
                    <a href="{{ url("/dashboard") }}">Dashboard</a>
                    <a href="{{ url("/invoices") }}">All invoices</a>
                    <a href="{{ url("/incomes") }}">All income</a>
                    <a href=""></a>
                    <a href=""></a>
                </div>
            </div>
            <h1><b>Your Personal Accountant</b></h1>
        </header>
        
        @yield('content')
    </body>
</html>