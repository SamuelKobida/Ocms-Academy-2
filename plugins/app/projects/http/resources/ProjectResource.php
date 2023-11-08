<?php

namespace App\Projects\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Projects\Models\Project;
use LibUser\UserApi\Http\Resources\UserResource;
use LibUser\Userapi\Models\User;
use App\Tasks\Models\Task;

class ProjectResource extends JsonResource{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'project_manager' => new UserResource($this->project_manager),
            'customer' => new UserResource($this->customer),
            'due_date' => $this->due_date,
            'is_done' => $this->is_done,
            'total_time' => $this->getTotalProjectTime()
        ];
    }



}