<?php
/**
 * @OA\Get(path="/admin/directors", tags={"a-directors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all directors  from the API. ",
 *         @OA\Response( response=200, description="List of directors.")
 * )
 */
Flight::route('GET /admin/directors', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

      Flight::json(Flight::directorsService()->get_directors_by_name($search, $offset, $limit));

});
/**
 * @OA\Get(path="/user/directors", tags={"u-directors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all directors  from the API. ",
 *         @OA\Response( response=200, description="List of directors.")
 * )
 */

Flight::route('GET /user/directors', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
  $search = Flight::query('search');

    if ($search){
      Flight::json(Flight::directorsDao()->get_directors_by_name($search, $offset, $limit));
    }else{
      Flight::json(Flight::directorsDao()->get_all_directors());
    }
});
/**
 * @OA\Get(path="/admin/directors/{id}", tags={"a-directors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return directors by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of director"),
 *     @OA\Response(response="200", description="One director.")
 * )
 */
Flight::route('GET /admin/directors/@id', function($id){
  Flight::json(Flight::directorsService()->get_by_id($id));
});
Flight::route('GET /directors/@id', function($id){
  Flight::json(Flight::directorsService()->get_by_id($id));
});
/**
 * @OA\Get(path="/user/directors/{id}", tags={"u-directors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return directors by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of director"),
 *     @OA\Response(response="200", description="One director.")
 * )
 */
Flight::route('GET /user/directors/@id', function($id){
  Flight::json(Flight::directorsService()->get_by_id($id));
});
/**
 * @OA\Post(path="/admin/directors", tags={"a-directors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Add director in API.",
 *   @OA\RequestBody(description="Basic user info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
*    				 @OA\Property(property="directors_name", type="string", example="",	description="name of directors" ),
*    				 @OA\Property(property="directors_surname", type="string", example="",	description="surname of directors" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Directors that has been added into database .")
 * )
 */
Flight::route('POST /admin/directors', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::directorsService()->add($data));
});


 ?>
