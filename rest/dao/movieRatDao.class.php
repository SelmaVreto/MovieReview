<?php
require_once dirname(__FILE__)."/baseDao.class.php";

class movieRatDao extends baseDao {

  public function __construct() {
    parent::__construct("movieRat");
  }

 public function get_all_comments() {
    return $this->query("SELECT * FROM movie_rat_rew", []);
    }

public function get_comments_by_movieID($movieID) {
        return $this->query_unique("SELECT * FROM movie_rat_rew WHERE movieID = :movieID", ["movieID" => $movieID]);
    }

public function add_rew($comments){
      return $this->insert("movie_rat_rew", $comments);
    }
// public function delete($id){
//       return $this->delete(":id", $id);
//     }
  }
?>
