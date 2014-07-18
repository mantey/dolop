@extends('layouts.standard')

@section('content')

    <div class="row-fluid marketing">
        <div class="col-lg-6">
            @if ( count($errors) > 0)
                Erros encontrados:<br />
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            
            @if ( isset($sucesso) )
                <h3>FUNCIONOU!</h3>
            @endif
            
            {{ Form::open( array("url" => "list/create") ) }}
                {{ Form::label('title', 'Nova Lista:') }}
                    {{ Form::text('title') }}
                
                {{ Form::submit('OK') }}
            {{ Form::close() }}
            
        </div>
    </div>
@stop