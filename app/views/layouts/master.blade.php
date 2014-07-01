<!doctype html>
<html>
	<head>
		<meta charset = "UTF-8">
		{{ HTML::style('css/bootstrap.css') }}
		
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left:0; list-style: none; }
			.error { color:red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
		
	</head>
	<body>
		<div class = "container">
			@if (Session::has('message'))
				<div class = "flash alert">
					<p> {{ Session::get('message') }} </p>
				</div>
			@endif
			
			@yield('content')
		</div>
	</body>
</html>