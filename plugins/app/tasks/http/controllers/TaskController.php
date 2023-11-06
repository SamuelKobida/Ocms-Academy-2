<?php
 
namespace App\Tasks\Http\Controllers;

use App\Tasks\Models\Task;
use Backend\Classes\Controller;
use Illuminate\Http\Request;
use App\Tasks\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->post('name');
        $task->description = $request->post('description');
        $task->asignee = $request->post('asignee');
        $task->project = $request->post('project');
        $task->planned_start = $request->post('planned_start');
        $task->planned_time = $request->post('planned_time');
        $task->is_done = $request->post('is_done');
        $task->save();   
        return new TaskResource($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return "Task wih ID: " . $id . " was not found.";
        }
    
        $task->name = $request->input('name', $task->name);
        $task->description = $request->input('description', $task->description);
        $task->asignee = $request->input('asignee', $task->asignee);
        $task->project = $request->input('project', $task->project);
        $task->planned_start = $request->input('planned_start', $task->planned_start);
        $task->planned_time = $request->input('planned_time', $task->planned_time);
        $task->is_done = $request->input('is_done', $task->is_done);

        $task->save();
        return new TaskResource($task);
    }
    

    public function complete($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return "Task wih ID: " . $id . " was not found.";
        }
        
        $task->is_done = true;
        $task->save();     
        return "Task " . $task->name . " is done";
    }
    
}