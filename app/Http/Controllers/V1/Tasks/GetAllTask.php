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

class GetAllTask extends Controller
{
    public function __construct
    (
        protected TaskService $taskService,
        protected ProjectService $projectService
    ){}

    /*
    |--------------------------------------------------------------------------
    | GetAllTask
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | fetch all project
        |--------------------------------------------------------------------------
        */
        $fetch_projects_response = $this->projectService->getAll();
        
        /*
        |--------------------------------------------------------------------------
        | fetch all task
        |--------------------------------------------------------------------------
        */
        if($request->has('project')){
            $find_task_response = $this->taskService->findWhere('project_id', $request->project);
        }
        else {
            $find_task_response = $this->taskService->getAll();
        }
        
        /*
        |--------------------------------------------------------------------------
        | send response
        |--------------------------------------------------------------------------
        */
        $tasks = $find_task_response['response'];
        $projects = $fetch_projects_response['response'];
        return view('tasks.index', compact('tasks', 'projects'));
    }
}
