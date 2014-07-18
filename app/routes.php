<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Valida��o CSRF
//Route::when('*', 'csrf', array('post'));

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::any('/', array("as" => "home", function() 
{ 
	return View::make('hello'); 
}));

Route::get('users', function()
{
	//return 'Users!';

	$users = User::all();

	return View::make('users')->with('users', $users);
});

//Rota de artigos
//Route::controller('articles', 'ArticlesController');
Route::get('articles', array("as" => "listArticles", "uses" => 'ArticlesController@getIndex'));
Route::get('articles/insert', array("as" => "insertArticle", "uses" => 'ArticlesController@getInsert'));
Route::get('articles/edit/{id}', array("as" => "editArticle", "uses" => 'ArticlesController@getEdit'));
Route::get('articles/delete/{id}', array("as" => "deleteArticle", "uses" => 'ArticlesController@getDelete'));

Route::post('articles/insert', 'ArticlesController@postInsert');
Route::post('articles/edit', 'ArticlesController@postEdit');



Route::group(array('before' => 'auth'), function()
{
    //colocar aqui dentro as rotas que devem ter o filtro auth
	
/*    adding tasks routes    */
//Route::get('tasks/add', 'TaskController@getAdd');
//Route::get('tasks/add', array("as" => "addTask", "uses" => 'TaskController@getAdd'));
//Route::post('tasks/add', 'TaskController@postAdd');
Route::get('tasks/add/{lista_id}', 'TaskController@getAdd');
Route::post('tasks/add/{lista_id}', 'TaskController@postAdd');



/*    listing tasks    */
Route::any('task', array("as" => "listTask", "uses" => 'TaskController@listar'));
Route::any('tasks', array("as" => "listTasks", "uses" => 'TaskController@listar'));

/*    checking tasks    */
Route::post('task/check', 'TaskController@check');

/*    lists    */
Route::get('list/create', 'ListController@getCreate');
Route::post('list/create', 'ListController@postCreate');

Route::get('list', 'ListController@listar');

Route::get('list/{lista_id?}', 'ListController@listarTasks');	
	
});


/*    login    */
Route::get('login', ['as'=>'login', function() {
	return View::make('login');
}]);

Route::post('login', array('before' => 'csrf', function() {
	$regras = array("email" => "required|email",
			"senha" => "required");
	
	$validacao = Validator::make(Input::all(), $regras);
	
	if ($validacao->fails()) {
		return Redirect::to('login')->withErrors($validacao);
	}
	
	//tenta logar o usuário
	if (Auth::attempt( array('email' => Input::get('email'), 'password' => Input::get('senha') ) ) ) {
		return Redirect::to('/');
	}
	else {
		return Redirect::to('login')->withErrors('Usuário ou Senha Inválido');
	}
}));


/*    cadastro de novos usuários    */
Route::get('cadastro', 'UserController@form');
Route::post('cadastro',  ['before' => 'csrf', 'uses' => 'UserController@cadastro']);