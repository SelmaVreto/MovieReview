<?php
/**
 * @OA\Get(path="/admin/genre", tags={"a-genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all genres from API. ",
 *         @OA\Response( response=200, description="List of genres.")
 * )
 */
Flight::route('GET /admin/genre', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

   Flight::json(Flight::genreService()->get_genre($search, $offset, $limit));
});
/**
 * @OA\Get(path="/user/genre", tags={"u-genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all genres from API. ",
 *         @OA\Response( response=200, description="List of genre.")
 * )
 */
Flight::route('GET /user/genre', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

   Flight::json(Flight::genreService()->get_genre($search, $offset, $limit));
});
/**
 * @OA\Get(path="/admin/genre/{id}", tags={"a-genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return genre by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of genre"),
 *     @OA\Response(response="200", description="One genre.")
 * )
 */
Flight::route('GET /admin/genre/@id', function($id){
  Flight::json(Flight::genreService()->get_by_id($id));
});
/**
 * @OA\Get(path="/user/genre/{id}", tags={"u-genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return genre by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of genre"),
 *     @OA\Response(response="200", description="One genre.")
 * )
 */
Flight::route('GET /user/genre/@id', function($id){
  Flight::json(Flight::genreService()->get_by_id($id));
});
/**
 * @OA\Post(path="/admin/genre", tags={"a-genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Add genre in API. ",
 *   @OA\RequestBody(description="Basic genre info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
*    				 @OA\Property(property="genre_name", type="string", example="",	description="name of genre" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Genre that has been added into database .")
 * )
 */
Flight::route('POST /admin/genre', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::genreService()->add($data));
});


 ?>
