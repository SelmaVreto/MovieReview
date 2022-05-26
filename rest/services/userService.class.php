<?php

require_once dirname(__FILE__).'/../dao/userDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';

class userService extends baseService{

  public function __construct(){
    $this->dao = new userDao();
  }

  public function get_all_user($search, $offset, $limit){
    if ($search){
      return $this->dao->get_user($search, $offset, $limit);
    }else{
      return $this->dao->get_all_users($offset, $limit);
    }
  }
  public function add($user){
       if (!isset($user['name'])) throw new Exception("Name is missing");
       $user['created_at'] = date(Config::DATE_FORMAT);
       return parent::add($user);
     }
}
?>
