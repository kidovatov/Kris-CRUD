@extends('layouts.master')

@section('content')

<h1> Semua Pengguna </h1>

<p> {{ link_to_route('posts.create', 'Tambahkan Pengguna Baru') }} </p>
	
	@if ($posts->count())
	<table class = "table table-striped table-bordered">
		<thead>
			<tr>				
				<th> <center> Author </center> </th>
				<th> <center> Title </center> </th>
				<th> <center> Body </center> </th>
				<th colspan = "3"> <center> Aksi </center> </th>
			</tr>
		</thead>
		
	<tbody>
		@foreach ($posts as $u)
		<tr>
			<td> <center> {{ $u->author }} </center> </td>
			<td> <center> {{ $u->title }} </center> </td>
			<td> <center> {{ $u->body }} </center> </td>
			<td> <center> {{ link_to_route('posts.edit', 'Edit', array($u->id), array('class' => 'btn btn-info')) }} </td>
			<td> <center> {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $u->id))) }} 
				 {{ Form::submit('Hapus', array('class' => 'btn btn-danger')) }}
				 {{ Form::close() }} </center> </td>
			<td> <center> {{ link_to_route('posts.show', 'Lihat', array($u->id), array('class' => 'btn btn-info')) }} </td>
		</tr>
		@endforeach

	</tbody>
	</table>

@else
	Tidak ada pengguna
@endif

@stop