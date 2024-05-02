<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Games
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\V1\Tasks\EditTask;
use App\Http\Controllers\V1\Tasks\GetAllTask;
use App\Http\Controllers\V1\Tasks\TaskCreate;
use App\Http\Controllers\V1\Tasks\DeleteTask;

/*
|--------------------------------------------------------------------------
| Task Route
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/'], function () {
    Route::get('tasks', GetAllTask::class)->name('tasks.index');
    Route::get('tasks/{task_id}/edit', EditTask::class)->name('tasks.edit');
    Route::put('tasks', GetAllTask::class)->name('tasks.update');
    Route::delete('delete', DeleteTask::class)->name('tasks.delete');
    Route::post('tasks', TaskCreate::class)->name('tasks.create');
});

/*
|--------------------------------------------------------------------------
| Project Route
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/'], function () {
    Route::post('projects', GetAllTask::class)->name('projects');
});