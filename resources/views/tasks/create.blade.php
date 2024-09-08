@extends('layouts.app')

@section('title', 'Criar projeto')
@section('content')

<div class="container mt-4">
    <h1>Adicionar disciplinas</h1>

    <form action="/projetos/{{$id}}/tarefas/store" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Título</label>
          <input type="text" class="form-control input" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descrição</label>
            <textarea name="desc" id="desc" cols="30" rows="8" class="form-control first-letter:input"></textarea>
            <div id="descHelp" class="form-text ">Descreva sua tarefa</div>
        </div>
        <button type="submit" class="btn btn-primary positive-button">Criar</button>
      </form>
</div>

@endsection

