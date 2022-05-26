<?php

Flight::route('GET /user', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::userService()->get_all_user($search, $offset, $limit));

});

Flight::route('GET /user', function($offser,$limit){
  Flight::json(Flight::movieService()->get_all(0,10));

});

Flight::route('GET /user/@id', function($id){
  Flight::json(Flight::userService()->get_by_id($id));

});

Flight::route('POST /user', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->add($data));
});

Flight::route('POST /user/register', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->register($data));
});

Flight::route('PUT /user/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieService()->update($id, $data));
});
Flight::route('GET /confirm/@token', function($token){
  Flight::json(Flight::jwt(Flight::userService()->confirm($token)));
});
 ?>
