<?php
/**
 * @OA\Get(path="/admin/movie", tags={"a-movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movies from API. ",
 *         @OA\Response( response=200, description="List of movies.")
 * )
 */
Flight::route('GET /admin/movie', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

   Flight::json(Flight::movieService()->get_movie($search, $offset, $limit));
  //Flight::json(Flight::movieService()->get_movie_by_year($search, $offset, $limit));
   // Flight::json(Flight::movieService()->get_movie_by_genre($search, $offset, $limit));
   // Flight::json(Flight::movieService()->get_movie_by_director($search, $offset, $limit));

});
Flight::route('GET /movie/genre/@id', function($genreID){

   Flight::json(Flight::movieService()->get_movie_by_genre($genreID));

});
Flight::route('GET /movie/director/@id', function($directorsID){

   Flight::json(Flight::movieService()->get_movie_by_director($directorsID));

});
/**
 * @OA\Get(path="/movie", tags={"all-movies"},
 *         summary="Return all movies from API. ",
 *         @OA\Response( response=200, description="List of movies.")
 * )
 */
Flight::route('GET /movie', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

   Flight::json(Flight::movieService()->get_movie($search, $offset, $limit));
});
/**
 * @OA\Get(path="/user/movie", tags={"u-movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movies from API. ",
 *         @OA\Response( response=200, description="List of movies.")
 * )
 */
Flight::route('GET /user/movie', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::movieService()->get_movie($search, $offset, $limit));
   //Flight::json(Flight::movieService()->get_movie_by_year($search, $offset, $limit));
   // Flight::json(Flight::movieService()->get_movie_by_genre($search, $offset, $limit));
   // Flight::json(Flight::movieService()->get_movie_by_director($search, $offset, $limit));

});
/**
 * @OA\Get(path="/admin/movie/{id}", tags={"a-movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return muvie by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of movie"),
 *     @OA\Response(response="200", description="One movie.")
 * )
 */
Flight::route('GET /admin/movie/@id', function($MovieID){
  Flight::json(Flight::movieService()->get_by_id($MovieID));
  });
  /**
   * @OA\Get(path="/movie/{id}", tags={"all-movies"},
   *         summary="Return muvie by id from API. ",
   *     @OA\Parameter(in="path", name="id", example=1, description="Id of movie"),
   *     @OA\Response(response="200", description="One movie.")
   * )
   */
  Flight::route('GET /movie/@id', function($MovieID){
    Flight::json(Flight::movieService()->get_by_id($MovieID));
    });
  /**
   * @OA\Get(path="/user/movie/{id}", tags={"u-movies"}, security={{"ApiKeyAuth": {}}},
   *         summary="Return muvie by id from API. ",
   *     @OA\Parameter(in="path", name="id", example=1, description="Id of movie"),
   *     @OA\Response(response="200", description="One movie.")
   * )
   */
  Flight::route('GET /user/movie/@id', function($MovieID){
    Flight::json(Flight::movieService()->get_by_id($MovieID));
});
/**
* @OA\Post(path="/admin/movie", tags={"a-movies"}, security={{"ApiKeyAuth": {}}},
*         summary="Add movie in API. ",
*   @OA\RequestBody(description="Basic movie info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="movie_title", type="string", example="",	description="name of directors" ),
*    				 @OA\Property(property="movie_year", type="int", example="",	description="name of directors" ),
*    				 @OA\Property(property="movie_summary", type="string", example="",	description="name of directors" )
*          )
*       )
*     ),
*  @OA\Response(response="200", description="Movie that has been added into database .")
* )
*/
Flight::route('POST /admin/movie', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieService()->add($data));
});


 ?>
