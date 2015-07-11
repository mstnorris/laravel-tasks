@extends('layouts.master')

@section('header')
    <style>
        i.complete:hover {
            color: #2ecc71;
        }

        i.delete:hover {
            color: #e74c3c;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

            <h1>All Tasks</h1>

            <ul class="list-group">

                @foreach ( $tasks as $task )

                    <li class="list-group-item">
                        {{ $task->name }}
                        <div class="pull-right">
                            <form action="/tasks/{{ $task->id }}" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-link"><i class="fa fa-fw fa-trash delete"></i></button>
                            </form>
                        </div>

                    </li>

                @endforeach

            </ul>

        </div></div>

@endsection