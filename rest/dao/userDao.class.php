<?php
require_once dirname(__FILE__)."/baseDao.class.php";

class userDao extends baseDao {

  // public function get_user_by_email($email) {
  //   return $this->query_unique("SELECT * FROM user WHERE email = :email", ["email" => $email]);
  // }

  public function get_user_by_id($userID) {
    return $this->query_unique("SELECT * FROM user WHERE userID = :user_id", ["user_id" => $userID]);
  }

}
?>
