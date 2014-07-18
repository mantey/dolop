<?php

class ArticlesController extends BaseController {

	public function getIndex()
	{
		$articles = Article::get();
		return View::make('articles.index', compact('articles'));
	}

	public function getInsert()
	{
		$title = 'Inserir Artigo - Desenvolvendo com Laravel';
		return View::make('articles.insert', compact('title'));
	}

	public function postInsert()
	{
		$article = new Article();

		$article->title = Input::get('title');
		$article->content = Input::get('content');

		$article->save();

		return Redirect::to('/articles');
	}

	public function getEdit($id)
	{
		$article = Article::find($id);
		$title = 'Editar Artigo - Desenvolvendo com Laravel';
		return View::make('articles.edit', compact('article', 'title'));
	}

	public function postEdit()
	{
		$article = Article::find(Input::get('id'));

		$article->title = Input::get('title');
		$article->content = Input::get('content');

		$article->save();

		return Redirect::to('/articles');
	}

	public function getDelete($id)
	{
		$article = Article::find($id);
		$article->delete();

		return Redirect::to('/articles');
	}
}

