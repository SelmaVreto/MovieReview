<?php
/**
 * @OA\Get(path="/movieRat", tags={"movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all movies rating from API. ",
 *         @OA\Response( response=200, description="List of all reviews")
 * )
 */
Flight::route('GET /movieRat', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);
   Flight::json(Flight::movieRatService()->get_all_comments($offset, $limit));
});

/**
 * @OA\Get(path="/movieRat/{id}", tags={"movieRat"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all review by movieID from API.",
 *     @OA\Parameter(in="path", name="id", example=1, description="All rew of oone movie"),
 *     @OA\Response(response="200", description="One movie.")
 * )
 */
Flight::route('GET /movieRat/@id', function($MovieID){
  Flight::json(Flight::movieRatService()->get_comments_by_movieID($MovieID));
});

/**
* @OA\Post(path="/movieRat", tags={"movieRat"}, security={{"ApiKeyAuth": {}}},
*         summary="Add movie in API. ",
*   @OA\RequestBody(description="Basic movie info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="userID", type="int", example="",	description="which user of directors" ),
*    				 @OA\Property(property="movieID", type="int", example="",	description="which film directors" ),
*    				 @OA\Property(property="comments", type="string", example="",	description="your comment" ),
*    				 @OA\Property(property="rating", type="int", example="",	description="your comment" )
*          )
*       )
*     ),
*  @OA\Response(response="200", description="Movie review that has been added into database .")
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
*     tags={"movieRat"},
*     @OA\Parameter(in="path", name="id", example=21, description="movieRat ID"),
*     @OA\Response(
*         response=200,
*         description="Note deleted"
*     )
* )
*/
Flight::route('DELETE /movieRat/@id', function($id){
  Flight::movieRatService()->delete($id);
  Flight::json(["message" => "deleted"]);
});
 ?>
