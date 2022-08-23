<?php
require_once dirname(__FILE__)."/../config.php";

class baseDao {
protected  $connection;
private $table;

public function __construct($table){
  $this->table = $table;
  try {
    $this->connection = new PDO("mysql:host=".config::DB_HOST.";dbname=".config::DB_SCHEME, config::DB_USERNAME, config::DB_PASSWORD);
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}
  protected function insert($table, $entity){
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
    $entity['id'] = $this->connection->lastInsertId();
    return $entity;
  }

  protected function execute_update($table, $id, $entity, $id_column = "id"){
    $query = "UPDATE ${table} SET ";
    foreach($entity as $name => $value){
      $query .= $name ."= :". $name. ", ";
    }
    $query = substr($query, 0, -2);
    $query .= " WHERE ${id_column} = :id";

    $stmt= $this->connection->prepare($query);
    $entity['id'] = $id;
    $stmt->execute($entity);
  }

  protected function query($query, $params){
    $stmt = $this->connection->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  protected function query_unique($query, $params){
    $results = $this->query($query, $params);
    return reset($results);
  }

  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM ".$this->table_name." WHERE id=:id");
    $stmt->bindParam(':id', $id); // SQL injection prevention
    $stmt->execute();
  }

  public function update($id, $entity){
    $this->execute_update($this->table, $id, $entity);
  }

  public function get_by_id($id){
    return $this->query_unique("SELECT * FROM ".$this->table." WHERE id = :id", ["id" => $id]);
  }

 public function get_all($offset = 0, $limit = 10){ // offset -from, limit number of records
  return $this->query("SELECT *
    FROM ".$this->table."
    LIMIT ${limit} OFFSET ${offset}", []);
}
}
 ?>
