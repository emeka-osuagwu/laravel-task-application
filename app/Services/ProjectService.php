<?php

namespace App\Services;

use Throwable;
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
        try {
            Project::create($data);
            dd(1);
        } catch (Throwable $th) {
            return [
                "status" => 'successful',
                "response" => [],
                "is_successful" => true
            ];
        }
    }
}
