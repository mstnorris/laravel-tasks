@extends('layouts.master')

@section('header')
    <meta id="token" name="token" value="{!! csrf_token() !!}">

    <link rel="stylesheet" href="/app.css">
@endsection

@section('content')
    <div id="tasks">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                <!-- The Form to Add a New Task -->
                <form v-on="submit: addTask">
                    <div class="form-group">
                        <input v-model="newTask"
                               v-el="newTask"
                               class="form-control"
                               placeholder="I need to...">
                    </div>

                    <button class="btn btn-primary">
                        Add Task
                    </button>

                    <button v-on="click: completeAll"
                            class="btn btn-default"
                        >
                        Mark All As Completed?
                    </button>
                </form>


                <!-- The List of Todos -->
                <div v-show="remaining.length">
                    <h1>Tasks (@{{ remaining.length }})</h1>

                    <ol class="list-group">
                        <li v-repeat="task: remaining"
                            class="list-group-item"
                            >
                            <span v-on="dblclick: editTask(task)">@{{ task.task_name }}</span>

                            <button v-on="click: removeTask(task)">&#10007;</button>
                            <button v-on="click: toggleTaskCompletion(task)">&#10004</button>
                        </li>
                    </ol>
                </div>


                <!-- The List of Completed Tasks -->
                <div v-if="completions.length">
                    <h2>Completed (@{{ completions.length }})</h2>

                    <ol class="list-group">
                        <li v-repeat="task: completions"
                            class="list-group-item"
                            >
                            @{{ task.task_name }}

                            <button v-on="click: toggleTaskCompletion(task)">&#10007;</button>
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

                toggleTaskCompletion: function(task) {
                    task.completed = ! task.completed;
                },

                completeAll: function() {
                    this.tasks.forEach(function(task) {
                        task.completed = true;
                    });
                },

                clearCompleted: function() {
                    this.tasks = this.tasks.filter(this.filters.inProcess);
                },

                removeTask: function(task) {
                    this.tasks.$remove(task);
                }
            }

        });
    </script>
@endsection