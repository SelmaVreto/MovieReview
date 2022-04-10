<?php

Flight::route('GET /genre', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   if ($search){
     Flight::json(Flight::genreDao()->get_genre($search, $offset, $limit));
   }else{
     Flight::json(Flight::genreDao()->get_all($offset,$limit));
   }

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

 ?>
