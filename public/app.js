Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({

    el: '#tasks',

    data: {
        tasks: [],

        //newTask: '',

        filters: {
            inProcess: function(task) {
                return ! task.completed;
            },

            completed: function(task) {
                return task.completed;
            }
        },

        newTask: {
            task_name: ''
        },

        submitted: false
    },

    computed: {
        completions: function() {
            return this.tasks.filter(this.filters.completed);
        },

        remaining: function() {
            return this.tasks.filter(this.filters.inProcess);
        },

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
        },

        deleteAll: function() {
            this.tasks = null;
        },

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