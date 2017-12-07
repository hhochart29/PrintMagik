<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/configdb.php';
include_once '../../objects/user.php';

$database = new Database();
$db       = $database->getConnection();

$entity = new User($db);

// Test before Front-end
//$mail = 'admin2@admin.fr';

$data = json_decode(file_get_contents("php://input"));

$mail     = $data->email;
$stmt     = $entity->delete($mail);

if ($stmt == true) {
    echo '{';
    echo '"message": "User was deleted."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to delete User."';
    echo '}';
}