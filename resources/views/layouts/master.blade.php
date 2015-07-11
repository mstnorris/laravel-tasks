<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Laravel Tasks</title>
    <meta name="description"
          content="Tvrtle is a software design and engineering studio, we design and develop only the best. We're based in Hove, UK.">
    <meta name="keywords"
          content="Tvrtle, Michael, Norris, engineer, software, entrepreneur, designer, photographer, developer, web, css, html, js, laravel, laracasts">
    <meta name="author" content="Michael Norris">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    @yield('header')

</head>
<body>

<div class="container-fluid">
    @include('layouts.partials._navigation')

    @yield('content')

</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <p class="text-muted">Copyright &copy; {{ date('Y') }} Laravel Tasks. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ elixir('js/all.js') }}"></script>

@yield('footer')

</body>
</html>