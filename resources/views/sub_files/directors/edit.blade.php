@extends('master')

@section('title', 'Edit director')

@section('content')

		<h1>Edit Director</h1>
<!--necisty sposob, prestuduj si view sharing!!! -->
	<form action=" {{ url('director/'. $director->id ) }}" method="post">
		
		<input type="hidden" name="_method" value="PUT">
		<label>
		<input value="{{ $director->first_name }}" type="text" name="first_name">First name
		</label>
		<label>
		<input value="{{ $director->last_name }}" type="text" name="last_name">Last name
		</label>
		<label>
		<input value="{{ $director->country }}" type="text" name="country">Country
		</label>
		<label>
		<input value="{{ $director->birthdate }}" type="text" name="birthdate">Birthdate
		</label>
		<label>
		<input type="submit" value="Edit">
		</label>
	</form>

@endsection