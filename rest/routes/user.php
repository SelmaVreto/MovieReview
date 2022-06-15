<?php

/**
 * @OA\Get(path="/user", tags={"user"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all user notes from the API. ",
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /user', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::userService()->get_user_by_name($search, $offset, $limit));
   Flight::json(Flight::userService()->get_user_by_surname($search, $offset, $limit));

});

 ?>
