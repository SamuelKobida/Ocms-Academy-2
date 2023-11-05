<?php
use Illuminate\Support\Facades\Route;
use App\TimeEntries\Models\TimeEntry;
use App\TimeEntries\Http\Controllers\TimeEntryController;

Route::prefix('api/timeentries')->group(function () {

    Route::get('index' , [TimeEntryController::class , 'index']);

    Route::middleware(['auth'])->group (function() 
    { 
        Route::post('store' , [TimeEntryController::class , 'store']);

        Route::post('update/{id}' , [TimeEntryController::class , 'update']);
    
        Route::post('complete/{id}' , [TimeEntryController::class , 'complete']);
    });
});






    

