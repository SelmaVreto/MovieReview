<?php
require_once dirname(__FILE__)."/baseDao.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class genreDao extends baseDao {

  public function __construct(){
    parent::__construct("genre");
  }

  public function get_all_genre() {
    return $this->query("SELECT * FROM genre", []);
    }

  public function get_by_idg($id){
        return $this->query("SELECT * FROM genre WHERE id = :id", ["id" => $id]);
      }

  public function get_genre($search, $offset, $limit){
    return $this->query("SELECT *
                         FROM genre
                         WHERE LOWER(genre_name) LIKE CONCAT('%', :genre_name, '%')
                         LIMIT ${limit} OFFSET ${offset}", ["genre_name" => strtolower($search)]);
  }

    }

?>
