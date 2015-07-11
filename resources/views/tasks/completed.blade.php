@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

            <h1><i class="fa fa-fw fa-check"></i> Completed Tasks</h1>

            <ul class="list-group">

                @foreach ( $tasks as $task )


                    <li class="list-group-item">
                        {{ $task->name }}
                        <span class="pull-right">
                            Completed {{ $task->completed_at->diffForHumans() }}
                        </span>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>

@endsection