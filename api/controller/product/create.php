<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/configdb.php';
include_once '../../objects/product.php';

$database = new Database();
$db       = $database->getConnection();

$entity = new Product($db);

// Test before Front-end
//$name  = 'Carte de visite crée';
//$price = 10.00;
//$image = 'https://cdn.mycreativeshop.com/images/templates/11085/five-star-luxury-hotels-flyer-template-thumb1.jpg';

$name     = isset($_POST['name']) ? $_POST['name'] : die();
$price     = isset($_POST['price']) ? $_POST['price'] : die();
$image     = isset($_POST['image']) ? $_POST['image'] : die();

$stmt = $entity->create($name, $price, $image);

if ($stmt == true) {
    echo '{';
    echo '"message": "Product was created."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to create Product."';
    echo '}';
}