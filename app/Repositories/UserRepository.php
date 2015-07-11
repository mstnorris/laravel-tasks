<?php namespace App\Repositories;

interface UserRepository
{
    public function getAll();

    public function show($id);
}