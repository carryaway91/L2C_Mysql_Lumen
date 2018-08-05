<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> @yield( 'title', 'defaultny nazov' )</title>
	<link rel="stylesheet" href=" {{ url('css/base.css') }} ">
</head>
<body>

	<nav>
		<ul>
			<li><a href="{{ url('/') }}">Home</a></li>
			<li>
				<form action="{{ url('director/choose') }}" method="post">
			
					@include('_partials.select', ['submit' => true])
				
				</form>
			</li>
			<li><a href=" {{ url('director/create') }}">Add director</a></li>
			<li><a href=" {{ url('movie/create') }}">Add new movie</a></li>
		</ul>
	</nav>
	@yield('content')

</body>
</html>