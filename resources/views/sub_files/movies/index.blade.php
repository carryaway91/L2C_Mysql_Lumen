<!-- SUBSABLONY -->
@extends( 'master' )

{{-- 
	ak existuje premenna title (bola poslana z ineho scriptu, tak vypis jej hodnotu
	inak vypis defaultnu hodnotu 'all movies') 
--}}

@section( 'title', isset($title) ? $title : 'all movies')
@section( 'content' )

	<h1>{{ $title }}

		@if( isset($director))
			<a href="{{ url('director/'. $director->id . '/edit') }}">Edit</a>
			<a href="{{ url('director/'. $director->id . '/delete') }}">x</a>
		@endif
	</h1> 


{{-- 
	ak existuje pole movies, resp ak bolo toto pole poslane z ineho scriptu
	len vtedy vytvor tabulku
--}}

@if( count($movies) )

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Title</th>
			<th>Year</th>
			<th>Genre</th>
			<th>Gross</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<!-- skrateny foreach(funguje tak isto len je kratsi ...
		posielame do suboru movie v priecinku partials vsetko co je v premennje $movies (co nam bolo posleane routerom na tuto stranku), 
		a pre kazdy zaznam z $movies vytovrime pre stranku movie v partials premennu movie
		-->
		@each('_partials.movie', $movies, 'movie')

		{{--
		 @each je skratka pre: 
			@foreach($movies as $movie) {
				@include('_partials/movie')
			@endforeach
		--}}

	</tbody>
	 <tfoot>
  	<tr>
  		<td class="gross" colspan="6">
			{{ number_format(collect($movies)->sum('gross'),2) }}
  		</td>
  	</tr>
  </tfoot>
</table>

	@include('_partials.pagination')

	<?php 
		echo app('request')->path();
	?>
@else 
	<p>No movies</p>

@endif
@endsection	