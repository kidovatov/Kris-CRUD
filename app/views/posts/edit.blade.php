@extends('layouts.master')

@section('content')

<h1> Edit Post </h1>

{{ Form::model($post, array(
	'method' 	=> 'PATCH', 
	'route' 	=> array('posts.update', $post->id)
	)) }}

	<ul>
		<li>
			{{ Form::label('author', 'Author:') }}
			{{ Form::text('author') }}
		</li>
		<li>
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title') }}
		</li>
		<li>
			{{ Form::label('body', 'Body:') }}
			{{ Form::textarea('body') }}
		</li>
		<li>
			{{ Form::submit('Pemutakhiran', array('class' => 'btn btn-info')) }}
			{{ link_to_route('posts.index', 'Batalkan', $post->id, array('class' => 'btn btn-warning')) }}
		</li>
	</ul>

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class = "error">:message</li>')) }}
	</ul>
@endif

@stop