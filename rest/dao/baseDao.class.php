<?php

require_once dirname(__FILE__)."/../config.php";
class baseDao {
protected  $connection;

public function __construct() {
  try {
    $this->connection = new PDO("mysql:host=".config::DB_HOST.";dbname=".config::DB_SCHEME, config::DB_USERNAME, config::DB_PASSWORD);
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}

public function insert() {

}

public function update($table, $userID, $entity, $id_column='userID') {
  $query = "UPDATE ${table} SET ";
  foreach($entity as $name => $value){
    $query .= $name ."= :". $name. ", ";
  }
  $query = substr($query, 0, -2);
  $query .= " WHERE ${id_column} = :userID";

  $stmt= $this->connection->prepare($query);
  $entity['userID'] = $userID;
  $stmt->execute($entity);
}

public function query($query, $params){
  $stmt = $this->connection->prepare($query);
  $stmt->execute($params);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

  public function query_unique($query, $params){
    $results = $this->query($query, $params);
    return reset($results);
}
}
 ?>
