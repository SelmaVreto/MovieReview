<?php

class directorsDao extends baseDao{

  public function __construct(){
    $servername = "localhost";
    $username = "moviesrandr";
    $password = "movie";
    $this->conn = new PDO("mysql:host=$servername;dbname=moviesr", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function add_directors($directors) {


    }


}

?>
