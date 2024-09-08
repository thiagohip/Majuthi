@extends('layouts.app')

@section('title', 'Criar disciplinas')
@section('content')

<div class="container mt-4">
    <h1>Editar disciplina: {{$discipline->name}}</h1>

    <form action="/disciplinas/update/{{$discipline->id}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name"  class="form-label">Nome</label>
          <input type="text" value="{{$discipline->name}}" class="form-control input" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-primary positive-button">Salvar</button>
      </form>
</div>

@endsection
