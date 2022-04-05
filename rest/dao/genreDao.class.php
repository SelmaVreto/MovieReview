<?php
require_once dirname(__FILE__)."/baseDao.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class genreDao extends baseDao {

  public function __construct(){
    parent::__construct("genre");
  }


?>
