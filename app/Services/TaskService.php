<?php

namespace App\Services;

use Throwable;
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
        return Task::with('project')->orderBy('priority')->get();
    }
    
    /*
    |--------------------------------------------------------------------------
    | create task service
    |--------------------------------------------------------------------------
    */
    public function create($payload)
    {  
        /*
        |--------------------------------------------------------------------------
        | make db request
        |--------------------------------------------------------------------------
        */
        try {
            Task::create($payload);
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
            "response" => [],
            "is_successful" => true
        ];
    }
    
    /*
    |--------------------------------------------------------------------------
    | delete task service
    |--------------------------------------------------------------------------
    */
    public function delete($payload)
    {  
        /*
        |--------------------------------------------------------------------------
        | make db request
        |--------------------------------------------------------------------------
        */
        try {
            Task::find($payload['task_id'])->delete();
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
            "response" => [],
            "is_successful" => true
        ];
    }
}
