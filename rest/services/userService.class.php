<?php

require_once dirname(__FILE__).'/../dao/userDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';

class userService extends baseService{

  public function __construct(){
    $this->dao = new userDao();
  }

  public function get_all_user() {
    return $this->query("SELECT * FROM user", []);
    }

}
?>
