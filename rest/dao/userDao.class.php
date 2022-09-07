<?php
require_once dirname(__FILE__)."/baseDao.class.php";

class userDao extends baseDao {

  public function __construct(){
    parent::__construct("user");
  }


 public function get_user_by_id($userID) {
    return $this->query_unique("SELECT * FROM user WHERE userID = :user_id", ["user_id" => $userID]);
  }

//parcijalni update podataka by id
  public function update_user($userID, $user){
    $this->execute_update("user", $userID, $user);
}
public function get_user_by_email($email) {
    return $this->query_unique("SELECT * FROM user WHERE email = :email", ["email" => $email]);
 }
public function update_user_by_email($email, $user){
    $this->execute_update("user", $email, $user, "email");
  }

public function get_user_by_token($token){
      return $this->query_unique("SELECT * FROM user WHERE token = :token", ["token" => $token]);
    }

    public function add_user($user){
   return $this->insert("user", $user);
 }

}
?>
