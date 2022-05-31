<?php

Flight::route('GET /movie', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::movieService()->get_movie($search, $offset, $limit));
   Flight::json(Flight::movieService()->get_movie_by_year($search, $offset, $limit));

});

Flight::route('GET /movie/@id', function($MovieID){
  Flight::json(Flight::movieService()->get_by_id($MovieID));


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
