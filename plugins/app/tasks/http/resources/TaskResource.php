<?php

namespace App\Tasks\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Tasks\Models\Task;
use LibUser\UserApi\Http\Resources\UserResource;
use LibUser\Userapi\Models\User;
use App\Projects\Http\Resources\ProjectResource;
use App\Projects\Models\Project;

class TaskResource extends JsonResource{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'asignee' => new UserResource($this->asignee),
            'project' => new ProjectResource($this->project),
            'planned_start' => $this->planned_start,
            'planned_time' => $this->planned_time,
            'is_done' => $this->is_done,
        ];
    }



}