<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectTypeController;


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
        $types = $user->type;
        return view('projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $relation_controller = new ProjectTypeController;

        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('desc');
        $project->user_id = Auth::user()->id;
        $project->save();

        $types = $request->input('selectedTypes');
        foreach ($types as $type_id) {
            $relation_controller->store($project->id, $type_id);
        }
        
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('', compact('project'));
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
        $relation_controller = new ProjectTypeController;

        $project = Project::find($id);
        $relations = ProjectType::where('project_id', '=', $id)->get();
        foreach ($relations as $item) {
            $relation_controller->destroy($id, $item->type_id);
        }
        $project->delete();
        return redirect('/');
    }
}
