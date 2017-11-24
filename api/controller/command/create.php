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
//$user_id = 1;
//$status = 1;
//$adress = '10 place du centre';
//$products =
//    [
//        [
//            'id'       => 1,
//            'quantity' => 5,
//        ],
//        [
//            'id'       => 2,
//            'quantity' => 2,
//        ],
//    ];

//$user_id  = isset($_POST['user_id']) ? $_POST['user_id'] : die();
//$status   = isset($_POST['status']) ? $_POST['status'] : die();
//$adress   = isset($_POST['adress']) ? $_POST['adress'] : die();
//$products = isset($_POST['prodcuts']) ? $_POST['products'] : die();

$stmt = $entity->create($user_id, $status, $adress, $products);

if ($stmt == true) {
    echo '{';
    echo '"message": "Command was created."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to create Command."';
    echo '}';
}