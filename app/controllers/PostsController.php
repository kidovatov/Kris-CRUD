<?php

class PostsController extends BaseController {

	protected $post;
	
	public function __construct(Post $post)
	{
		$this->post = $post;
	}
	
	public function index()
	{
		$posts = $this->post->all();
		
		return View::make('posts.index', compact('posts'));
	}

	public function create()
	{
		return View::make('posts.create');
	}

	public function store()
	{
		$input = Input::all();
		
		$v = Validator::make($input, Post::$rules);
		
		if ($v->passes())
		{
			$this->post->create($input);
			return Redirect::route('posts.index');
		}
		
		return Redirect::route('posts.create')
			->withInput()
			->withErrors($v)
			->with('message', 'There were validation errors!');
	}

	public function show($id)
	{
		$data['post'] = $this->post->findOrFail($id);
		return View::make('posts.show', $data);
	}

	public function edit($id)
	{
		$post = $this->post->find($id);
		
		if (is_null($post))
		{
			return Redirect::route('posts.index');
		}
		
		return View::make('posts.edit', compact('post'));
	}

	public function update($id)
	{
		$input	= array_except(Input::all(), '_method');
		$v 		= Validator::make($input, Post::$rules);
		
		if ($v->passes()) {
			$post = $this->post->find($id);
			$post->update($input);
			return Redirect::route('posts.show', $id);
		}
		return Redirect::route('posts.edit', $id)
			->withInput()
			->withErrors($v)
			->with('message', 'There were validation errors.');
	}

	public function destroy($id)
	{
		$this->post->find($id)->delete();
		return Redirect::route('posts.index');
	}
}