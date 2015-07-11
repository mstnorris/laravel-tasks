<?php namespace App\Repositories;

use Illuminate\Http\Request;

interface TaskRepository
{
    public function getAll();

    public function show($id);

    public function store(Request $request);
}