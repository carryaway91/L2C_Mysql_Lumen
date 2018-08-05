<?php

namespace app;

class movie_model {
	
	public function getMovies() {
		
        $sql = " SELECT m.director_id, m.title, m.year, m.gross, m.genre,
                 m.id, d.first_name || ' ' || d.last_name AS director,
                 '$' || m.gross AS total
                 FROM movies m
                 JOIN directors d ON m.director_id = d.id
                ";
                $page = app('request')->get('page') ?: 1;    
                $limit = 5;
                $offset = ( $page -1 ) * $limit;
                
            $sql .= "LIMIT $limit OFFSET $offset ";    
            
		

        return app('db')->select($sql);
	   
    }

    public function getMoviesByDirector( $id ) {
        
        return app('db')->select("
                SELECT m.director_id, m.title, m.year, m.gross, m.genre,
                m.id, d.first_name || ' ' || d.last_name AS director,
                '$' || m.gross AS total
                FROM movies m
                JOIN directors d ON m.director_id = d.id
                WHERE 
                    d.id = ?
        ", [ $id ]);
    }

    public function getMoviesByGenre( $name ) {
        
        return app('db')->select("
                SELECT m.director_id, m.title, m.year, m.gross, m.genre,
                m.id, d.first_name || ' ' || d.last_name AS director,
                '$' || m.gross AS total
                FROM movies m
                JOIN directors d ON m.director_id = d.id
                WHERE 
                    m.genre = ?
        ", [ $name ]);
    }

	public function getMovie($id) {

		return app('db')->selectOne("
        	SELECT m.*, d.id,
        	d.first_name || ' ' || d.last_name AS director
        	FROM movies m
        	LEFT JOIN directors d ON m.director_id = d.id
        	WHERE m.id = ?
    	", [ $id ]);
	}

    public function getMovieCount() {
        $count = app('db')->selectOne("
            SELECT count(1) AS count
            FROM movies
        ")->count;
    return $count;
    }

    public function createMovie($data) {
        $sql = app('db')->insert("
            INSERT INTO movies (director_id, title, year, gross, genre, summary)
            VALUES 
            (:director_id, :title, :year, :gross, :genre, :summary)
            ", [
                'director_id' => $data['director_id'],
                'title'       => $data['title'],
                'year'        => (int) $data['year'],
                'gross'       => (int) $data['gross'],
                'genre'       => $data['genre'],
                'summary'     => $data['summary']
            ]);
        return app('db')->getPDO()->lastInsertId();
    }

    public function updateMovie( $id, $data ) {

        return app('db')->update("  
                UPDATE movies 
                SET 
                director_id = :director_id,
                title       = :title,
                year        = :year,
                gross       = :gross,
                genre       = :genre,
                summary     = :summary
            WHERE id = :id",
                [
                'id'          => $id,    
                'director_id' => $data['director_id'],
                'title'       => $data['title'],
                'year'        => (int) $data['year'],
                'gross'       => (int) $data['gross'],
                'genre'      => $data['genre'],
                'summary'     => $data['summary']
                ]);
    }
    public function deleteMovie( $id ) {

        return app('db')->delete("
        DELETE FROM movies
        WHERE id = ?
            ", [ $id ]);
    }
}
