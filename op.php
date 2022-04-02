<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("rest/dao/directorsDao.class.php");

$dao = new directorsDao();

$op = $_REQUEST['op'];

switch ($op) {
  case 'insert':
    $description = $_REQUEST['description'];
    $created = $_REQUEST['created'];
    $dao->add($description, $created);
    break;

  case 'delete':
    $id = $_REQUEST['id'];
    $dao->delete($id);
    echo "DELETED $id";
    break;

  case 'get':
  default:
    $results = $directorsDao->get_alll();
    print_r($results);
    break;
}
?>
