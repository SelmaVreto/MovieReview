<?php
/** SWAGER
 * @OA\Info(title="Movies API Specs", version="0.2", @OA\Contact(email="selma.vreto@stu.ibu.edu.ba", name="Selma Vreto"))
 * @OA\OpenApi(
 *    @OA\Server(url="http://localhost/movies/rest", description="Development Environment" ),
 *    @OA\Server(url="https://todos.biznet.ba/rest", description="Production Environment" )
 * ),
 * @OA\SecurityScheme(securityScheme="ApiKeyAuth", type="apiKey", in="header", name="Authorization", name="Authorization" )
 */
/**
 * @OA\Get(path="/admin/user", tags={"user"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all user notes from the API. ",
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /admin/user', function(){
  $offset = Flight::query('offset', 0);
  $limit = Flight::query('limit', 10);

  $search = Flight::query('search');

   Flight::json(Flight::userService()->get_user_by_name($search, $offset, $limit));
   Flight::json(Flight::userService()->get_user_by_surname($search, $offset, $limit));

});
/**
 * @OA\Get(path="/admin/user/{id}", tags={"user"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return user by id from API. ",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of note"),
 *     @OA\Response(response="200", description="Fetch individual note")
 * )
 */
Flight::route('GET /admin/user/@id', function($id){
  // $headers = getallheaders();
  // print_r($headers['Authorization']);
  // die;
  //OVO GORE RADILO
  // if (Flight::get('user')['id'] != $id) throw new Exception("This account is not for you", 403);
  Flight::json(Flight::userService()->get_by_id($id));
});
/**
 * @OA\Post(path="/admin/user", tags={"user"}, security={{"ApiKeyAuth": {}}},
 *         summary="add user in API. ",
 *   @OA\RequestBody(description="Basic user info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
*    				 @OA\Property(property="name", type="string", example="Amila",	description="name of user" ),
*    				 @OA\Property(property="surname", type="string", example="Smajlovic",	description="surname of user" ),
*    				 @OA\Property(property="username", type="string", example="AmilaS",	description="username of user" ),
*    				 @OA\Property(property="email", type="string", example="amilica@gmail.com",	description="email of user" ),
*    				 @OA\Property(property="status", type="string", example="PANDING"),
*    				 @OA\Property(property="password", type="string", example="amilicaamilica",	description="password of user" ),
*    				 @OA\Property(property="role", type="string", example="user",	description="user or admin" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Account that has been added into database .")
 * )
 */

Flight::route('POST /admin/user', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->add($data));
});

/**
 * @OA\Post(path="/register",tags={"login"}, security={{"ApiKeyAuth": {}}},
 *         summary="register user in API. ",
*    @OA\RequestBody(description="objest that needs to be added", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="name", type="string", example="",	description="" ),
*    				 @OA\Property(property="surname", type="string", example="",	description="" ),
*    				 @OA\Property(property="username", type="string", example="",	description="" ),
*    				 @OA\Property(property="email", type="string", example="",	description="" ),
*    				 @OA\Property(property="status", type="string", example="PANDING",	description="" ),
*    				 @OA\Property(property="password", type="string", example="",	description="" ),
*    				 @OA\Property(property="role", type="string", example="",	description="" ),
*          )
*        )
*     ),
*  @OA\Response(response="200", description="Add user")
 * )
 */
Flight::route('POST /register', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->register($data));
});

/**
 * @OA\Put(path="/admin/user/{id}", tags={"user"},
 *         summary="update user from API. ",
 *     @OA\Parameter(@OA\Schema(type="integer"), in="path", allowReserved=true, name="id", example=1,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="name", type="string", example="",	description="" ),
*    				 @OA\Property(property="surname", type="string", example="",	description="" ),
*    				 @OA\Property(property="username", type="string", example="",	description="" ),
*    				 @OA\Property(property="email", type="string", example="",	description="" ),
*    				 @OA\Property(property="status", type="string", example="PANDING",	description="" ),
*    				 @OA\Property(property="password", type="string", example="",	description="" ),
*    				 @OA\Property(property="role", type="string", example="",	description="" ),
*          )
*        )
*     ),
 *     @OA\Response(response="200", description="Update user based on id")
 * )
 */
Flight::route('PUT /admin/user/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::movieService()->update($id, $data));
});

/**
 * @OA\Get(path="/confirm/{token}", tags={"login"},
 *         summary="confirm token ",
 *     @OA\Parameter(@OA\Schema(type="string"), in="path", name="token", description="temporary token for activating"),
 *     @OA\Response(response="200", description="Message upon successfull activation.")
 * )
 */
Flight::route('GET /confirm/@token', function($token){
  Flight::json(Flight::userService()->confirm($token));
  Flight::json(["message" => "Your account has been activated"]);
});
/**
 * @OA\Post(path="/login",tags={"login"},
 *         summary="register user in API. ",
*    @OA\RequestBody(description="objest that needs to be added", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="email", type="string", example="",	description="" ),
*    				 @OA\Property(property="password", type="string", example="",	description="" )
*          )
*        )
*     ),
*     @OA\Response(response="200", description="Message upon successfull activation.")
 * )
 */
Flight::route('POST /login', function(){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::userService()->login($data));
});
/**
 * @OA\Post(path="/forgot",tags={"login"},description="send recovery URL to users email address",
*    @OA\RequestBody(description="objest that needs to be added", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="email", type="string", example="",	description="" ),
*          )
*        )
*     ),
*     @OA\Response(response="200", description="Message that recovery link has been sent.")
 * )
 */
Flight::route('POST /forgot', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->forgot($data);
  Flight::json(["message"=>"Recovery link has been sent to your email"]);
});
/**
 * @OA\Post(path="/reset",tags={"login"},description="reset user password using recovery token",
*    @OA\RequestBody(description="objest that needs to be added", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				 @OA\Property(property="token", type="string", example="",	description="recovery token" ),
*    				 @OA\Property(property="password", type="string", example="",	description="new password" ),
*          )
*        )
*     ),
*     @OA\Response(response="200", description="Message that user has changed password.")
 * )
 */
Flight::route('POST /reset', function(){
  $data = Flight::request()->data->getData();
  Flight::userService()->reset($data);
  Flight::json(["message"=>"Password has been changed"]);

  /**
 * @OA\Get(path="/user/user", tags={"user"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Response(response="200", description="Fetch user account")
 * )
 */
Flight::route('GET /user/user', function(){
  Flight::json(Flight::userService()->get_by_id(Flight::get('user')['id']));

});
});
 ?>
