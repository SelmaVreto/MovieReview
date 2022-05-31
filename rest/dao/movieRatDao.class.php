<?php
require_once dirname(__FILE__)."/baseDao.class.php";

class movieRatDao extends baseDao {

  public function __construct() {
    parent::__construct("movieRat");
  }

 public function get_all_comments() {
    return $this->query("SELECT * FROM movie_rat_rew", []);
    }

public function get_comments_by_movieID($MovieID) {
        return $this->query("SELECT * FROM movie_rat_rew WHERE MovieID = :MovieID", ["MovieID" => $MovieID]);
    }

public function add($comments){
      return $this->insert("movie_rat_rew", $comments);
    }
// public function delete($id){
//       return $this->delete(":id", $id);
//     }
//parcijalni update podataka by id
  public function update_comm($id, $id){
    $this->update("comments", $id, $id);
}
  }
?>
