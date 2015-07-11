<?php

namespace App\Http\Controllers\API;

use App\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Repositories\TaskRepository;
use Vinkla\Hashids\Facades\Hashids;

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
        return $this->repository->getAll();
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
        $task = Task::create([
            'name' => $request->name()
        ]);
        //$data              = $request->all();
        //$client            = Task::create($data);
        //$client->client_id = Hashids::connection('client_id')->encode($client->id);
        //$client->save();

        return $task;
    }
}
