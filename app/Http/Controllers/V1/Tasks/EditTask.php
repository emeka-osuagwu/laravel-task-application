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

class EditTask extends Controller
{
    public function __construct
    (
        protected TaskService $taskService,
        protected ProjectService $projectService
    ){}

    public function __invoke(Request $request, $task_id)
    {
        /*
        |--------------------------------------------------------------------------
        | create task service
        |--------------------------------------------------------------------------
        */
        $find_task_response = $this->taskService->findWhere('id', $task_id);

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
        $task = $find_task_response['response'][0];
        return view('tasks.edit', compact('task'));
    }
}
