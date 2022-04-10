<?php

Flight::route('GET /genre', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::genreService()->get_genre($search, $offset, $limit));

});

Flight::route('GET /genre/@id', function($id){
  Flight::json(Flight::genreService()->get_by_id($id));


});
Flight::route('POST /genre', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::genreService()->add($data));
});

Flight::route('PUT /genre/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::genreService()->update($id, $data));
});

 ?>
