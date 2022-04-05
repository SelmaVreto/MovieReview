<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/userDao.class.php";
require_once dirname(__FILE__)."/dao/movieDao.class.php";
require_once dirname(__FILE__)."/dao/directorsDao.class.php";

$dao = new directorsDao();
$directors = $dao -> get_by_id(1);// $dao->add($campaing);
print_r($directors);

// $user = $user_dao -> get_user_by_id(3);
// $user = $user_dao -> get_user_by_email("v.selmaaaa@gmail.com");
// $movie = [
//   "movie_title" => "proba",
//   "movie_year" => 2000,
//   "movie_summary" => "proba",
//   "movie_rating" => "3",
//   "movie_director" => "proba",
//   "genre" => "proba"
// ];
// $dao->update(1, [
//   "end_date" => "2021-04-01 00:00:00",
//   "status" => "BLOCKED"
// ]);

// $movie = $Mdao -> add($movie);// $dao->add($campaing);
// print_r($movie);

// $user = $user_dao->add_user($user1);
// $user_dao->add_user($user1);
// $user = $user_dao->update_user(7, $user1);
// $user = $user_dao->update_user_by_email("azrabasic46@gmail.com", $user1);

?>
