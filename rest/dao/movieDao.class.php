<?php
require_once dirname(__FILE__)."/baseDao.class.php";

class movieDao extends baseDao {

  public function __construct() {
    parent::__construct("movie");
  }

  public function get_movie_by_year($movie_year) {
      return $this->query("SELECT * FROM movie WHERE movie_year = :movie_year", ["movie_year" => $movie_year]);
   }

  public function get_movie_by_director($directorsID) {
       return $this->query("SELECT * FROM movie WHERE directorsID = :directorsID", ["directorsID" => $directorsID]);
    }

  public function get_movie_by_genre($genreID) {
        return $this->query_unique("SELECT * FROM movie WHERE genreID = :genre", ["genre" => $genreID]);
     }

  public function get_movie($search, $offset, $limit){
       return $this->query("SELECT *
                            FROM movie
                            WHERE LOWER(movie_title) LIKE CONCAT('%', :movie_title, '%')
                            LIMIT ${limit} OFFSET ${offset}", ["movie_title" => strtolower($search)]);
     }
 public function add($movie){
       return $this->insert("movie", $movie);
     }
}

?>
