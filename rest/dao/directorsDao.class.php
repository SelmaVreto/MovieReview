<?php

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

}

?>
