<?php

namespace App\TimeEntries\Classes\Extend;
use App\Tasks\Models\Task as TaskModel;
use App\TimeEntries\Models\TimeEntry as TimeEntryModel;


class TaskExtend{


    public static function extendTask(){
        TaskModel::extend(function($model) {
            $model->hasMany['timeEntries'] = [TimeEntryModel::class];
        });
    }

}