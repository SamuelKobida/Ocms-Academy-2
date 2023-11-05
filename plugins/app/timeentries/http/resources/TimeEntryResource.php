<?php

namespace App\TimeEntries\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\TimeEntries\Models\TimeEntry;
use App\Tasks\Http\Resources\UserResource;
use App\Tasks\Models\Task;

class TimeEntryResource extends JsonResource{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'task' => new TaskResource($this->task),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }



}