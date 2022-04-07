<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__).'/../vendor/autoload.php';

Flight::route('/', function(){
  echo "Hello";
});

Flight::route('/genre', function(){
  $dao = new genreDao();
});
Flight::route('/3', function(){
  echo "Hello Selma";
});
Flight::route('/4', function(){
  echo "Hello Selma";
});
Flight::route('/5', function(){
  echo "Hello Selma";
});

Flight::start();

?>
