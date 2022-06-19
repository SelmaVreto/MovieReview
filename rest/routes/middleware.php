// <?php
// FILTER BASED MIDDLWARE
// Flight::before('start', function(&$params, &$output){
//
//   if (Flight::request()->url == '/swagger') return TRUE;
//
//   if (str_starts_with(Flight::request()->url, '/user/')) return TRUE;
//
//   $headers = getallheaders();
//   $token = @$headers['Authentication'];
//ovo iznad probano u user/id metodi i radilo kako treba
//   try {
//     $decoded = (array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ["HS256"]); //sumnjam na JWT
//     Flight::set('user', $decoded);
//     // ADMIN - create set of routes /admin/something
//     // USER - set of routes for regular users
//     // USER_READ_ONLY - block POST and PUT methods
//     return TRUE;
//   } catch (\Exception $e) {
//     Flight::json(["message" => $e->getMessage()], 401);
//     die;
//   }
// });
/* ROUTE BASED MIDDLWARE */
// Flight::route('/user/*', function(){
//     if (str_starts_with(Flight::request()->url, '/user/')) return TRUE;
//
//     $headers = getallheaders();
//     $token = @$headers['Authentication'];
//  ovo iznad probano u user/id metodi i radilo kako treba
//     try {
//       $decoded = (array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ["HS256"]); //sumnjam na JWT
//       Flight::set('user', $user);
//       if(Flight::request()->method != "GET" && $user["r"] =="USER_READ_ONLY"){
//     throw new \Exception("This user can ready only", 403);
//       }
//       // ADMIN - create set of routes /admin/something
//       // USER - set of routes for regular users
//       // USER_READ_ONLY - block POST and PUT methods
//       return TRUE;
//     } catch (\Exception $e) {
//       Flight::json(["message" => $e->getMessage()], 401);
//       die;
//     }
// });
// Flight::route('/admin/*', function(){
//   try {
//   $user = (array)\Firebase\JWT\JWT::decode(Flight::header("Authentication"), Config::JWT_SECRET, ["HS256"]);
//   if ($user['r'] != "ADMIN"){
//     throw new Exception("Admin access required", 403);
//   }
//   Flight::set('user', $user);
//   return TRUE;
// } catch (\Exception $e) {
//   Flight::json(["message" => $e->getMessage()], 401);
//   die;
// }
// });
// ?>
