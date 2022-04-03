<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/userDao.class.php";

$user_dao = new userDao();
// $user = $user_dao -> get_user_by_id(3);
// $user = $user_dao -> get_user_by_email("v.selmaaaa@gmail.com");
$user1 = [
  "email" => "senaida290@gmail.com"
];
// $user_dao->add_user($user1);
$user = $user_dao->update_user(7, $user1);


print_r($user);
?>
