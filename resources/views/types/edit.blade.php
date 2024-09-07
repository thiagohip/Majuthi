@extends('layouts.app')

@section('title', 'Criar tipo')
@section('content')

<div class="container mt-4">
    <h1>Editar tipo: {{$type->name}}</h1>

    <form action="/tipos/update/{{$type->id}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name"  class="form-label">Nome</label>
          <input type="text" value="{{$type->name}}" class="form-control" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
</div>

@endsection
