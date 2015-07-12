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

    public function show($id)
    {
        return Task::find($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Task::create($data);

    }

    public function trash()
    {
        return Task::onlyTrashed()->get();
    }

    public function completed()
    {
        return Task::whereNotNull('completed_at')->get();
    }
}
