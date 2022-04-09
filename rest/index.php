<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/dao/movieDao.class.php';
require_once dirname(__FILE__).'/dao/genreDao.class.php';

/* utility function for reading query parameters from URL */
Flight::map('query', function($name, $default_value = NULL){
  $request = Flight::request();
  $query_param = @$request->query->getData()[$name];
  $query_param = $query_param ? $query_param : $default_value;
  return $query_param;
});

Flight::register('genreDao', 'genreDao');
require_once dirname(__FILE__).'/routes/genre.php';

Flight::register('movieDao', 'movieDao');

Flight::route('/', function(){
  echo "Hello";
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
