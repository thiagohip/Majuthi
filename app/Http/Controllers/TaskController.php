<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\ProjectController;

class TaskController extends Controller
{


    public function create(string $id)
    {
        return view('tasks.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $project_controller = new ProjectController();

        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('desc');
        $task->project_id = $id;

        $task->save();
        return $project_controller->show($id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $task = Task::find($id);
        return view('', compact('task'));
    }

    /**
     * Show the form for editing the specifinew Tasked resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->description = $request->input('desc');
        $task->project_id = $request->input('project_id');

        $task->save();
        return view('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $project_id, string $id)
    {

        $task = Task::find($id);
        $task->delete();
        
        return redirect('/');
    }
}
