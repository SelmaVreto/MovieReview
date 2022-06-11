
<?php
require("../vendor/autoload.php");
$openapi = \OpenApi\scan(dirname(__FILE__)."/rest/routes");
header('Content-Type: application/json');
echo $openapi->toJson();
?>
