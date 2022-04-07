<?php
require_once dirname(__FILE__)."/baseDao.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class userDao extends baseDao {

  public function __construct(){
    parent::__construct("user");
  }

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


}
?>
