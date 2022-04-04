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

public function insert($table, $entity){
    $query = "INSERT INTO ${table} (";
    foreach ($entity as $column => $value) {
      $query .= $column.", ";
    }
    $query = substr($query, 0, -2);
    $query .= ") VALUES (";
    foreach ($entity as $column => $value) {
      $query .= ":".$column.", ";
    }
    $query = substr($query, 0, -2);
    $query .= ")";

    $stmt= $this->connection->prepare($query);
    $stmt->execute($entity); // sql injection prevention
    $entity['Userid'] = $this->connection->lastInsertId();
    return $entity;
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
