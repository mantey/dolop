<?php

class ListController extends BaseController {
	public function getCreate() {
		return View::make('add_list');
	}
	
	
	public function postCreate() {
		//criando regras de valida��o
		$regras = array('title' => 'required');
		
		//executando valida��o
		$validacao = Validator::make(Input::all(), $regras);
		
		//se a valida��o deu errado
		if ($validacao->fails()) {
			return Redirect::to('list/create')->withErrors($validacao);
		}
		//se a valida��o deu certo
		else {
			$list= new Lista;
			$list->title = Input::get('title');
			$list->user_id = Auth::user()->id;
			$list->save();
			
			return View::make('add_list')->with('sucesso', TRUE);
		}
	}
	
	public function listar(){
		//return View::make('list_lists')->with('lists', Lista::all());
		return View::make('list_lists')->with('lists', User::find(Auth::user()->id)->listas);
	}
	
	public function listarTasks($lista_id = 0) {
		if ($lista_id == 0)
			return $this->listar();

		//return View::make('lista')->with('lista', Lista::findOrFail($lista_id));
		return View::make('lista')->with('lista', User::find(Auth::user()->id)->listas()->where('id', '=', $lista_id)->first());
	}	
	
}