<?php

require_once dirname(__FILE__).'/../dao/genreDao.class.php';

class genreService {

  private $dao;

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
}
?>
