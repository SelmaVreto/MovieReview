<?php

require_once dirname(__FILE__).'/../dao/genreDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';
class genreService extends baseService{

  public function __construct(){
    $this->dao = new genreDao();
  }
//modifikovati ako izbacimo iz dao
  public function get_genre($offset, $limit){
      return $this->dao->get_all($offset, $limit);
  }
  public function get_by_id($id){
     $genre = $this->dao->get_by_id($id);
      return $genre;
    }

}
?>
