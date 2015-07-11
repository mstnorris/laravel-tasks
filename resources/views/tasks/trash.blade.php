@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

            <h1><i class="fa fa-fw fa-trash"></i> Trash</h1>
            @foreach ( $tasks as $task )

                <ul class="list-group">
                    <li class="list-group-item">
                        {{ $task->name }}
                        <span class="pull-right">
                            Deleted {{ $task->deleted_at->diffForHumans() }}
                        </span>
                    </li>
                </ul>

            @endforeach
        </div></div>

@endsection