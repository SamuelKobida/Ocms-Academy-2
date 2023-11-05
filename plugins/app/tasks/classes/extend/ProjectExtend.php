<?php

namespace App\Tasks\Classes\Extend;
use App\Projects\Models\Project as ProjectModel;
use App\Tasks\Models\Task as TaskModel;


class ProjectExtend{


    public static function extendProject(){
        ProjectModel::extend(function($model) {
            $model->hasMany['tasks'] = [TaskModel::class];
        });
    }

}