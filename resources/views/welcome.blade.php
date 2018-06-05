<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyNet Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/amirhome_style.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/persons') }}">Admin Panel</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        {{-- <a href="{{ url('/register') }}">Register</a> --}}
                    @endif
                </div>
            @endif

            <div class="contentx">
                <div class="title m-b-md">
                    MyNet Test by
                </div>

                <blockquote> 1.   Admin Panel Authentication</blockquote>
                <blockquote> 2.   Laravel PHP Framework</blockquote>
                <blockquote> 3.   Eloquent ORM</blockquote>
                <blockquote> 4.   SQLite ver 3</blockquote>
                <blockquote> 5.   Cache File</blockquote>
                <blockquote> 6.   REST FULL</blockquote>
                <blockquote> 7.   Bootstrap Front-end framework</blockquote>
                <blockquote> 8.   jQuery Front-end framework</blockquote>
                <blockquote> 9.   DataTables plug-in</blockquote>
                <blockquote>10.   GulpJs for minify css, js</blockquote>
                <blockquote>11.   Version Controle GitHub</blockquote>
                <blockquote>12.   Heroku Publish and Config</blockquote>
            </div>

        </div>
    </body>
</html>
