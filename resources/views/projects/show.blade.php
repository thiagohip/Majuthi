@extends('layouts.app')

@section('title', 'Projetos')
@section('content')

<div class="container mt-4">
    <div class="p-5 mt-4 mb-4 jumbotron rounded-3 center">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{$project->title}}</h1>
            <p class="col-md-8 fs-4">{{$project->description}}</p>
            <strong>Disciplina(s): </strong>
            @foreach ($disciplines as $item)
                {{$item->name}},
            @endforeach
            ...
        </div>
    </div>
    <a href="/projetos/{{$project->id}}/tarefas/criar" class="btn btn-outline-primary positive-button">Criar tarefa</a>

    @if($tasks)
        <table class="table table-striped table-hover">
            <thead>
            </thead>
            <tbody>
                @foreach ($tasks as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td style="text-align:center">
                        <a href="/projetos/{{$project->id}}/tarefas/delete/{{$item->id}}" class="btn btn-primary positive-button" 
                        onclick="return confirm('Tem certeza de que deseja remover?');">Feita</a>
                </tr>  
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection

