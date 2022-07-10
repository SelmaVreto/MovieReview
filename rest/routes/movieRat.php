<?php
/**
 * @OA\Get(path="/admin/movieRat", tags={"a-movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all user notes from the API. ",
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /movieRat', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
   Flight::json(Flight::movieRatService()->get_all_comments($offset, $limit));
});
/**
 * @OA\Get(path="/user/movieRat", tags={"u-movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all user notes from the API. ",
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /user/movieRat', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
   Flight::json(Flight::movieRatService()->get_all_comments($offset, $limit));
});
/**
 * @OA\Get(path="/admin/movieRat/{id}", tags={"a-movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return user by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of note"),
 *     @OA\Response(response="200", description="Fetch individual note")
 * )
 */
Flight::route('GET /admin/movieRat/@id', function($MovieID){
  Flight::json(Flight::movieRatService()->get_comments_by_movieID($MovieID));
});
/**
 * @OA\Get(path="/user/movieRat/{id}", tags={"u-movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return user by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of note"),
 *     @OA\Response(response="200", description="Fetch individual note")
 * )
 */
Flight::route('GET /user/movieRat/@id', function($MovieID){
  Flight::json(Flight::movieRatService()->get_comments_by_movieID($MovieID));
});
/**
 * @OA\Post(path="/movieRat", tags={"a-movieRat"},
 *         summary="add genre in API. ",
 *   @OA\RequestBody(description="add comments", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
*    				 @OA\Property(property="commments", type="string", example="",	description="comments" ),
*    				 @OA\Property(property="userID", type="int", example="",	description="comments" ),
*    				 @OA\Property(property="movieID", type="int", example="",	description="comments" ),
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Directors that has been added into database .")
 * )
 */
Flight::route('POST /movieRat', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieRatService()->add($data));
});

/**
* @OA\Delete(
*     path="/movieRat/{id}", security={{"ApiKeyAuth": {}}},
*     description="Delete movie rating",
*     tags={"a-movieRat"},
*     @OA\Parameter(in="path", name="id", example=1, description="movieRat ID"),
*     @OA\Response(
*         response=200,
*         description="Note deleted"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('DELETE /movieRat/@id', function($id){
  Flight::movieRatService()->delete($id);
  Flight::json(["message" => "deleted"]);
});
 ?>
