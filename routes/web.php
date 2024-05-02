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
    Route::post('tasks', GetAllTask::class)->name('tasks.create');
});