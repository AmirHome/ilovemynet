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

            <div class="content">
                <div class="title m-b-md">
                    MyNet Test by
                </div>

                <blockquote>Admin Panel Authentication</blockquote>
                <blockquote>Laravel PHP Framework</blockquote>
                <blockquote>Eloquent ORM</blockquote>
                <blockquote>SQLite ver 3</blockquote>
                <blockquote>Cache File</blockquote>
                <blockquote>REST FULL</blockquote>
                <blockquote>Bootstrap Front-end framework</blockquote>
                <blockquote>jQuery Front-end framework</blockquote>
                <blockquote>DataTables plug-in</blockquote>
                <blockquote>GulpJs for minify css, js</blockquote>
                <blockquote>Version Controle GitHub</blockquote>
            </div>

        </div>
    </body>
</html>
