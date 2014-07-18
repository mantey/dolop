@extends('layouts.standard')

@section('content')
    <h1>
        Artigos
        <small>
            @if ($articles->count() === 1)
                Um artigo publicado
            @elseif ($articles->count() > 1)
                {{ $articles->count() }} artigos
            @else
                Nenhum artigo.
            @endif
        </small>
    </h1>

    <hr>    
    
    {{-- Verifica se existem artigos --}}
    @if($articles->count())
        {{-- Imprimindo nossos artigos --}}
        @foreach ($articles as $article)
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-time"></span>
                {{ date('d/m/Y H:i', strtotime($article->created_at)) }}
                
                <div class="pull-right">
                    <div class="btn-group btn-group-xs">
                        <a href="{{ url('articles/edit', $article->id) }}" title="Editar"
                           class="btn btn-default">Editar</a>
                        <a href="{{ url('articles/delete', $article->id) }}" title="Remover"
                           class="btn btn-default">Remover</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <h2>{{{ $article->title }}}</h2>
                <hr>
                <div>
                    {{ $article->content }}
                </div>
            </div>
        </div>
        @endforeach
    @else
        <h2>Nenhum artigo encontrado.</h2>
    @endif
@stop