@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

            <h1>New Task</h1>


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

            <form class="form-horizontal" role="form" method="POST" action="{{ route('store_task_path') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-fw fa-plus fa-2x"></i></span>
                        <input type="text" class="form-control input-lg" placeholder="What have you got to do...?" name="name"
                               value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-success btn-block btn-flat btn">Add</button>


                </div>
            </form>

        </div>
    </div>

@endsection