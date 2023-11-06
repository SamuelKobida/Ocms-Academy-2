<?php
 
namespace App\Projects\Http\Controllers;

use App\Projects\Models\Project;
use Backend\Classes\Controller;
use Illuminate\Http\Request;
use App\Projects\Http\Resources\ProjectResource;

class ProjectController extends Controller
{

    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->post('name');
        $project->description = $request->post('description');
        $project->project_manager = $request->post('project_manager');
        $project->customer = $request->post('customer');
        $project->due_date = $request->post('due_date');
        $project->is_done = $request->post('is_done');
        $project->save();   
        return new ProjectResource($project);
    }

    public function update(Request $request,$id)
    {
        $project = Project::find($id);
        if (!$project) {
            return "Project wih ID: " . $id . " was not found.";
        }

        $project->name = $request->input('name', $project->name);
        $project->description = $request->input('description', $project->description);
        $project->project_manager = $request->input('project_manager', $project->project_manager);
        $project->customer = $request->input('customer', $project->customer);
        $project->due_date = $request->input('due_date', $project->due_date);
        $project->is_done = $request->input('is_done', $project->is_done);

        $project->save();
        return new ProjectResource($project);
    }

    public function complete($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return "Project wih ID: " . $id . " was not found.";
        }

        $project->is_done = true;
        $project->save();     
        return "Project " . $project->name . " is done";
    }
    
}