<?php
use Illuminate\Support\Facades\Route;
use App\Tasks\Models\Task;
use App\Tasks\Http\Controllers\TaskController;

Route::prefix('api/tasks')->group(function () {

    Route::get('index' , [TaskController::class , 'index']);

    Route::middleware(['auth'])->group (function() 
    { 
        Route::post('store' , [TaskController::class , 'store']);

        Route::post('update/{id}' , [TaskController::class , 'update']);
    
        Route::post('complete/{id}' , [TaskController::class , 'complete']);
    });
});






    

