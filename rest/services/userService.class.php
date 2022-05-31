<?php

require_once dirname(__FILE__).'/../dao/userDao.class.php';
require_once dirname(__FILE__). '/baseService.class.php';

class userService extends baseService{

  public function __construct(){
    $this->dao = new userDao();
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
      return $this->dao->get_all($offset, $limit);
    }
  }
  public function add($user){
       if (!isset($user['name'])) throw new Exception("Name is missing");
       $user['created_at'] = date(Config::DATE_FORMAT);
     }
  public function register($user){
     // if (!isset($user['username'])) throw new Exception("Username field is required");
     try{
     $user = parent::add([
       "id" => $user['id'],
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
    return $user;
  }
  public function confirm($token){
  $user = $this->dao->get_user_by_token($token);

  if (!isset($user['id'])) throw new Exception("Invalid token", 400);

  $this->dao->update($user['id'], ["status" => "ACTIVE", "token" => NULL]);

  return $user;
}
}
?>
