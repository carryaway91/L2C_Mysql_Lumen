<?php

namespace App\Http\Controllers;

//ak chcem pouzivat class Request musim si ho pridat cez use !!!!
use Illuminate\Http\Request;

use App\director_model;
use App\movie_model;

class DirectorsController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
   
    protected $director;
    protected $movie;

    public function __construct() {
        $this->director = new director_model;
        $this->movie = new movie_model;

    }

    public function showDirectors()
    {
       return $this->director->getDirectors();
    }

    public function showDirector($id)
    {
       $movies = $this->movie->getMoviesByDirector($id);
       $count = $this->movie->getMovieCount();
       $director = $this->director->getDirector($id);

       return view('sub_files.movies.index')
            ->with('title', $director->name)
            ->with('count', $count)
            ->with('director', $director)
            ->with('movies', $movies);
    }

	/**
	 * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
	 */
	public function chooseDirector() {
        $id = app('request')->input('director_id');
        return redirect("director/$id");
    }

    public function create() {
        return view('sub_files/directors/create');
    }

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
	 */
	public function store(Request $request) {
        $id = $this->director->createDirector($request->all());
        
        return redirect("director/$id");
    }

    public function edit( $id ) {
        $director = $this->director->getDirector( $id );

        return view('sub_files.directors.edit')->with('director', $director);
    }

    public function update( Request $request ) {

        $id = $request->segment(2);
        $data = $request->except('_method');

        $this->director->updateDirector( $id, $data );
        
        return redirect("/");
    }
}

















