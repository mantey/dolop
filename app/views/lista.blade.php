@extends('layouts.standard')

@section('content')

    <h3>{{ $lista->title }}</h3>
    
    <p>
        <a href="{{ URL::to('tasks/add') }}/{{ $lista->id }}">Adicionar Task</a> <br />
    </p>
    
    <ul style="list-style: none;">
        @foreach ($lista->tasks as $task)
            <li class="task">
                @if ($task->status)
                    <span class="label label-success">{{ $task->title }}</span>
                @else
                    <label data-task-id='{{ $task->id }}'>
                        <input type="checkbox" />
                        {{ $task->title }}
                    </label>
                @endif
            </li>
        @endforeach
    </ul>
@stop


@section('custom_script')
    <script language="javascript">
        $(document).ready( function() {

            $('li label input').on('change', function(){
                var task_id = $(this).parent().data('task-id');
                //var li = $(this).parent().parent();
                var li = $(this).closest(".task");

                //ajax post request
                $.post(
                    "/task/check",
                    {task_id: task_id},
                    function(data) {
                        //callback do ajax request
                        if (data.status == true) {
                            li.html("<span class='label label-success'>"+data.title+"</span>");
                        }
                    }
                );
            });
        });
    </script>
@stop