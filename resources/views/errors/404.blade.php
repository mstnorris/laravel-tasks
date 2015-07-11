<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">

    <title>Hawksmoor</title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    <style>
        body {
            font-family: "HelveticaNeueLight", "HelveticaNeue-Light", "Helvetica Neue Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Helvetica", "Tahoma", "Geneva", "Arial", sans-serif;
            font-weight: 200;
            width: 100%;
            height: 100%;
        }

        html {
            width: 100%;
            height: 100%;
        }

        .intro {
            display: table;
            width: 100%;
            height: 100%;
            text-align: center;
        }

        .intro-body {
            display: table-cell;
            vertical-align: middle;
        }

        h1.brand-heading {
            animation-duration: 5s;
            animation-delay: 1s;
            -webkit-animation-duration: 5s;
            -webkit-animation-delay: 1s;
        }

        p.intro-text {
            animation-duration: 5s;
            animation-delay: 5s;
            -webkit-animation-duration: 5s;
            -webkit-animation-delay: 5s;
        }

        h1.error-heading {
            animation-duration: 2s;
            animation-delay: 0s;
            -webkit-animation-duration: 2s;
            -webkit-animation-delay: 0s;
        }

        p.error-text {
            animation-duration: 2s;
            animation-delay: 2s;
            -webkit-animation-duration: 2s;
            -webkit-animation-delay: 2s;
        }

        a.error-button {
            animation-duration: 2s;
            animation-delay: 2s;
            -webkit-animation-duration: 2s;
            -webkit-animation-delay: 2s;
        }

        .brand-heading {
            font-size: 48px;
        }

        .intro-text {
            font-size: 16px;
        }

        @media(min-width:768px) {
            .brand-heading,
            .error-heading {
                font-size: 96px;
            }

            .intro-text,
            .error-text {
                font-size: 32px;
            }
        }

        @media(min-width:992px) {

            .brand-heading,
            .error-heading {
                font-size: 144px;
            }

            .intro-text,
            .error-text {
                font-size: 48px;
            }

        }

        @media(min-width:1200px) {

            .brand-heading,
            .error-heading {
                font-size: 192px;
            }

            .intro-text,
            .error-text {
                font-size: 64px;
            }

        }
    </style>

</head>

<body>

<section class="intro">

    <div class="intro-body">

        <div class="container">

            <div class="row">

                <div class="col-sm-10 col-sm-offset-1">

                    <h1 class="error-heading animated shake">Oops</h1>

                    <p class="error-text animated fadeIn">It looks like we've dropped the ball there. That page can't be found.</p>

                </div>

            </div>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-2 col-xs-6">
                    <a href="/" class="error-button btn btn-block btn-primary animated fadeIn"><i class="fa fa-fw fa-arrow-left"></i> Go back</a>
                </div>
                <div class="col-sm-4 col-xs-6">
                    <a href="/" class="error-button btn btn-block btn-primary animated fadeIn"><i class="fa fa-fw fa-home"></i> Go to the homepage</a>
                </div>
            </div>

        </div>

    </div>

</section>

</body>

</html>