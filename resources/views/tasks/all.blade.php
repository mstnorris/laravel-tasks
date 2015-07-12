@extends('layouts.master')

@section('header')
    <link rel="stylesheet" href="/app.css">
@endsection

@section('content')


<div id="tasks">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">


            <!-- The Form to Add a New Task -->
            <form v-on="submit: addTask">

                <div class="input-group">
                    <input v-model="newTask"
                           v-el="newTask"
                           class="form-control"
                           placeholder="I need to...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" v-attr="disabled: errors" type="submit"><i class="fa fa-fw fa-plus"></i></button>
                            </span>
                </div>
                {{----}}
                {{--<div class="form-group">--}}
                    {{--<input v-model="newTask"--}}
                           {{--v-el="newTask"--}}
                           {{--class="form-control"--}}
                           {{--placeholder="I need to...">--}}
                {{--</div>--}}

                {{--<button class="btn btn-primary">--}}
                    {{--Add Task--}}
                {{--</button>--}}

                {{--<button v-on="click: completeAll"--}}
                        {{--class="btn btn-default"--}}
                    {{-->--}}
                    {{--Mark All As Completed?--}}
                {{--</button>--}}
            </form>


            <!-- The List of Todos -->
            <div v-show="remaining.length">
                <h1><i class="fa fa-fw fa-tasks"></i> All Tasks (@{{ remaining.length }})</h1>

                <ol class="list-group">
                    <li v-repeat="task: remaining"
                        class="list-group-item"
                        >
                        <span v-on="dblclick: editTask(task)">@{{ task.body }}</span>

                        <button v-on="click: removeTask(task)" class="delete"><i class="fa fa-fw fa-trash"></i></button>
                        <button v-on="click: toggleTaskCompletion(task)" class="complete"><i class="fa fa-fw fa-check"></i></button>
                    </li>
                </ol>
            </div>


            <!-- The List of Completed Tasks -->
            <div v-if="completions.length">
                <h1><i class="fa fa-fw fa-check"></i> Completed (@{{ completions.length }})</h1>

                <ol class="list-group">
                    <li v-repeat="task: completions"
                        class="list-group-item"
                        >
                        @{{ task.body }}

                        <button v-on="click: toggleTaskCompletion(task)" class="delete"><i class="fa fa-fw fa-times"></i></button>
                    </li>
                </ol>

                <button v-on="click: clearCompleted" class="btn btn-danger">Clear Completed</button>
            </div>

        </div>
    </div>
</div>


@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.11.10/vue.min.js"></script>
    <script src="/app.js"></script>
@endsection