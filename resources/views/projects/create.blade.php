@extends('layouts.app')

@section('title', 'Criar projeto')
@section('content')

<div class="container mt-4">
    <h1>Criar projeto</h1>

    <form action="{{route('projects.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Título</label>
          <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descrição</label>
            <textarea name="desc" id="desc" cols="30" rows="8" class="form-control"></textarea>
            <div id="descHelp" class="form-text">Descreva o seu projeto</div>
        </div>
        <div class="mb-3">
            @foreach ($types as $item)
                <input type="checkbox" name="selectedTypes[]" id="{{$item->id}}" value="{{$item->id}}">
                <label for="selectedTypes[]">{{$item->name}}</label>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
      </form>
</div>

@endsection

