@extends('master')

@section('title', 'Add a director')

@section('content')
	<form action=" {{ url('directors') }}" method="post">
		<label>
		<input type="text" name="first_name">first name
		</label>
		<label>
		<input type="text" name="last_name">last name
		</label>
		<label>
		<input type="text" name="country">country
		</label>
		<label>
		<input type="date" name="birthdate">birthdate
		</label>
		<label>
		<input type="submit" value="pridaj">submit
		</label>
	</form>
@endsection