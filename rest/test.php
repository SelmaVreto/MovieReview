<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/userDao.class.php";
require_once dirname(__FILE__)."/dao/movieDao.class.php";
require_once dirname(__FILE__)."/dao/directorsDao.class.php";
require_once dirname(__FILE__)."/dao/movieRatDao.class.php";
require_once dirname(__FILE__)."/dao/genreDao.class.php";


$dao = new movieRatDao();
// $user = $user_dao->add_comm($comments);

// $directors = $dao -> get_all_comments();// $dao->add($campaing);
// print_r($directors);
//
// $movie = $dao -> get_comments_by_movieID(5);
// print_r($movie);
// $genre = $movie_id ->get_movie_by_genre(2);
//  print_r($genre);
$rat = [
  "userID" => "1",
  "movieID" => "1",
  "comments" => "proba",
  "date_of_comm" => date("Y-m-d H:i:s"),
  "rating" => "3"
];

$rat = $dao->add_comm($rat);
 print_r($rat);
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
