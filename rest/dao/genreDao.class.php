<?php
require_once dirname(__FILE__)."/baseDao.class.php";

class genreDao extends baseDao {

  public function __construct(){
    parent::__construct("genre");
  }

  public function get_all_genre() {
    return $this->query("SELECT * FROM genre", []);
    }

  public function get_by_id($id){
        return $this->query("SELECT * FROM genre WHERE id = :id", ["id" => $id]);
      }
//potencijalno izbaciti
  public function get_genre($search, $offset, $limit){
    return $this->query("SELECT *
                         FROM genre
                         WHERE LOWER(genre_name) LIKE CONCAT('%', :genre_name, '%')
                         LIMIT ${limit} OFFSET ${offset}", ["genre_name" => strtolower($search)]);
  }
  public function add($genre){
    return $this->insert("genre", $genre);
  }

    }

?>
