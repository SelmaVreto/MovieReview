<?php
/**
 * @OA\Get(path="/admin/genre", tags={"a-genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movie from API. ",
 *         @OA\Response( response=200, description="List of notes.")
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
 *         summary="Return all movie from API. ",
 *         @OA\Response( response=200, description="List of notes.")
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
 *         summary="Return admin genre by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of note"),
 *     @OA\Response(response="200", description="Fetch individual note")
 * )
 */
Flight::route('GET /admin/genre/@id', function($id){
  Flight::json(Flight::genreService()->get_by_id($id));
});
/**
 * @OA\Get(path="/user/genre/{id}", tags={"u-genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return user genre by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of note"),
 *     @OA\Response(response="200", description="Fetch individual note")
 * )
 */
Flight::route('GET /user/genre/@id', function($id){
  Flight::json(Flight::genreService()->get_by_id($id));
});
/**
 * @OA\Post(path="/admin/genre", tags={"a-genre"}, security={{"ApiKeyAuth": {}}},
 *         summary="add genre in API. ",
 *   @OA\RequestBody(description="Basic user info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
*    				 @OA\Property(property="genre_name", type="string", example="",	description="name of directors" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Directors that has been added into database .")
 * )
 */
Flight::route('POST /admin/genre', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::genreService()->add($data));
});


 ?>
