<?php
/**
 * @OA\Get(path="/movie", tags={"movies"}, security={{"ApiKeyAuth": {}}},
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
 * @OA\Get(path="/mo", tags={"nonreg"},
 *         summary="Return all movies from API. ",
 *         @OA\Response( response=200, description="List of movies for non-reg.")
 * )
 */
Flight::route('GET /mo', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

   Flight::json(Flight::movieService()->get_movie($search, $offset, $limit));
});
/**
 * @OA\Get(path="/mo/genre/{id}", tags={"nonreg"},
 *         summary="Return movie by genre from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of genre"),
 *         @OA\Response( response=200, description="movies for non-reg group by genre.")
 * )
 */
 Flight::route('GET /mo/genre/@id', function($genreID){
    Flight::json(Flight::movieService()->get_movie_by_genre($genreID));
 });
 /**
  * @OA\Get(path="/mo/director/{id}", tags={"nonreg"},
  *         summary="Return movie by genre from API. ",
  *     @OA\Parameter(in="path", name="id", example=1, description="Id of director"),
  *         @OA\Response( response=200, description="movies for non-reg group by directors.")
  * )
  */
  Flight::route('GET /mo/director/@id', function($directorsID){
     Flight::json(Flight::movieService()->get_movie_by_director($directorsID));
  });
  /**
   * @OA\Get(path="/mo/year/{id}", tags={"nonreg"},
   *         summary="Return movie by genre from API. ",
   *     @OA\Parameter(in="path", name="id", example=2021, description="Id of year"),
   *         @OA\Response( response=200, description="movies for non-reg group by year.")
   * )
   */
  Flight::route('GET /mo/year/@id', function($movie_year){
     Flight::json(Flight::movieService()->get_movie_by_year($movie_year));
  });
/**
 * @OA\Get(path="/movie/{id}", tags={"movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return movie by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of movie"),
 *     @OA\Response(response="200", description="One movie.")
 * )
 */
Flight::route('GET /movie/@id', function($MovieID){
  Flight::json(Flight::movieService()->get_by_id($MovieID));
  });
/**
 * @OA\Get(path="/movie/genre/{id}", tags={"movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return movie by genre from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of genre"),
 *         @OA\Response( response=200, description="movies for reg. group by genre.")
 * )
 */
Flight::route('GET /movie/genre/@id', function($genreID){
   Flight::json(Flight::movieService()->get_movie_by_genre($genreID));
});
/**
 * @OA\Get(path="/movie/director/{id}", tags={"movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return movie by director from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of director"),
 *         @OA\Response( response=200, description="movies for reg. group by directors.")
 * )
 */
Flight::route('GET /movie/director/@id', function($directorsID){
   Flight::json(Flight::movieService()->get_movie_by_director($directorsID));
});
/**
 * @OA\Get(path="/movie/year/{id}", tags={"movies"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return movie by year from API. ",
 *     @OA\Parameter(in="path", name="id", example=2021, description="Id of year"),
 *         @OA\Response( response=200, description="movies for reg. group by year.")
 * )
 */
Flight::route('GET /movie/year/@id', function($movie_year){
   Flight::json(Flight::movieService()->get_movie_by_year($movie_year));
});


 ?>
