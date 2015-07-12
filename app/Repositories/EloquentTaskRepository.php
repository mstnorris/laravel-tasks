<?php namespace App\Repositories;

use Illuminate\Http\Request;
use App\Task;

class EloquentTaskRepository implements TaskRepository
{
    public function getAll()
    {
        //return Task::with('user')->get();

        return auth()->user()->tasks()->get();
    }

    public function getRemaining()
    {
        return auth()->user()->tasks()->where('completed_at', null)->get();
    }

    public function show($id)
    {
        return Task::find($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Task::create($data);

    }

    public function complete(Request $request)
    {
        $data = $request->all();

        $task = Task::find($data->id);

        $task->completed_at = Carbon::now();

        $task->save();

        return $task;
    }

    public function completed()
    {
        return Task::whereNotNull('completed_at')->get();
    }

    public function delete(Request $request)
    {
        $data = $request->all();

        Task::find($data->id)->destroy();

        return;
    }

    public function deleted()
    {
        return Task::onlyTrashed()->get();
    }

    public function restore(Request $request)
    {
        $data = $request->all();

        $task = Task::withTrashed()->find($data->id)->restore();

        return $task;
    }
}
