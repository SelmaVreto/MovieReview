<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/userDao.class.php";

$user_dao = new userDao();
$user = $user_dao -> get_user_by_id(3);
// $user = $user_dao -> get_user_by_email("v.selmaaaa@gmail.com");

print_r($user);

?>
