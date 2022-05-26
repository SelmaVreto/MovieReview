<?php

require_once dirname(__FILE__).'/../dao/directorsDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';

class directorsService extends baseService{

  public function __construct(){
    $this->dao = new directorsDao();
  }

  public function get_directors_by_name($search, $offset, $limit){
    if ($search){
      return $this->dao->get_directors_by_name($search, $offset, $limit);
    }else{
      return $this->dao->get_all($offset, $limit);
    }
  }
  public function get_directors_by_surname($search, $offset, $limit){
    if ($search){
      return $this->dao->get_directors_by_surname($search, $offset, $limit);
    }else{
      return $this->dao->get_all($offset, $limit);
    }
  }
  public function add($directors){
  if (!isset($directors['directors_name'])) throw new Exception("director is missing");
  return parent::add($directors);
}
}
?>
