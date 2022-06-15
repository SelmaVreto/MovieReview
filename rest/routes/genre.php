<?php
/**
 * @OA\Get(path="/genre", tags={"genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movie from API. ",
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /genre', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::genreService()->get_genre($search, $offset, $limit));

});
/**
 * @OA\Get(path="/genre/{id}", tags={"genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return genre by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of genre"),
 *     @OA\Response(response="200", description="Fetch individual note")
 * )
 */
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
