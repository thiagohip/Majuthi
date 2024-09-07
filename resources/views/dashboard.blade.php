@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

<div class="container">
    @if(session()->get('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}
        </div><br />
    @elseif(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif
    <div class="p-5 mt-4 mb-4 bg-body-secondary rounded-3 center">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">DASHBOARD</h1>
              <p class="col-md-8 fs-4">Vizualize aqui seus projetos</p>
            </div>
        
    </div>
    <a href="{{route('projects.create')}}" class="btn btn-outline-primary">Cadastrar projeto</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Título</th>
                <th style="text-align:center" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td style="text-align:center">
                    <a href="/projetos/editar/{{$item->id}}" class="btn btn-primary">Editar</a>
                    <a href="/projetos/delete/{{$item->id}}" class="btn btn-danger" 
                    onclick="return confirm('Tem certeza de que deseja remover?');">Deletar</a>
            </tr>  
            @endforeach
        </tbody>
    </table>

@endsection

