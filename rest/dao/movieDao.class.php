<?php
require_once dirname(__FILE__)."/baseDao.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class movieDao extends baseDao {

  public function __construct() {
    parent::__construct("movie");
  }
  // public function get_all_movies(){
  //   return $this->query("SELECT * FROM movie", []);
  // }
}

?>
