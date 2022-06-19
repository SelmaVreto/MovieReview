<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';

require_once dirname(__FILE__).'/services/genreService.class.php';
require_once dirname(__FILE__).'/services/directorsService.class.php';
require_once dirname(__FILE__).'/services/movieService.class.php';
require_once dirname(__FILE__).'/services/userService.class.php';
require_once dirname(__FILE__).'/services/movieRatService.class.php';
require_once dirname(__FILE__).'/dao/userDao.class.php';

// use \Firebase\JWT\JWT;

/* utility function for reading query parameters from URL */
Flight::map('query', function($name, $default_value = NULL){
  $request = Flight::request();
  $query_param = @$request->query->getData()[$name];
  $query_param = $query_param ? $query_param : $default_value;
  return $query_param;
});

/* error handling for our API */
// Flight::map('error', function(Exception $ex){
//   Flight::json(["message" => $ex->getMessage()], $ex->getCode() ? $ex->getCode() : 500);
// });

/* utility function for generating JWT token */
// Flight::map('jwt', function($user){
//   $jwt = \Firebase\JWT\JWT::encode(["exp" => (time() + Config::JWT_TOKEN_TIME), "id" => $user["id"], "aid" => $user["account_id"], "r" => $user["role"]], Config::JWT_SECRET);
//   return ["token" => $jwt];
// });

/* register Dao layer */
Flight::register('genreDao', 'genreDao');
Flight::register('directorsDao', 'directorsDao');
Flight::register('movieDao', 'movieDao');
Flight::register('movieRatDao', 'movieRatDao');
Flight::register('userDao', 'userDao');
/* register Business Logic layer services */
Flight::register('genreService', 'genreService');
Flight::register('directorsService', 'directorsService');
Flight::register('movieService', 'movieService');
Flight::register('userService', 'userService');
Flight::register('movieRatService', 'movieRatService');

/* REST API documentation endpoint */
Flight::route('GET /docs.json', function(){
  $openapi = \OpenApi\scan('routes');
  header('Content-Type: application/json');
  echo $openapi->toJson();
});

/* utility function for getting header parameters */
// Flight::map('header', function($name){
//   $headers = getallheaders();
//   return @$headers[$name];
// });

/* include all routes */
require_once dirname(__FILE__).'/routes/genre.php';
require_once dirname(__FILE__).'/routes/directors.php';
require_once dirname(__FILE__).'/routes/movie.php';
require_once dirname(__FILE__).'/routes/user.php';
require_once dirname(__FILE__).'/routes/movieRat.php';
// require_once dirname(__FILE__).'/routes/middleware.php';

Flight::start();

?>
