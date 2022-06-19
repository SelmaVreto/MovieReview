<?php
require_once dirname(__FILE__).'/../dao/userDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';
require_once dirname(__FILE__).'/../clients/SMTPClient.class.php';

use \Firebase\JWT\JWT;

class userService extends baseService{

private $smtpClient;
  public $dao;
  public function __construct(){
    $this->dao = new userDao();
    //instanca
    $this->smtpClient = new SMTPClient();

  }
  public function get_by_id($id){
     $user = $this->dao->get_by_id($id);
     // $this->smtpClient->send_register_user_token($user);
      return $user;
    }
  public function get_all(){
      return $this->dao->get_all_directors();
    }
  public function get_user_by_name($search, $offset, $limit){//by name
    if ($search){
      return $this->dao->get_user_by_name($search, $offset, $limit);
    }else{
      return $this->dao->get_all_users($offset, $limit);
    }
  }
  public function get_user_by_surname($search, $offset, $limit){
    if ($search){
      return $this->dao->get_user_by_surname($search, $offset, $limit);
    }else{
      return $this->dao->get_all_users($offset, $limit);
    }
  }
  public function add($user){
       if (!isset($user['name'])) throw new Exception("Name is missing");
       $user['created_at'] = date(Config::DATE_FORMAT);
     }
  public function register($user){
     // if (!isset($user['username'])) throw new Exception("Username field is required");
     try{
       $dao= new userDao();
     $user = $dao->add_user([
       // "id" => $user['id'],
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
    //this->dao->commit();
   } catch(\Exception $e){
       throw $e;
     }
     $this->smtpClient->send_register_user_token($user);
    return $user;
    //    return $db_user;

  }

  public function confirm($token){
    $user = $this->dao->get_user_by_token($token);

    if (!isset($user['id'])) throw new Exception("Invalid token", 400);
    $this->dao->update_user($user['id'], ["status" => "ACTIVE"]);//, 'token' => NULL

    return $user;
  //  return $db_user;

}
public function login($user){
  $db_user = $this->dao->get_user_by_email($user['email']);

  if ($db_user['password'] != $user['password']) throw new Exception("Invalid password", 400);
  if ($db_user['email'] != $user['email']) throw new Exception("Invalid email", 400);
  if ($db_user['status'] != 'ACTIVE') throw new Exception("Account needs to be activated", 400);
  $key = 'example_key';
  $payload = [
    'id' => '$db_user["id"]',
    'role' => '$db_user["role"]'
];
$jwt = JWT::encode($payload, $key, 'HS256');

  // $jwt = \Firebase\JWT\JWT::encode(["id" => $db_user["id"], "r" => $db_user["role"]], Config::JWT_SECRET);
//  za token expire time  $jwt = \Firebase\JWT\JWT::encode(["exp" => (time() + Config::JWT_TOKEN_TIME), "id" => $db_user["id"],  "r" => $db_user["role"]], Config::JWT_SECRET);

  return  ["token" => $jwt];
  //return $db_user;


}
public function forgot($user){
  $db_user = $this->dao->get_user_by_email($user['email']);

  $db_user = $this->update($db_user['id'], ['token' => md5(random_bytes(16)), 'token_created_at' => date(Config::DATE_FORMAT)]);
  $this->smtpClient->send_user_recovery_token($db_user);

}
public function reset($user){
  $db_user = $this->dao->get_user_by_token($user['token']);
  if (!isset($user['id'])) throw new Exception("Invalid token", 400);
  //if(strtotime(date(Config::DATE_FORMAT)) - strtotime($db_user['token_created_at'])>300) throw new Exception("Invalid token", 400);
  $this->update($db_user['id'], ['password' => md5($user['password'])]);//, 'token' => NULL
  return $db_user;

}

}
?>
