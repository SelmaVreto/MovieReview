<?php

Flight::route('GET /directors', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

   Flight::json(Flight::directorsService()->get_directors_by_name($search, $offset, $limit));
   Flight::json(Flight::directorsService()->get_directors_by_surname($search, $offset, $limit));

});

Flight::route('GET /directors/@id', function($id){
  Flight::json(Flight::directorsService()->get_by_id($id));


});


Flight::route('POST /directors', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::directorsService()->add($data));
});

Flight::route('PUT /directors/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::directorsService()->update($id, $data));
});

 ?>
