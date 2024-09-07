<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function task(){
        return $this->hasMany('App\Models\Task', 'project_id');
    }

    public function project_type(){
        return $this->hasMany('App\Models\Type', 'project_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
