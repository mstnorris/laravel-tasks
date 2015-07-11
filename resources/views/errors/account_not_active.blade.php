<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">

    <title>Tvrtle</title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

    <style>
        body {

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

        p.status-icon {
            animation-duration: 5s;
            animation-delay: 0s;
            -webkit-animation-duration: 5s;
            -webkit-animation-delay: 0s;
        }

        p.status-heading,
        p.status-message {
            animation-duration: 3s;
            animation-delay: 2s;
            -webkit-animation-duration: 3s;
            -webkit-animation-delay: 2s;
        }

        .status-icon {
            font-size: 96px;
        }

        .status-heading {
            font-size: 32px;
        }

        .status-message {
            font-size: 16px;
        }


        .container {
            max-width: 480px;
        }

        @media(min-width:768px) {
            .status-icon {
                font-size: 144px;
            }

            .status-heading {
                font-size: 48px;
            }
            .status-message {
                font-size: 24px;
            }

            .container {
                max-width: 640px;
            }
        }

        @media(min-width:992px) {

            .status-icon {
                font-size: 192px;
            }

            .status-heading {
                font-size: 64px;
            }

            .status-message {
                font-size: 32px;
            }

            .container {
                max-width: 768px;
            }

        }
    </style>

</head>

<body>

<section class="account-status">

    <div class="account-status-body">

        <div class="container">

            <p class="status-icon animated infinite pulse"><i class='fa fa-lock'></i></p>

            <p class="status-heading animated fadeIn">Account Not Active</p>

            <p class="status-message animated fadeIn text-justify">
                Please have send an email to <a href="mailto:mike@tvrtle.com">mike@tvrtle.com</a>
                from your address {{ $email }} so that we can sort it out.
            </p>

        </div>

    </div>

</section>

</body>

</html>