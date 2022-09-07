<?php

require_once dirname(__FILE__).'/../dao/movieRatDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';
class movieRatService extends baseService{

  public function __construct(){
    $this->dao = new movieRatDao();
  }
  public function get_all_comments($offset, $limit){
      return $this->dao->get_all_comments($offset, $limit);
    }
  public function get_comments_by_movieID($MovieID){
        return $this->dao->get_comments_by_movieID($MovieID);
      }
    public function delete($id){
        return $this->dao->delete($id);
      }
      public function add($movie_rat_rew){
          if (!isset($movie_rat_rew['comments'])) throw new Exception("comments is missing");
          return parent::add($movie_rat_rew);
        }
  }

?>
