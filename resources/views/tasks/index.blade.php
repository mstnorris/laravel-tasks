@extends('layouts.master')

@section('header')
    <meta id="token" name="token" value="{!! csrf_token() !!}">

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

    <div id="tasks">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                <h1><i class="fa fa-fw fa-tasks"></i> All Tasks</h1>


                <form method="POST" v-on="submit: onSubmitForm">

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="task_name" id="task_name" class="form-control"
                                   v-model="newTask.task_name" placeholder="" autocomplete="off" autofocus>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" v-attr="disabled: errors" type="submit"><i class="fa fa-fw fa-plus"></i></button>
                            </span>
                        </div>

                    </div>

                    {{--<div class="alert alert-success animated fadeIn" v-if="submitted">Thanks!</div>--}}

                </form>

                <hr/>

                <ul class="list-group">
                    {{--// | filterBy newTask.task_name--}}
                    <li class="list-group-item" v-repeat="tasks">
                        @{{ task_name }}
                        {{--<span class="pull-right">Added @{{ task_name }} <i class="fa fa-fw fa-circle-thin"></i></span>--}}
                    </li>
                    <li class="list-group-item list-group-item-success" v-show="newTask.task_name">
                        @{{ newTask.task_name }}
                        <span class="badge alert-success">New</span>
                    </li>
                </ul>
                {{--<pre>@{{ $data | json }}</pre>--}}
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

                newTask: {
                    task_name: ''
                },

                submitted: false
            },

            computed: {
                errors: function () {
                    for (var key in this.newTask) {
                        if (!this.newTask[key]) return true;
                    }

                    return false;
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
                }
            }
        });
    </script>

@endsection