<?php namespace App\Repositories;

use Illuminate\Http\Request;
use App\Task;

class EloquentTaskRepository implements TaskRepository
{
    public function getAll()
    {
        return Task::with('user')->get();
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
}
