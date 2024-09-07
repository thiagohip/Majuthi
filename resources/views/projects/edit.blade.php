@extends('app.layouts.app')

@section('title', 'Editar projeto')
@section('content')

<div class="container mt-4">
    <h1>Editar projeto: {{$data->name}}</h1>

    <form action="/projects/update/{{$data->id}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Título</label>
          <input type="text" class="form-control" value="{{$data->name}}" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descrição</label>
            <textarea name="desc" value="{{$data->description}}" id="desc" cols="30" rows="8" class="form-control"></textarea>
            <div id="descHelp" class="form-text">Descreva o seu projeto</div>
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
      </form>
</div>

@endsection

