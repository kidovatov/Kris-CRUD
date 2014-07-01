@extends('layouts.master')

@section('content')

<h1 class = "breadcrumb"> Semua Post </h1>

<p> {{ link_to_route('posts.index', 'Kembali ke Semua Post') }} </p>

	<table class = "table table-striped table-bordered table-hover">
		<thead>
			<tr>				
				<th> <center> Author </center> </th>
				<th> <center> Title </center> </th>
				<th> <center> Body </center> </th>
				<th colspan = "2"> <center> Aksi </center> </th>
			</tr>
		</thead>
	
	<tbody>
		<tr>
			<td> <center> {{ $post->author }} </center> </td>
			<td> <center> {{ $post->title }} </center> </td>
			<td> <center> {{ $post->body }} </center> </td>
			<td> <center> {{ link_to_route('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) }} </td>
			<td> <center> {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }} 
				 {{ Form::submit('Hapus', array('class' => 'btn btn-danger')) }}
				 {{ Form::close() }} </center> </td>
		</tr>
	</tbody>
	</table>
	
@stop