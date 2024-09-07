@extends('layouts.app')

@section('title', 'Criar tipo')
@section('content')

<div class="container mt-4">
    <h1>Criar tipo</h1>

    <form action="{{route('types.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
      </form>
</div>

@endsection
