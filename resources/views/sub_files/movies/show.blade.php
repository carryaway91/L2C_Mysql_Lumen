@extends( 'master' )

<!-- @sectiony su casti suborov ktore si potom nechavam posielat do hlavneho suboru (master)
v hlavnom subore (master) sa tieto sectiony odkazujem ich nazvom, ktore zadavam ako ich parameter-->
@section('title', $movie->title)

@section( 'content' )
	<h1>{{ $movie->title }}</h1>

	<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Director</th>
      <th scope="col">Title</th>
      <th scope="col">Year</th>
      <th scope="col">Genre</th>
      <th scope="col">Gross</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @include('_partials.movie')
 	<tr>
 		<td colspan="6"> {{ $movie->summary }}</td>
 	</tr>
  </tbody>
</table>

<a href=" {{ url('/')}}">Back to movies</a>
@endsection	