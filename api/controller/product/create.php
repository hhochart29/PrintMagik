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

$data = json_decode(file_get_contents("php://input"));

$name    = $data->name;
$content = $data->content;
$price   = $data->price;
$image   = $data->image;

$stmt = $entity->create($name, $content, $price, $image);

if ($stmt == true) {
    echo '{';
    echo '"message": "Product was created."';
    echo ',';
    echo '"created": true';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to create Product."';
    echo '}';
}