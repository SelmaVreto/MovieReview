<?php
/**
 * @OA\Info(title="My First API", version="0.1")
 * @OA\OpenApi(
 *   @OA\Server(url="http://localhost/movies/rest/", description="dev environment")
 *   @OA\Server(url="http://movie.biznet.ba/api", description="producrtion environment")
 * )
 */

/**
 * @OA\Get(
 *     path="/user", tags={"users"},
 *     @OA\Parameter(@OA\Schema(type="integer", in="query", name="offset", default=0, description="Offset for pagination"),
 *     @OA\Parameter(@OA\Schema(type="integer", in="query", name="limit", default=25, description="Limit for pagination"),
 *     @OA\Parameter(@OA\Schema(type="string", in="query", name="search", description="search string"),
 *     @OA\Response(response="200", description="List user from db")
 * )
 */
Flight::route('GET /user', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::userService()->get_user_by_name($search, $offset, $limit));
   Flight::json(Flight::userService()->get_user_by_surname($search, $offset, $limit));

});
//
// Flight::route('GET /user', function($offser,$limit){
//   Flight::json(Flight::movieService()->get_all(0,10));
//
// });

/**
 * @OA\Get(path="/user/{id}",tags={"users"},
 *     @OA\Parameter(@OA\Schema(type="integer"), in="path", name="id", default=1, description="id of user"),
 *     @OA\Response(response="200", description="fetch individual user")
 * )
 */
Flight::route('GET /user/@id', function($id){
  Flight::json(Flight::userService()->get_by_id($id));

});

/**
 * @OA\Post(path="/user",
*  @OA\RequestBody(description="objest that needs to be added", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="force_push", type="string", example="",	description="" ),
*          )
*        )
*     ),

 *     @OA\Response(response="200", description="Add user")
 * )
 */
Flight::route('POST /user', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->add($data));
});

/**
 * @OA\Post(path="/user/register",
 *     @OA\Response(response="200", description="Register user")
 * )
 */
Flight::route('POST /user/register', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->register($data));
});
/**
 * @OA\Put(path="/user/{id}",
 *     @OA\Parameter(@OA\Schema(type="integer"), in="path", allowReserved=true, name="id", example=1),
 *     @OA\Response(response="200", description="Update user based on id")
 * )
 */
Flight::route('PUT /user/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieService()->update($id, $data));
});

/**
 * @OA\Get(path="/users/confirm/{token}", tags={"users"},
 *     @OA\Parameter(type="string", in="path", name="token", default=123, description="Temporary token for activating account"),
 *     @OA\Response(response="200", description="Message upon successfull activation.")
 * )
 */
Flight::route('GET /confirm/@token', function($token){
  Flight::json(Flight::jwt(Flight::userService()->confirm($token)));
  Flight::json(["message" => "Your account has been activated"]);
});
 ?>
