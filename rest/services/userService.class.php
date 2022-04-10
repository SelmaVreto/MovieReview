<?php

require_once dirname(__FILE__).'/../dao/userDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';
class userService extends baseService{

  public function __construct(){
    $this->dao = new userDao();
  }

  public function get_user($search, $offset, $limit){
    if ($search){
      return $this->dao->get_user($search, $offset, $limit);
    }else{
      return $this->dao->get_all($offset, $limit);
    }
  }

  public function add($user){
  // validation of account data
  if (!isset($user['name'])) throw new Exception("name is missing");
  return parent::add($user);
}
}
?>
