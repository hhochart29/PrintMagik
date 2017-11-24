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
$id = 2;
$status = 5;

//$id    = isset($_POST['id']) ? $_POST['id'] : die();
//$status     = isset($_POST['status']) ? $_POST['status'] : die();

$stmt = $entity->updateStatus($id, $status);

if ($stmt == true) {
    echo '{';
    echo '"message": "Command was updated."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to update the Command Product."';
    echo '}';
}