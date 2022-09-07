<?php
require_once dirname(__FILE__)."/baseDao.class.php";

class directorsDao extends baseDao{

  public function __construct(){
      parent::__construct("directors");
    }

  public function get_all_directors() {
    return $this->query("SELECT * FROM directors", []);
    }

  public function get_by_id($id){
      return $this->query_unique("SELECT * FROM directors WHERE id = :id", ["id" => $id]);
    }

  public function get_directors_by_name($search, $offset, $limit){
      return $this->query("SELECT *
                           FROM directors
                           WHERE LOWER(directors_name) LIKE CONCAT('%', :directors_name, '%')
                           LIMIT ${limit} OFFSET ${offset}", ["directors_name" => strtolower($search)]);
    }
    public function get_directors_by_surname($search, $offset, $limit){
        return $this->query("SELECT *
                             FROM directors
                             WHERE LOWER(directors_surname) LIKE CONCAT('%', :directors_surname, '%')
                             LIMIT ${limit} OFFSET ${offset}", ["directors_surname" => strtolower($search)]);
      }
}

?>
