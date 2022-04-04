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

 public function add_user($user){
   return $this->insert("user", $user);

 }

//parcijalni update podataka by id
  public function update_user($userID, $user){
    $this->update("user", $userID, $user);
}

public function update_user_by_email($email, $user){
    $this->update("user", $email, $user, "email");
  }

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

}
?>
