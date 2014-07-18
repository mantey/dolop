@extends('layouts.standard')

@section('content')

<h1>Editar artigo</h1>

<hr>

{{ Form::open(array('url' => 'articles/edit', 'class' => 'form-horizontal', 'role' => 'form')) }}

<div class="form-group">
    <label for="title" class="col-lg-2 control-label">Título</label>
    <div class="col-lg-6">
        {{ Form::text('title', $article->title, array('class' => 'form-control', 'placeholder' => 'Título')) }}
    </div>
</div>

<div class="form-group">
    <label for="content" class="col-lg-2 control-label">Conteúdo</label>
    <div class="col-lg-6">
        {{ Form::textarea('content', $article->content, array('class' => 'form-control', 'placeholder' => 'Conteúdo')) }}
    </div>
</div>

{{ Form::hidden('id', $article->id) }}

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
        <a href="{{ url('articles') }}" title="Cancelar" class="btn btn-default">Cancelar</a>
    </div>
</div>

{{ Form::close() }}

@stop