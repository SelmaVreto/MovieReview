<?php

require_once dirname(__FILE__).'/../dao/genreDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';
class genreService extends baseService{

  public function __construct(){
    $this->dao = new genreDao();
  }

  public function get_genre($search, $offset, $limit){
    if ($search){
      return $this->dao->get_genre($search, $offset, $limit);
    }else{
      return $this->dao->get_all($offset, $limit);
    }
  }
  public function get_by_id($id){
     $genre = $this->dao->get_by_id($id);
      return $genre;
    }
  public function add($genre){
  // validation of data
  if (!isset($genre['genre_name'])) throw new Exception("Genre is missing");
  return parent::add($genre);
}
}
?>
