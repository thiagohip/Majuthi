@extends('layouts.app')

@section('title', 'Criar disciplina')
@section('content')

<div class="container mt-4">
    <h1>Criar disciplina</h1>

    <form action="{{route('disciplines.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control input" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-primary positive-button">Criar</button>
      </form>
</div>

@endsection
