<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


//DOZELIZITE!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -----------------------------------------------------------------
//ak sa odkazujem na subory v lumen funkciach, cize ak je to ako parameter, namiesto '/' medzi suborami sa pouziva bodka..
//napr. nizsie je return view('movies.index') co je subor index v priecinku movies 
//---------------------------------------------------------------------------------------------------------


/*
	web.php sluzi ako tkz router, co je script, ktory presmeruvava
	stranku, usmernuje kde sa maju ktore udaje posielat..jeho ulohou je to, aby bola databaza a html kod oddelene
	a priehladnejsie vo viacerych suboroch a nebol to jeden velky nepriehladny subor ..ak mame rozdeleny kod na viacero scriptov,
	tak potom pomocou routes prenasame data medzi tymito strankami
	napr. tu vytvarame premenne, zapisujeme do nich udaje a tie posielame do views
 */ 


//HOMEPAGE
// $router je objekt s poliami hodnot, cize sa naneho odkazujeme '->' ...metodou get ziskavame z url potrebne info

//WHOLE MOVIES LIST
$router->get('/', 'MoviesController@index');

//ADD NEW MOVIE
$router->get('movie/create', 'MoviesController@create');

//ONE MOVIE SELECTION
$router->get('/movie/{id}', 'MoviesController@show');

$router->post('/movies', 'MoviesController@store');    
// WHERE id = ? ....toto je ochrana proti tkz injections, co je inteferencia do kodu, aby nebolo schopne do url adresy napr. napisat SQL kod a tym by sa nam modifikovali,
// alebo vymazali udaje z databazy ...ak tam dame otaznik, a ako druhy parameter vo funckii selectOne() zadam pole, kde poslem hodnotu ktoru som zadal do url do 
// wildcardu ( {id} ) ...som pred injections chraneny

   
    //druhy sposob preposielania udajov je cez asociativne pole, ktore sa uvadza ako druhy parameter pre funkciu view

// vrat view na editaciu filmu
$router->get('movie/{id}/edit', 'MoviesController@edit');

//updatni film
$router->put('movie/{id}', 'MoviesController@update');

$router->get('movie/{id}/delete', 'MoviesController@destroy');
//genres 

$router->get('/genre/{name}', 'GenresController@show');


//WHOLE DIRECTORS LIST
$router->get('/directors/', 'DirectorsController@showDirectors');

// zobrazi sa formular s pridanim rezisera -> musi ist pred ukazanim rezisera!
$router->get('director/create', 'DirectorsController@create');

//ONE DIRECTOR SELECTION
$router->get('/director/{id}', 'DirectorsController@showDirector');

// zo selectu sa postom odosle nieco na choose stranku
$router->post('/director/choose', 'DirectorsController@chooseDirector');

//vo formulari na pridanie rezisera je action nastaveny na stranku directors,
//cize ak posleme data na directors zapne sa metoda store v controllery
$router->post('/directors', 'DirectorsController@store');

$router->get('director/{id}/edit', 'DirectorsController@edit');

$router->put('director/{id}', 'DirectorsController@update');




