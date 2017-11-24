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

$stmt = $entity->readAll();
$num  = $stmt->rowCount();


if ($num > 0) {
    $response           = [];
    $response['results'] = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $uniqueResponse = [
            'id'       => $id,
            'mail'     => $mail,
            'is_admin' => $is_admin
        ];

        array_push($response['results'], $uniqueResponse);
    }

    echo json_encode($response);
} else {
    echo json_encode(['message' => 'No Users found']);
}