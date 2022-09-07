<?php

/**
 * @OA\Get(path="/directors", tags={"directors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all directors  from the API. ",
 *         @OA\Response( response=200, description="List of directors.")
 * )
 */

Flight::route('GET /directors', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

    if ($search){
      Flight::json(Flight::directorsDao()->get_directors_by_name($search, $offset, $limit));
      Flight::json(Flight::directorsDao()->get_directors_by_surname($search, $offset, $limit));
    }else{
      Flight::json(Flight::directorsDao()->get_all_directors());
    }
});

/**
 * @OA\Get(path="/directors/{id}", tags={"directors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return directors by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of director"),
 *     @OA\Response(response="200", description="One director.")
 * )
 */
Flight::route('GET /directors/@id', function($id){
  Flight::json(Flight::directorsService()->get_by_id($id));
});

 ?>
