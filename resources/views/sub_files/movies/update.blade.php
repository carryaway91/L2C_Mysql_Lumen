@extends('master')

@section('title', 'Update a movie')

@section('content')

<!--necisty sposob, prestuduj si view sharing!!! -->
	<form action=" {{ url('movie/' . $movie->id) }}" method="post">
		
		<!-- nie vsetky prehliadace podopruju put,path a delete metodu, preto sa v laravely pouziva tento 'hack', kde posielame skryty input s nazvom _method a nazvom hodnoty, aka ma byt puzita metoda-->

		<input type="hidden" name="_method" value="PUT">

		<label>
			@include('_partials.select', ['submit' => false])
		</label>
		<label>
		<input type="text" value="{{ $movie->title }}" name="title">Title
		</label>
		<label>
		<input type="text" value="{{ $movie->year }}" name="year">Year
		</label>
		<label>
		<input type="text" value="{{ $movie->gross }}" name="gross">Gross
		</label>
		<label>
		<input type="text" value="{{ $movie->genre }}" name="genre">Genre
		</label>
		<label>
		<input type="textarea" value="{{ $movie->summary }}" name="summary">Summary
		</label>
		<label>
		<input type="submit" value="pridaj">submit
		</label>
	</form>

@endsection