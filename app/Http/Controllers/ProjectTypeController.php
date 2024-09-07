<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectType;

class ProjectTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(int $project_id, int $type_id)
    {
        $relation = new ProjectType();
        $relation->project_id = $project_id;
        $relation->type_id = $type_id;
        $relation->save();
    }

    public function update(int $project_id, int $type_id)
    {
        
    }

    public function destroy(int $project_id, int $type_id)
    {
        $relation = ProjectType::where('type_id', '=', $type_id)->where('project_id', '=', $project_id)->first();
        $relation->delete();
    }
}
