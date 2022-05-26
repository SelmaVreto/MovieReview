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
