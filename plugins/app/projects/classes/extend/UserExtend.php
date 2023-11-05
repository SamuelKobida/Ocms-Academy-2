<?php

namespace App\Projects\Classes\Extend;
use RainLab\User\Models\User as UserModel;
use App\Projects\Models\Project as ProjectModel;

class UserExtend{


    public static function extendUser(){
        UserModel::extend(function($model) {
            $model->hasMany['projects'] = [ProjectModel::class];
        });
    }



}