@extends('layouts.standard')

@section('content')

    <div class="row-fluid marketing">
        <div class="span6">
            @if ( count($errors) > 0)
                Erros encontrados:<br />
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            
            <form method="post" action="{{ URL::to('cadastro') }}">
                <label>
                    Email:
                    <input type="text" name="email">
					{{ $errors->first('email',':message') }}
                </label>
                
                <label>
                    Senha:
                    <input type="password" name="senha">
                </label>
                
                <label>
                    Confirmação da senha:
                    <input type="password" name="confirmacao">
					{{ $errors->first('confirmacao',':message') }}
                </label>
                
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="submit" value="Login">
            </form>
            
        </div>
    </div>
@stop