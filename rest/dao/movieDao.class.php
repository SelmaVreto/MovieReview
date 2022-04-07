<?php
require_once dirname(__FILE__)."/baseDao.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class movieDao extends baseDao {

  public function __construct() {
    parent::__construct("movie");
  }
  public function get_movie_by_year($movie_year) {
      return $this->query_unique("SELECT * FROM movie WHERE movie_year = :movie_year", ["movie_year" => $movie_year]);
   }

   public function get_movie_by_director($movie_director) {
       return $this->query_unique("SELECT * FROM movie WHERE movie_director = :movie_director", ["movie_director" => $movie_director]);
    }

    public function get_movie_by_genre($genre) {
        return $this->query_unique("SELECT * FROM movie WHERE genre = :genre", ["genre" => $genre]);
     }
}

?>
