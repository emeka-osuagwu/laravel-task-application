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
use App\Http\Requests\CreateTaskRequest;

class TaskCreate extends Controller
{
    public function __construct
    (
        protected TaskService $taskService,
        protected ProjectService $projectService
    ){}

    public function __invoke(CreateTaskRequest $request)
    {
        /*
        |--------------------------------------------------------------------------
        | create task service
        |--------------------------------------------------------------------------
        */
        $create_task_response = $this->taskService->create($request->validated());
            
        /*
        |--------------------------------------------------------------------------
        | check if request failed
        |--------------------------------------------------------------------------
        */
        if(!$create_task_response['is_successful']){
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
