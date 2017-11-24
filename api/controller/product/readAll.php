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

$stmt = $entity->readAll();
$num  = $stmt->rowCount();


if ($num > 0) {
    $response            = [];
    $response['results'] = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $uniqueResponse = [
            'id'    => $id,
            'name'  => $name,
            'price' => $price,
            'image' => $image,
        ];

        array_push($response['results'], $uniqueResponse);
    }

    echo json_encode($response);
} else {
    echo json_encode(['message' => 'Aucun utilisateur trouvé']);
}