<?php
/**
 * @OA\Get(path="/admin/movieRat", tags={"a-movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movies rating from API. ",
 *         @OA\Response( response=200, description="List of all reviews")
 * )
 */
Flight::route('GET /admin/movieRat', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
   Flight::json(Flight::movieRatService()->get_all_comments($offset, $limit));
});
/**
 * @OA\Get(path="/user/movieRat", tags={"u-movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movies rating from the API. ",
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
 *         summary="Return all review by movieID from API.",
 *     @OA\Parameter(in="path", name="id", example=1, description="All rew of oone movie"),
 *     @OA\Response(response="200", description="One movie.")
 * )
 */
Flight::route('GET /admin/movieRat/@id', function($MovieID){
  Flight::json(Flight::movieRatService()->get_comments_by_movieID($MovieID));
});
/**
 * @OA\Get(path="/user/movieRat/{id}", tags={"u-movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all review by movieID from API.",
 *     @OA\Parameter(in="path", name="id", example=1, description="All rew of oone movie"),
 *     @OA\Response(response="200", description="One movie")
 * )
 */
Flight::route('GET /user/movieRat/@id', function($MovieID){
  Flight::json(Flight::movieRatService()->get_comments_by_movieID($MovieID));
});
/**
* @OA\Post(path="/user/movieRat", tags={"u-movieRat"}, security={{"ApiKeyAuth": {}}},
*         summary="Add movie in API. ",
*   @OA\RequestBody(description="Basic movie info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="userID", type="string", example="",	description="which user of directors" ),
*    				 @OA\Property(property="movieID", type="int", example="",	description="which film directors" ),
*    				 @OA\Property(property="comments", type="string", example="",	description="your comment" )
*          )
*       )
*     ),
*  @OA\Response(response="200", description="Movie review that has been added into database .")
* )
*/
Flight::route('POST /user/movieRat', function(){
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
