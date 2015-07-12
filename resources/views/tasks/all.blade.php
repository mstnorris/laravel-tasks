@extends('layouts.master')

@section('header')
    <meta id="token" name="token" value="{!! csrf_token() !!}">

    <link rel="stylesheet" href="/app.css">
@endsection

@section('content')
    <div id="tasks">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                <form method="POST" v-on="submit: onSubmitForm">

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="task_name" id="task_name" class="form-control"
                                   v-model="newTask.task_name" placeholder="I need to..." autocomplete="off" autofocus>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" v-attr="disabled: errors" type="submit"><i class="fa fa-fw fa-plus"></i></button>
                            </span>
                        </div>

                    </div>

                    <div class="alert alert-success animated fadeIn" v-if="submitted">Thanks!</div>

                </form>

                <button class="btn btn-success" v-attr="disabled: ! remaining" v-on="click: completeAll"><i class="fa fa-fw fa-check"></i> Complete all Tasks</button>
                <button class="btn btn-danger" v-attr="disabled: ! remaining" v-on="click: deleteAll"><i class="fa fa-fw fa-trash"></i>Delete all Tasks</button>

                <!-- The Form to Add a New Task -->
                {{--<form v-on="submit: addTask">--}}
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
                {{--</form>--}}


                <!-- The List of Todos -->
                <div v-show="remaining.length">
                    <h1>Tasks <span class="pull-right label label-default">@{{ remaining.length }}</span></h1>

                    <ol class="list-group">
                        <li v-repeat="task: remaining"
                            class="list-group-item"
                            >
                            <span v-on="dblclick: editTask(task)">@{{ task.task_name }}</span>

                            <button v-on="click: deleteTask(task)" class="delete"><i class="fa fa-fw fa-trash"></i></button>
                            <button v-on="click: completeTask(task)" class="complete"><i class="fa fa-fw fa-check"></i></button>
                        </li>
                        <li class="list-group-item list-group-item-success" v-show="newTask.task_name">
                            @{{ newTask.task_name }}
                            <span class="badge alert-success">New</span>
                        </li>
                    </ol>
                </div>


                <!-- The List of Completed Tasks -->
                <div v-if="completions.length">
                    <h1>Completed <span class="pull-right label label-success">@{{ completions.length }}</span></h1>

                    <ol class="list-group">
                        <li v-repeat="task: completions"
                            class="list-group-item"
                            >
                            @{{ task.task_name }}

                            <button v-on="click: unCompleteTask(task)" class="undo"><i class="fa fa-fw fa-undo"></i></button>
                        </li>
                    </ol>

                    <button v-on="click: clearCompleted" class="btn btn-danger">Clear Completed</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

        new Vue({

            el: '#tasks',

            data: {
                tasks: [],

//                newTask: '',

                newTask: {
                    task_name: ''
                },

                filters: {
                    inProcess: function(task) {
                        return ! task.completed;
                    },

                    completed: function(task) {
                        return task.completed;
                    },

                    trash: function(task) {
                        return task.deleted;
                    }
                }
            },

            computed: {
                completions: function() {
                    return this.tasks.filter(this.filters.completed);
                },

                remaining: function() {
                    return this.tasks.filter(this.filters.inProcess);
                }
            },

            ready: function () {
                this.fetchTasks();
            },

            methods: {
                fetchTasks: function () {
                    this.$http.get('api/v1/tasks', function (tasks) {
                        this.$set('tasks', tasks);
                    })
                },

                onSubmitForm: function (e) {
                    e.preventDefault();

                    var task = this.newTask;

                    this.tasks.push(task);

                    this.newTask = {task_name: ''};

                    this.submitted = true;

                    task_name.focus();

                    this.$http.post('api/v1/tasks', task);
                },

                addTask: function(e) {
                    e.preventDefault();

                    if ( ! this.newTask) return;

                    this.tasks.push({
                        body: this.newTask,
                        completed: false
                    });

                    this.newTask = '';
                },

                editTask: function(task) {
                    this.removeTask(task);
                    this.newTask = task.body;

                    this.$$.newTask.focus();
                },

//                toggleTaskCompletion: function(task) {
//                    task.completed = ! task.completed;
//                },

                completeTask: function(task) {
                    e.preventDefault();

                    var task = this.newTask;

                    this.tasks.push(task);

                    this.newTask = {task_name: ''};

                    this.submitted = true;

                    task_name.focus();

                    this.$http.post('api/v1/tasks', task);
                },

                completeAll: function() {
                    console.log('button click - complete all tasks');
                    this.tasks.forEach(function(task) {
                        task.completed = true;
                    });
                },

                deleteAll: function() {
                  console.log('button click - delete all tasks');
                },

                clearCompleted: function() {
                    this.tasks = this.tasks.filter(this.filters.inProcess);
                },

                deleteTask: function(task) {
                    this.tasks.$remove(task);

                    //console.log('remove task' + task.task_name);

                    e.preventDefault();

                    var task = this.newTask;

                    this.tasks.push(task);

                    this.newTask = {task_name: ''};

                    this.submitted = true;

                    task_name.focus();

                    this.$http.post('api/v1/tasks', task);
                }
            }

        });
    </script>
@endsection