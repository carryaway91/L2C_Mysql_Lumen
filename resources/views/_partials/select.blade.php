{{-- vytvaranie objektu z direktor modelu --}}
	<?php $dir_model = new App\director_model; 

	$selected = false;

// tento select sa pouziva na dvoch strankach - na stranke directora 
// a na stranke filmu
// zo stranky directora nam prichadza premenna $directors a zo stranky
// filmu premenna $movie
	
	if( isset($director) ) $selected = $director->id; 
	elseif ( isset($movie) ) $selected = $movie->director_id;
	?>

	{{-- app('request')->segment(1)
		app('request')->is('movie/11')
	 segment vylistuje segment z url zatial co IS sa pyta na celu url adresu
	 --}}
	
<select name="director_id" onchange=" {{ $submit ? 'this.form.submit()' : '' }}">
	
	<option value="">Choose a Director</option>
	@foreach($dir_model->getDirectors() AS $director) 
	<option {{ $selected === $director->id ? 'selected' : '' }} value="{{ $director->id }}">{{ $director->name }}</option>
	@endforeach

</select>
{{-- v selected option chcem mat po kliknuti na rezisera alebo na stranku nejakeho filmu predviznaceneho toho rezisera, na kt stranke akurat som, alebo na ktorej stranke filmu som

metoda v DirectorController showDirector() posiela premennu $director a metoda
show v MovieController posiela premennu $movie
pomocou tychto premennych potom mozme nastavit predvyznaceny select a to tak ze 
atribut selected sa vyznaci IBA vtedy, ak v premennej $selected je idcko rezisera 
ktore sa zhoduje s ideckom rezisera, ktoreho akurat vyberame v foreach cykle, sluzi na vypisanie vsetkych directorov v selecte)

tento selected sa pouziva na dvoch miestach a na jednom existuje premenna $movie a na druhom $director 
 --}}