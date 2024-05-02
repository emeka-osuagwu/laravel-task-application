<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{
    /*
    |--------------------------------------------------------------------------
    | get all project service
    |--------------------------------------------------------------------------
    */
    public function getAll()
    {
        return Project::orderBy('priority')->get();
    }
    
    /*
    |--------------------------------------------------------------------------
    | create project service
    |--------------------------------------------------------------------------
    */
    public function create($data)
    {
        return Project::create($data);
    }
}
