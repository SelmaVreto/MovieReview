<?php
require_once dirname(__FILE__)."/baseDao.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class userDao extends baseDao {

 public function get_user_by_email($email) {
     return $this->query_unique("SELECT * FROM user WHERE email = :email", ["email" => $email]);
  }

public function get_user_by_id($userID) {
    return $this->query_unique("SELECT * FROM user WHERE userID = :user_id", ["user_id" => $userID]);
  }

// public function update_user_by_email($email, $user){
//     $this->execute_update("users", $email, $user, "email");
//   }

// public function get_users($search, $offset, $limit, $order = "-id"){
//   list($order_column, $order_direction) = self::parse_order($order);
//
//       return $this->query("SElECT *
//                        FROM user
//                        WHERE LOWER(name) LIKE CONCAT('%', :name, '%')
//                        ORDER BY ${order_column} ${order_direction}
//                        LIMIT ${limit} OFFSET ${offset}",
//                        ["name" => strtolower($search)]);
//  }
//
 public function add_user($user){
  $sql = "INSERT INTO user (name, surname, username, email, password) VALUES (:name, :surname, :username, :email, :password)";
  $stmt= $this->connection->prepare($sql);
 $stmt->execute($user);
}

public function update_user($userID, $user){
  $query = "UPDATE user SET ";
  foreach($user as $name => $value){
    $query .= $name ."= :". $name. ", ";
  }
  $query = substr($query, 0, -2);
  $query .= " WHERE userID = :userID";

  $stmt= $this->connection->prepare($query);
  $user['userID'] = $userID;
  $stmt->execute($user);
}
}
?>
