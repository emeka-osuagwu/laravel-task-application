<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Games
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\V1\Tasks\GetAllTask;

/*
|--------------------------------------------------------------------------
| Task Route
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/'], function () {
    Route::get('tasks', GetAllTask::class);
    Route::put('tasks', GetAllTask::class)->name('tasks.update');
    Route::put('delete', GetAllTask::class)->name('tasks.delete');
    Route::post('tasks', GetAllTask::class)->name('tasks.create');
});

/*
|--------------------------------------------------------------------------
| Project Route
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/'], function () {
    Route::post('projects', GetAllTask::class)->name('projects');
});