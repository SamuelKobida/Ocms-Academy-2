<?php
use Illuminate\Support\Facades\Route;
use App\TimeEntries\Models\TimeEntry;
use App\TimeEntries\Http\Controllers\TimeEntryController;

Route::prefix('api/timeentries')->group(function () {

    Route::middleware(['auth'])->group (function() 
    { 
        Route::post('start/{id}' , [TimeEntryController::class , 'startTime']);

        Route::post('end/{id}' , [TimeEntryController::class , 'endTime']);

    });
});






    

