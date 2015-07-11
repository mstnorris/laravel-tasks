<?php namespace App\Repositories;

use App\User;

class EloquentUserRepository implements UserRepository
{
    public function getAll()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }
}