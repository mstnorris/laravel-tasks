<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('tasks.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        auth()->user()->tasks()->create([
            'name' => $request->get('name')
        ]);

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        $task->destroy();
    }

    public function complete($id)
    {
        $task = Task::find($id);

        $task->completed_at = Carbon::now();

        $task->save();

        return redirect('/tasks');
    }

    public function completed()
    {
        $tasks = Task::where('completed_at', '<=', Carbon::now())->get();

        return view('tasks.completed', compact('tasks'));
    }

    public function trash()
    {
        $tasks = Task::onlyTrashed()->get();

        return view('tasks.trash', compact('tasks'));
    }
}
