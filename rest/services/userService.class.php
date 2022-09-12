<?php
require_once dirname(__FILE__).'/../dao/userDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';
require_once dirname(__FILE__).'/../clients/SMTPClient.class.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class userService extends baseService{

private $smtpClient;
  public $dao;
  public function __construct(){
    $this->dao = new userDao();
    $this->smtpClient = new SMTPClient();
  }

  public function get_by_id($id){
     $user = $this->dao->get_by_id($id);
      return $user;
    }

  public function get_user_by_email($search, $offset, $limit){
    if ($search){
      return $this->dao->get_user_by_email($search, $offset, $limit);
    }else{
      return $this->dao->get_all_users($offset, $limit);
    }
  }

  public function register($user){
     try{
       $dao= new userDao();
     $user = $dao->add_user([
       "name" => $user['name'],
       "surname" => $user['surname'],
       "username" => $user['username'],
       "email" => $user['email'],
       "status" =>"PENDING",
       "password" => $user['password'],
       "role" =>"USER",
       "created_at" => date(Config::DATE_FORMAT),
       "token" => md5(random_bytes(16))
     ]);
   } catch(\Exception $e){
       throw $e;
     }
     $this->smtpClient->send_register_user_token($user);
    return $user;
  }

  public function confirm($token){
    $user = $this->dao->get_user_by_token($token);

    if (!isset($user['id'])) throw new Exception("Invalid token", 400);
    $this->dao->update_user($user['id'], ["status" => "ACTIVE"]);//, 'token' => NULL
    return $user;

}
public function login($user){
  $db_user = $this->dao->get_user_by_email($user['email']);

  if ($db_user['password'] != $user['password']) throw new Exception("Invalid password", 400);
  if ($db_user['email'] != $user['email']) throw new Exception("Invalid email", 400);
  if ($db_user['status'] != 'ACTIVE') throw new Exception("Account needs to be activated", 400);

 $jwt = JWT::encode(["exp" => (time() + Config::JWT_TOKEN_TIME), "id" => $db_user["id"], "r" => $db_user["role"]], "JWT_SECRET", 'HS256');

  return  ["token" => $jwt];
  // return $db_user;
}

}
?>
