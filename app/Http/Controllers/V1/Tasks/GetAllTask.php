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
use App\Http\Controllers\Controller;

class GetAllTask extends Controller
{
    public function __construct
    (
        protected TaskService $taskService
    ){}

    public function __invoke()
    {
        $tasks = $this->taskService->getAll();
        return view('tasks.index', compact('tasks'));
        return [];
    }
}
