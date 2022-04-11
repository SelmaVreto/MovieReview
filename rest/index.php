<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/dao/directorsDao.class.php';
require_once dirname(__FILE__).'/dao/genreDao.class.php';
require_once dirname(__FILE__).'/services/genreService.class.php';
require_once dirname(__FILE__).'/services/directorsService.class.php';


/* utility function for reading query parameters from URL */
Flight::map('query', function($name, $default_value = NULL){
  $request = Flight::request();
  $query_param = @$request->query->getData()[$name];
  $query_param = $query_param ? $query_param : $default_value;
  return $query_param;
});

/* register Dao layer */
Flight::register('genreDao', 'genreDao');
Flight::register('directorsDao', 'directorsDao');
/* register Business Logic layer services */
Flight::register('genreService', 'genreService');
Flight::register('directorsService', 'directorsService');
/* include all routes */
require_once dirname(__FILE__).'/routes/genre.php';
require_once dirname(__FILE__).'/routes/directors.php';

Flight::route('/', function(){
  echo "Hello";
});

Flight::start();

?>
