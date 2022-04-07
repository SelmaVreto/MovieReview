<?php
require_once dirname(__FILE__)."/baseDao.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class movieRatDao extends baseDao {

  public function __construct(){
    parent::__construct("movie_rat_rew");
  }

public function add_rew($movie_rat_rew){
  return $this->insert("movie_rat_rew", $movie_rat_rew);
}


  public function get_comm_by_Movieid($movieID) {
     return $this->query("SELECT * FROM movie_rat_rew WHERE movieID = :movie_id", ["movie_id" => $movieID]);
   }

   public function get_comm_by_userid($userID) {
      return $this->query("SELECT * FROM movie_rat_rew WHERE userID = :user_id", ["user_id" => $userID]);
    }
  // public function delete($id){ //records
  //   $this->query_unique("DELETE FROM ".$this->table." WHERE id=:id", ["id" => $id]);
  // }
   }
   ?>
