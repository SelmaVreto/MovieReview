<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__).'/../vendor/autoload.php';
require dirname(__FILE__).'/dao/movieDao.class.php';
require dirname(__FILE__).'/dao/genreDao.class.php';

Flight::register('genreDao', 'genreDao');
Flight::register('movieDao', 'movieDao');

Flight::route('/', function(){
  echo "Hello";
});

Flight::route('GET /genre', function(){
  Flight::json(Flight::genreDao()->get_all(0,10));
});

Flight::route('GET /genre/@id', function($id){
  Flight::json(Flight::genreDao()->get_by_id($id));


});
Flight::route('POST /genre', function(){
  $request = Flight::request();
  $data = $request->data->getData();
  $dao = new genreDao();
  $genre = $dao->add($data);
  Flight::json($genre);
});

Flight::route('PUT /genre/@id', function($id){
  $dao = new genreDao();
  $request = Flight::request();
  $data = $request->data->getData();
  $dao->update($id,$data);
  $genre=$dao->get_by_id($id);
    Flight::json($genre);
});

Flight::route('GET /movie', function(){
  Flight::json(Flight::movieDao()->get_all(0,10));

});

Flight::route('GET /movie/@id', function($id){
  Flight::json(Flight::movieDao()->get_by_id($id));
});

Flight::route('POST /movie', function(){
  $request = Flight::request();
  $data = $request->data->getData();
  $dao = new movieDao();
  $movie = $dao->add($data);
  Flight::json($movie);
});

Flight::route('PUT /movie/@id', function($id){
  $dao = new movieDao();
  $request = Flight::request();
  $data = $request->data->getData();
  $dao->update($id,$data);
  $movie=$dao->get_by_id($id);
    Flight::json($movie);
});

Flight::start();

?>
