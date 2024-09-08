@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

<div class="container">

    <div class="p-5 mt-4 mb-4 bg-body-secondary jumbotron rounded-3 center">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">Disciplina</h1>
              <p class="col-md-8 fs-4">Vizualize aqui as disciplinas dos seus projetos</p>
            </div>
        
    </div>
    <a href="{{route('disciplines.create')}}" class="btn btn-primary positive-button">Cadastrar disciplina</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th style="text-align:center" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplines as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td style="text-align:center">
                    <a href="/disciplinas/editar/{{$item->id}}" class="btn btn-primary positive-button">Editar</a>
                    <a href="/disciplinas/delete/{{$item->id}}" class="btn btn-danger negative-button" 
                    onclick="return confirm('Tem certeza de que deseja remover?');">Deletar</a>
            </tr>  
            @endforeach
        </tbody>
    </table>

@endsection

