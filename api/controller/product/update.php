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
//$id    = '1';
//$name  = 'Carte de visite updaté';
//$price = 5.00;
//$image = 'https://cdn.mycreativeshop.com/images/templates/11085/five-star-luxury-hotels-flyer-template-thumb1.jpg';

$id     = isset($_POST['id']) ? $_POST['id'] : die();
$name     = isset($_POST['name']) ? $_POST['name'] : die();
$name     = isset($_POST['content']) ? $_POST['content'] : die();
$price     = isset($_POST['price']) ? $_POST['price'] : die();
$image     = isset($_POST['image']) ? $_POST['image'] : die();

$stmt = $entity->update($id, $name, $content, $price, $image);

if ($stmt == true) {
    echo '{';
    echo '"message": "Product was updated."';
    echo '}';
} else {
    echo '{';
    echo '"message": "Unable to update Product."';
    echo '}';
}