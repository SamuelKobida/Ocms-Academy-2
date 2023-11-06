<?php
use Illuminate\Support\Facades\Route;
use App\Projects\Models\Project;
use App\Projects\Http\Controllers\ProjectController;

Route::prefix('api/projects')->group(function () {

    Route::get('index' , [ProjectController::class , 'index']);

    Route::middleware(['auth'])->group (function() 
    { 
        Route::post('store' , [ProjectController::class , 'store']);

        Route::patch('update/{id}' , [ProjectController::class , 'update']);
    
        Route::post('complete/{id}' , [ProjectController::class , 'complete']);
    });
});






    

