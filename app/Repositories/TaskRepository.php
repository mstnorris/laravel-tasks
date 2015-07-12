<?php namespace App\Repositories;

use Illuminate\Http\Request;

interface TaskRepository
{
    public function getAll();

    public function getRemaining();

    public function show($id);

    public function store(Request $request);

    public function complete(Request $request);

    public function completed();

    public function delete(Request $request);

    public function deleted();

    public function restore(Request $request);
}