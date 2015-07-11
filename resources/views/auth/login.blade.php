@extends('layouts.master')

@section('header')
    <style>
        #bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: #FFF;
            background-size: cover !important;
        }

        h1.heading {
            font-size: 9em;
            color: #2980b9;
            margin: 1em 0 0.5em;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div
            class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <h1 class="heading text-center">Sign in</h1>


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal form-signin" role="form" method="POST" action="{{ route('login_path') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-fw fa-at fa-2x"></i></span>
                        <input type="email" class="form-control input-lg" placeholder="name@example.com" name="email"
                               value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-fw fa-lock fa-2x"></i></span>
                        <input type="password" class="form-control input-lg" placeholder="password" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox pull-left">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <span class="pull-right"><a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your
                            Password?</a></span>
                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-primary btn-block btn-flat btn">Sign in</button>


                </div>
            </form>

        </div>
    </div>
@endsection