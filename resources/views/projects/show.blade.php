@extends('app.layouts.app')

@section('title', 'Projetos')
@section('content')

<div class="container mt-4">
    <h1>{{$project->name}}</h1>

    <p>
        {{$project->description}}
    </p>
    <a href="/projects/create-task/{{$project->id}}" class="btn btn-outline-primary">Criar tarefa</a>

    @if($tasks)
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Título</th>
                    <th style="text-align:center" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td style="text-align:center">
                        <a href="/tasks/delete/{{$item->id}}" class="btn btn-primary" 
                        onclick="return confirm('Tem certeza de que deseja remover?');">Feita</a>
                </tr>  
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection

