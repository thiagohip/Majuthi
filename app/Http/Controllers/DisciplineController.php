<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipline;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectDiscipline;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $disciplines = $user->discipline;    
        return view('disciplines.index', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('disciplines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $discipline = new Discipline();
        $discipline->name = $request->input('name');
        $discipline->user_id = Auth::user()->id;
        $discipline->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discipline = Discipline::find($id);
        return view('disciplines.edit', compact('discipline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $discipline = Discipline::find($id);
        $discipline->name = $request->input('name');
        
        $discipline->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discipline = Discipline::find($id);
        if(isset($discipline)){
            $relation = ProjectDiscipline::where('discipline_id', '=', $id)->first();
            if(!isset($relation)){
                $discipline->delete();
                return redirect('/')->with('success', 'Cadastro de disciplina deletado com sucesso!!');
            }else{
                return redirect('/')->with('danger', 'Disciplina não pode ser excluida!!');
            } 
        }
    }
}
