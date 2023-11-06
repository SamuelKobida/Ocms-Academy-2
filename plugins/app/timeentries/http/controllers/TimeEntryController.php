<?php
 
namespace App\TimeEntries\Http\Controllers;

use App\TimeEntries\Models\TimeEntry;
use Backend\Classes\Controller;
use App\TimeEntries\Http\Resources\TimeEntryResource;
use App\Tasks\Models\Task;

class TimeEntryController extends Controller
{
    public function startTime($id)
    {
        $task = Task::where('id', $id)->first();
        if (!$task) {
            return "This task does not exist.";
        }
        $timeentry = new TimeEntry();
        $timeentry->task_id = $task->id;
        $timeentry->start_time = now()->toTimeString();
        $timeentry->save();   
        return "You started working on task " . $task->name . " at: " . $timeentry->start_time;
    }

    public function endTime($id)
    {
        $task = Task::where('id', $id)->first();
        if (!$task) {
            return "This task does not exist.";
        }

        $timeentry = TimeEntry::where('task_id', $task->id)
        ->whereNull('end_time')
        ->first();
        if (!$timeentry) {
            return "You have to start another working session for task " . $task->name;
        }

        $timeentry->end_time = now()->toTimeString();
        $timeentry->save(); 

        return "You finished working on task " . $task->name . " at: " . $timeentry->end_time;

    }
}