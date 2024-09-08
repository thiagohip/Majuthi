<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectDiscipline;
use App\Models\Discipline;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectDisciplineController;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Auth::user()->project;
        return view('', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $disciplines = $user->discipline;
        return view('projects.create', compact('disciplines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $relation_controller = new ProjectDisciplineController;

        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('desc');
        $project->user_id = Auth::user()->id;
        $project->save();

        $disciplines = $request->input('selectedDisciplines');
        foreach ($disciplines as $discipline_id) {
            $relation_controller->store($project->id, $discipline_id);
        }
        
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $relations = ProjectDiscipline::where('project_id', '=', $id)->get();
        $disciplines = [];

        foreach ($relations as $item) {

            $discipline = Discipline::where('id', '=', $item->discipline_id)->first();
            if($discipline){
                array_push($disciplines, $discipline);
            }
        }

        $project = Project::find($id);
        $tasks = $project->task;
        return view('projects.show', compact('project', 'tasks', 'disciplines'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->description = $request->input('desc');
        $project->user_id = Auth::user()->id;

        $project->save();
        return view('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $relation_controller = new ProjectDisciplineController;

        $project = Project::find($id);
        $relations = ProjectDiscipline::where('project_id', '=', $id)->get();
        foreach ($relations as $item) {
            $relation_controller->destroy($id, $item->discipline_id);
        }
        $project->delete();
        return redirect('/');
    }
}
