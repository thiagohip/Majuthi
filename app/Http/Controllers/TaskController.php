<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('desc');
        $task->project_id = $request->input('project_id');

        $task->save();
        return view('');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->destroy();
        return view('');
    }
}
