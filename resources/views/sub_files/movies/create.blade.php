@extends('master')

@section('title', 'Add a movie')

@section('content')

<!--necisty sposob, prestuduj si view sharing!!! -->
	<form action=" {{ url('movies') }}" method="post">
		<label>
			@include('_partials.select', ['submit' => false])
		</label>
		<label>
		<input type="text" name="title">Title
		</label>
		<label>
		<input type="text" name="year">Year
		</label>
		<label>
		<input type="text" name="gross">Gross
		</label>
		<label>
		<input type="text" name="genre">Genre
		</label>
		<label>
		<input type="textarea" name="summary">Summary
		</label>
		<label>
		<input type="submit" value="pridaj">submit
		</label>
	</form>

@endsection