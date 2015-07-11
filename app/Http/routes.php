<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

get('/', function () {
    return view('pages.about');
});

/*
 * Public Static Page Routes
 */


get('login', ['as' => 'login_path', 'uses' => 'Auth\AuthController@getLogin']);
post('login', ['as' => 'login_path', 'uses' => 'Auth\AuthController@postLogin']);
get('logout', ['as' => 'logout_path', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
get('register', ['as' => 'register_path', 'uses' => 'Auth\AuthController@getRegister']);
post('register', ['as' => 'register_path', 'uses' => 'Auth\AuthController@postRegister']);

get('completed', ['as' => 'completed_path', 'uses' => 'TasksController@completed']);
get('trash', ['as' => 'deleted_path', 'uses' => 'TasksController@trash']);

post('tasks/{id}/complete', ['as' => 'complete_task_path', 'uses' => 'TasksController@complete']);
delete('tasks/{id}/delete', ['as' => 'delete_task_path', 'uses' => 'TasksController@destroy']);

resource('tasks', 'TasksController', ['names' => ['create' => 'add_task_path', 'store' => 'store_task_path']]);
