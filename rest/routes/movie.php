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

Flight::route('POST /admin/movie', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieService()->add($data));
});


 ?>
