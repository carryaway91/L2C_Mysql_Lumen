<?php

	namespace App\Http\Controllers;

	use App\genre_model;
	use App\movie_model;

	class GenresController extends Controller
	{

		protected $movie;
		protected $genre;

		public function __construct() {
			$this->movie = new movie_model;
			$this->genre = new genre_model;
		}

		public function show($name) {

			$movies = $this->movie->getMoviesByGenre($name);

			return view('sub_files.movies.index')
			->with('title', 'genre / '. $name)
			->with('movies', $movies);
		}
	}