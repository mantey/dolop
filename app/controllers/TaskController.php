<?php

class TaskController extends BaseController {
/*
	public function getAdd() 
	{
		return View::make('tasks.add');
	}
*/

	public function getAdd($lista_id) {
		//verifica se a lista existe
		//Lista::findOrFail($lista_id);
		if ( Lista::findOrFail($lista_id)->usuario->id != Auth::user()->id )
			return Redirect::to('list');
		
		//return View::make('tasks.add')->with('lista_id', $lista_id);
		return View::make('tasks.add')->with('lista_id', $lista_id);
	}
/*
	public function postAdd() 
	{
		//criando regras de validação
   		$regras = array('title' => 'required');
   
   		//executando validação
   		$validacao = Validator::make(Input::all(), $regras);
   
   		//se a validação deu errado
   		if ($validacao->fails()) 
		{
           	return Redirect::to('task/add')->withErrors($validacao);
   		}
		//se a validação deu certo
		else 
		{
			$task = new Task;
			$task->title = Input::get('title');
			$task->save();

			return View::make('tasks.add')->with('sucesso', TRUE);
		}
	}
*/

	public function postAdd($lista_id) {
		//verifica se a lista existe
		//Lista::findOrFail($lista_id);
		if ( Lista::findOrFail($lista_id)->usuario->id != Auth::user()->id )
			return Redirect::to('list');

		//criando regras de validação
		$regras = array('title' => 'required');

		//executando validação
		$validacao = Validator::make(Input::all(), $regras);

		//se a validação deu errado
		if ($validacao->fails()) {
			return Redirect::to('task/add/' . $lista_id)->withErrors($validacao);
		}
	//se a validação deu certo
		else {
			$task = new Task;
			$task->title = Input::get('title');
			$task->list_id = $lista_id;
			$task->save();

			//return View::make('tasks.add')->with('sucesso', TRUE)->with('lista_id', $lista_id);
			return View::make('tasks.add')->with('lista_id', $lista_id);
		}
	}
	
	public function listar() {
		$tasks = Task::all();
		return View::make('tasks.list')->with('tasks', $tasks);
	}	
	
	
    public function check() {
        //verifica se a request é ajax
        if (Request::ajax()) {
            //criando regras de validação
            $regras = array('task_id' => 'required|integer');

            $validacao = Validator::make(Input::all(), $regras);

            if ($validacao->fails()) {
                return Response::json( array("status" => FALSE) );
            }
            else {
                //tenta encontrar e atualizar a task
                try {
                    $task = Task::findOrFail(Input::get('task_id'));
					
					if($task->getUsuarioId() != Auth::user()->id)
						throw new Exception("Você não é dono desta task");
					
					
                    $task->status = TRUE;
                    $task->save();

                    return Response::json( array("status" => TRUE, "title" => $task->title) );
                }
                //caso não tenha conseguido encontrar a task
                catch(Exception $e) {
                    return Response::json( array("status" => FALSE, "msg" => $e->getMessage()) );
                }
            }
        }
    }	
	
}