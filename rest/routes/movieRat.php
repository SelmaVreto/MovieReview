<?php

Flight::route('GET /movieRat', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

   Flight::json(Flight::movieRatService()->get_all_comments($offset, $limit));
});

Flight::route('GET /movieRat/@id', function($MovieID){
  Flight::json(Flight::movieRatService()->get_comments_by_movieID($MovieID));
});

Flight::route('POST /movieRat', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieRatService()->add($data));
});

Flight::route('PUT /movieRat/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::directorsService()->update($id, $data));
});

 ?>
