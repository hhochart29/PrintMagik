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
//$password = 'admin2';

$data = json_decode(file_get_contents("php://input"));

$mail     = $data->email;
$password = $data->password;
$stmt     = $entity->create($mail, $password);

if ($stmt == true) {
    echo '{';
    echo '"message": "User was created."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to create User."';
    echo '}';
}