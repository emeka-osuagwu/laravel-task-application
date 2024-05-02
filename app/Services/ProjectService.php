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
        /*
        |--------------------------------------------------------------------------
        | make db request
        |--------------------------------------------------------------------------
        */
        try {
            $response = Project::orderBy('priority')->get();
        } catch (Throwable $exception) {
            // TODO -> cloudwatch or slack log can be fired here
            return [
                "status" => 'failed',
                "response" => $exception->getMessage(),
                "is_successful" => false
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | return successful response
        |--------------------------------------------------------------------------
        */
        return [
            "status" => 'successful',
            "response" => $response,
            "is_successful" => true
        ];
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
        } catch (Throwable $th) {
            return [
                "status" => 'successful',
                "response" => [],
                "is_successful" => true
            ];
        }
    }
}
