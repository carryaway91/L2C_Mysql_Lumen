<?php
/*

namiesto toho, aby som mal v routery cely kod, mozem si ho rozdelit podla MVC modelu, urobit tkz Refactoring(upravit kod bez zmeny vysledku)
v povodnom routery som mal smerovanie stranky aj vyberanie SQL kodu ...pomocou MVC modelu (MODEL, VIEW, CONTROLLER) si kod mozem sprehladnit
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movie_model;

class MoviesController extends Controller {
	protected $model;

	public function __construct() {
		$this->model = new movie_model;
	}

// get list of movies
	public function index() {
		$movies = $this->model->getMovies();
		$count = $this->model->getMovieCount();

	return view('sub_files/movies/index')
			->with('count', $count)
			->with('title', 'Movie list')
			->with('movies', $movies);
	}

// get one movie
	public function show($id) {
		$movie = $this->model->getMovie($id);

		/*return view('sub_files/movies.show', [
		'movie' => $movie
	]); */

	return view('sub_files/movies/show')
			->with('movie', $movie);
	}

	public function create() {
		return view('sub_files/movies/create');
	}

	public function store(Request $request)
	{
		$id = $this->model->createMovie($request->all());

		return redirect("movie/$id");
	}

	public function edit( $id ) {
		$movie = $this->model->getMovie( $id );
		return view('sub_files.movies.update', [ 'movie' => $movie]);
	}

//po kliknuti na update film nas presmeruje stranka na movie/id_filmu/edit co je view, kde si pomocou metody edit(kde vytahujem udaje o danom filme z modela metodou getMovie) necham preposlat udaje, ktore vytiahnem na movie/id metodou PUT,
//metodou update si necham poslat udaje ktore mi prisli do movie_modelu do metody updateMovie, z ktora mi updatne a vrati len to ci sa to podarilo alebo nie
public function update( Request $request ) {

	$id = $request->segment(2);
	$data = $request->except('_method');

	$this->model->updateMovie( $id, $data);

	return redirect("/");
}
public function destroy( $id ) {

	$id = app('request')->segment( 2 );

	$this->model->deleteMovie( $id );

   return redirect("");
}
}