<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    public function project_discipline(){
        return $this->hasMany('App\Models\Type', 'discipline_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
