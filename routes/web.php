<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Games
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\V1\Tasks\EditTask;
use App\Http\Controllers\V1\Tasks\DeleteTask;
use App\Http\Controllers\V1\Tasks\GetAllTask;
use App\Http\Controllers\V1\Tasks\UpdateTask;
use App\Http\Controllers\V1\Tasks\TaskCreate;

/*
|--------------------------------------------------------------------------
| Task Route
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/'], function () {
    Route::get('/', GetAllTask::class);
    Route::get('tasks', GetAllTask::class)->name('tasks.index');
    Route::put('tasks', UpdateTask::class)->name('tasks.update');
    Route::post('tasks', TaskCreate::class)->name('tasks.create');
    Route::delete('delete', DeleteTask::class)->name('tasks.delete');
});