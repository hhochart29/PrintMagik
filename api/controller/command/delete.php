<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/configdb.php';
include_once '../../objects/command.php';

$database = new Database();
$db       = $database->getConnection();

$entity = new Command($db);

// Test before Front-end
//$id = '5';

$id     = isset($_POST['id']) ? $_POST['id'] : die();

$stmt     = $entity->delete($id);

if ($stmt == true) {
    echo '{';
    echo '"message": "Product was Command."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to delete Command."';
    echo '}';
}