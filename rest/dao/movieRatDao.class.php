<?php
require_once dirname(__FILE__)."/baseDao.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class movieRatDao extends baseDao {

  public function __construct(){
    parent::__construct("movieRat");
  }

  public function add_comment($movie_rat_rew){
    return $this->insert("comments", $movie_rat_rew);
  }

  public function add_rat($movie_rat_rew){
    return $this->insert("rating", $movie_rat_rew);
  }

  public function get_comm_by_MOvieid($movieID) {
     return $this->query_unique("SELECT * FROM movie_rat_rew WHERE movieID = :movieid", ["movieid" => $movieID]);
   }

   }
   ?>
