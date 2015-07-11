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
            /*font-family: "HelveticaNeueLight", "HelveticaNeue-Light", "Helvetica Neue Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Helvetica", "Tahoma", "Geneva", "Arial", sans-serif;*/
            color: #2980b9;
            font-weight: 200;
            width: 100%;
            height: 100%;
        }

        html {
            width: 100%;
            height: 100%;
        }

        section.account-status {
            display: table;
            width: 100%;
            height: 100%;
            text-align: center;
        }

        section.account-status div.account-status-body {
            display: table-cell;
            vertical-align: middle;
        }

        div.status-icon p {
            animation-duration: 2s;
            animation-delay: 0s;
            -webkit-animation-duration: 2s;
            -webkit-animation-delay: 0s;
        }

        div.status-heading,
        div.status-message p {
            animation-duration: 3s;
            animation-delay: 2s;
            -webkit-animation-duration: 3s;
            -webkit-animation-delay: 2s;
        }

        div.status-icon p {
            font-size: 96px;
        }

        div.status-heading p {
            font-size: 32px;
        }

        div.status-message p {
            font-size: 16px;
        }

        @media (min-width: 768px) {
            div.status-icon p {
                font-size: 144px;
            }

            div.status-heading p {
                font-size: 48px;
            }

            div.status-message p {
                font-size: 24px;
            }
        }

        @media (min-width: 992px) {

            div.status-icon p {
                font-size: 192px;
            }

            div.status-heading p {
                font-size: 64px;
            }

            div.status-message p {
                font-size: 32px;
            }

        }
    </style>

</head>

<body>

<section class="account-status">

    <div class="account-status-body">

        <div class="container">

            {{--@if ( $statusIcon )--}}
            {{--<p class="status-icon animated infinite pulse"><i class='fa fa-{{ $statusIcon }}'></i></p>--}}
            {{--@endif--}}

            {{--@if ( $statusHeading )--}}
            {{--<p class="status-heading animated fadeIn">{!! $statusHeading !!}</p>--}}
            {{--@endif--}}

            {{--@if ( $statusMessage )--}}
            {{--<p class="status-message animated fadeIn">{!! $statusMessage !!}</p>--}}
            {{--@endif--}}
            <div class="status-icon">
                <p class="animated infinite pulse"><i class='fa fa-lock'></i></p>
            </div>

            <div class="status-heading">
                <p class="animated fadeIn">Account Not Verified</p>
            </div>

            <div class="status-messageanimated fadeIn">

                <form action="{{ action('UsersController@sendVerificationEmail') }}" method="POST">
                    {!! csrf_field() !!}
                    <button class="btn btn-primary">Resend Verification Email</button>
                </form>

            </div>

        </div>

    </div>

</section>

</body>

</html>