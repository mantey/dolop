@extends('layouts.standard')

@section('content')

    <div class="row-fluid marketing">
        <div class="span6">
            Usuário Cadastrado com Sucesso.<br />
            <a href="{{ URL::to('login') }}">Clique aqui para logar</a>
        </div>
    </div>
@stop