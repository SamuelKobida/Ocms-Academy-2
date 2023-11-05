<?php
use Illuminate\Support\Facades\Route;
use App\Projects\Models\Project;

    Route::middleware(['auth'])->group (function() 
    {    
        Route::get('projects', function () {
            return Project::all();
        });
    });






    

