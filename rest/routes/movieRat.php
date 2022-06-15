<?php

/**
 * @OA\Get(path="/movieRat", tags={"movie rating"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movie rating from the API. ",
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /movieRat', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

   Flight::json(Flight::movieRatService()->get_all_comments($offset, $limit));
});
/**
 * @OA\Get(path="/movieRat/{id}", tags={"movie rating"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return rating by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of rating"),
 *     @OA\Response(response="200", description="Fetch individual note")
 * )
 */
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
