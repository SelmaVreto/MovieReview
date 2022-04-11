<?php
require_once dirname(__FILE__)."/userDao.class.php";
require_once dirname(__FILE__).'/../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


Flight::route('GET /user', function($offser,$limit){
  Flight::json(Flight::movieService()->get_all(0,10));

});

Flight::route('GET /movie/@id', function($id){
  Flight::json(Flight::movieService()->get_by_id($id));

});

Flight::route('POST /movie', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieService()->add($data));
});

Flight::route('PUT /movie/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieService()->update($id, $data));
});

 ?>
