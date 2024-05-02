<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    /*
    |--------------------------------------------------------------------------
    | get all task service
    |--------------------------------------------------------------------------
    */
    public function getAll()
    {
        return Task::orderBy('priority')->get();
    }
    
    /*
    |--------------------------------------------------------------------------
    | create task service
    |--------------------------------------------------------------------------
    */
    public function create($data)
    {
        return Task::create($data);
    }
}
