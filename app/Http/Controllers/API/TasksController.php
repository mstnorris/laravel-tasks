<?php

namespace App\Http\Controllers\API;

use App\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Repositories\TaskRepository;

class TasksController extends Controller
{
    /**
     * @var TaskRepository
     */
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->getRemaining();
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function store(CreateTaskRequest $request)
    {
        return $this->createTask($request);
    }

    private function createTask(CreateTaskRequest $request)
    {

        //$task = Task::create([
        //    'task_name' => $request->all()
        //]);

        $task = auth()->user()->tasks()->create([
            'task_name' => $request->get('task_name')
        ]);

        return $task;

        ////$data              = $request->all();
        ////$client            = Task::create($data);
        ////$client->client_id = Hashids::connection('client_id')->encode($client->id);
        ////$client->save();
        //
        //return $task;
    }

    public function completed()
    {
        return $this->repository->completed();
    }

    public function deleted()
    {
        return $this->repository->deleted();
    }
}
