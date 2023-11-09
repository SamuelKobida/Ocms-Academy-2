<?php
use Illuminate\Support\Facades\Route;
use App\Tasks\Models\Task;
use App\Tasks\Http\Controllers\TaskController;
use App\Tasks\Http\Middlewares\TaskMiddleware;

Route::prefix('api/tasks')->group(function () {
    Route::get('index' , [TaskController::class , 'index']);

    Route::middleware(['auth'])->group (function() { 
        Route::post('store' , [TaskController::class , 'store']);
    
        Route::middleware([TaskMiddleware::class])->group(function () {
            Route::patch('update/{id}' , [TaskController::class , 'update']);
            Route::post('complete/{id}' , [TaskController::class , 'complete']);
        });
    });
});






    

