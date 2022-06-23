<?php
/**
 * @OA\Get(path="/admin/movie", tags={"a-movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movie from API. ",
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /admin/movie', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::movieService()->get_movie($search, $offset, $limit));
   Flight::json(Flight::movieService()->get_movie_by_year($search, $offset, $limit));
   // Flight::json(Flight::movieService()->get_movie_by_genre($search, $offset, $limit));
   // Flight::json(Flight::movieService()->get_movie_by_director($search, $offset, $limit));

});
/**
 * @OA\Get(path="/user/movie", tags={"u-movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movie from API. ",
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /user/movie', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::movieService()->get_movie($search, $offset, $limit));
   Flight::json(Flight::movieService()->get_movie_by_year($search, $offset, $limit));
   // Flight::json(Flight::movieService()->get_movie_by_genre($search, $offset, $limit));
   // Flight::json(Flight::movieService()->get_movie_by_director($search, $offset, $limit));

});
/**
 * @OA\Get(path="/admin/movie/{id}", tags={"a-movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return movie by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of movies"),
 *     @OA\Response(response="200", description="Fetch individual note")
 * )
 */
Flight::route('GET /movie/@id', function($MovieID){
  Flight::json(Flight::movieService()->get_by_id($MovieID));
  });
  /**
   * @OA\Get(path="/user/movie/{id}", tags={"u-movies"}, security={{"ApiKeyAuth": {}}},
   *         summary="Return movie by id from API. ",
   *     @OA\Parameter(in="path", name="id", example=1, description="Id of movies"),
   *     @OA\Response(response="200", description="Fetch individual note")
   * )
   */
  Flight::route('GET /user/movie/@id', function($MovieID){
    Flight::json(Flight::movieService()->get_by_id($MovieID));
});
/**
* @OA\Post(path="/admin/movie", tags={"a-movies"}, security={{"ApiKeyAuth": {}}},
*         summary="add genre in API. ",
*   @OA\RequestBody(description="Basic user info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="movie_title", type="string", example="",	description="name of directors" ),
*    				 @OA\Property(property="movie_year", type="int", example="",	description="name of directors" ),
*    				 @OA\Property(property="movie_summary", type="string", example="",	description="name of directors" )
*          )
*       )
*     ),
*  @OA\Response(response="200", description="Directors that has been added into database .")
* )
*/
Flight::route('POST /admin/movie', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieService()->add($data));
});


 ?>
