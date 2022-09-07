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
      return $this->dao->get_all_directors();
    }
  }
  public function get_directors_by_surname($search, $offset, $limit){
    if ($search){
      return $this->dao->get_directors_by_surname($search, $offset, $limit);
    }else{
      return $this->dao->get_all_directors();
    }
  }
  public function get_by_id($id){
     $directors = $this->dao->get_by_id($id);
      return $directors;
    }
}
?>
