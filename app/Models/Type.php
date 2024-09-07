<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function project_type(){
        return $this->hasMany('App\Models\Type', 'project_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
