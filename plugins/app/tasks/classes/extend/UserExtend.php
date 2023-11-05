<?php

namespace App\Tasks\Classes\Extend;
use RainLab\User\Models\User as UserModel;
use App\Tasks\Models\Task as TaskModel;

class UserExtend{


    public static function extendUser(){
        UserModel::extend(function($model) {
            $model->hasMany['tasks'] = [TaskModel::class];
        });
    }

}