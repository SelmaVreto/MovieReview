<?php

require_once dirname(__FILE__).'/../dao/movieDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';
class movieService extends baseService{

  public function __construct(){
    $this->dao = new movieDao();
  }

  public function get_movie($search, $offset, $limit){
    if ($search){
      return $this->dao->get_movie($search, $offset, $limit);
    }else{
      return $this->dao->get_all($offset, $limit);
    }
  }
  public function get_movie_by_year($movie_year){
      return $this->dao->get_movie_by_year($movie_year);
  }
  public function get_movie_by_genre($genreID){
      return $this->dao->get_movie_by_genre($genreID);
  }
  public function get_movie_by_director($directorsID){
      return $this->dao->get_movie_by_director($directorsID);
  }

}
?>
