<?php 

	namespace App;

	class genre_model {

		public function add($name) {
			
			return app('db')->insert("
				INSERT INTO movies(genre) 
				VALUES ($name)
				");
		
		}	
	}