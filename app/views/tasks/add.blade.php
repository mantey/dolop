@extends('layouts.standard')

@section('content')

    <div class="row-fluid marketing">
        <div class="col-lg-6">
			
			@if ( isset($sucesso) )
				<h3>FUNCIONOU!</h3>
			@endif
			
            @if ( count($errors) > 0)
                Erros encontrados:<br />
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            
            <form method="post" action="{{ URL::to('tasks/add') }}/{{ $lista_id }}">
                {{ Form::label('title', 'Tarefa a ser cumprida:') }}
                    {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Título')) }}
                
                {{ Form::submit('OK', array('class' => 'btn btn-primary')) }}
			</form>
			
            
        </div>
    </div>
@stop