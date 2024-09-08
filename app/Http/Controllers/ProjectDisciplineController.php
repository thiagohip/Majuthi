<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDiscipline;

class ProjectDisciplineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(int $project_id, int $discipline_id)
    {
        $relation = new ProjectDiscipline();
        $relation->project_id = $project_id;
        $relation->discipline_id = $discipline_id;
        $relation->save();
    }

    public function update(int $project_id, int $discipline_id)
    {
        
    }

    public function destroy(int $project_id, int $discipline_id)
    {
        $relation = ProjectDiscipline::where('discipline_id', '=', $discipline_id)->where('project_id', '=', $project_id)->first();
        $relation->delete();
    }
}
