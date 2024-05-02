<?php

namespace App\Http\Controllers\V1\Tasks;

/*
|--------------------------------------------------------------------------
| Dependency Namespace
|--------------------------------------------------------------------------
*/
use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Services\ProjectService;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteTaskRequest;
use Illuminate\Support\Facades\Validator;

class UpdateTask extends Controller
{
    public function __construct
    (
        protected TaskService $taskService,
        protected ProjectService $projectService
    ){}

    /*
    |--------------------------------------------------------------------------
    | Request Validation
    |--------------------------------------------------------------------------
    */
    public function requestValidation($data)
    {
        return Validator::make($data, [
            "name" => "string|max:20|min:3|nullable",
            "priority" => "numeric|nullable",
            "project_id" => "numeric|nullable",
        ]);
    }
    
    /*
    |--------------------------------------------------------------------------
    | Update Task
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | validate incoming request
        |--------------------------------------------------------------------------
        */
        $validator = $this->requestValidation($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        /*
        |--------------------------------------------------------------------------
        | create task service
        |--------------------------------------------------------------------------
        */
        $find_task_response = $this->taskService->update($request->task_id, $request->only(['priority', 'name', 'project_id']));

        /*
        |--------------------------------------------------------------------------
        | check if request failed
        |--------------------------------------------------------------------------
        */
        if(!$find_task_response['is_successful']){
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the task. Please try again.']);
        }

        /*
        |--------------------------------------------------------------------------
        | redirect back if successful
        |--------------------------------------------------------------------------
        */
        return redirect()->back();
    }
}
