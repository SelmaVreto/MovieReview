<?php
/**
 * @OA\Get(path="/genre", tags={"genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all genres from API. ",
 *         @OA\Response( response=200, description="List of genres.")
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
 *     @OA\Response(response="200", description="One genre.")
 * )
 */
Flight::route('GET /genre/@id', function($id){
  Flight::json(Flight::genreService()->get_by_id($id));
});
/**
 * @OA\Get(path="/selma/{id}", tags={"genre"},
 *         summary="Return genre by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of genre"),
 *     @OA\Response(response="200", description="One genre.")
 * )
 */
Flight::route('GET /selma/@id', function($id){
  Flight::json(Flight::genreService()->get_by_id($id));
});
 ?>
