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
//$user_id = '1';

$mail = isset($_POST['user_id']) ? $_POST['user_id'] : die();

$stmt = $entity->readAllByUser($user_id);

$num = $stmt->rowCount();


if ($num > 0) {
    $response            = [];
    $response['results'] = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $uniqueResponse = [
            'id'      => $id,
            'user_id' => $user_id,
            'price'   => $price,
            'date'    => $date,
        ];

        array_push($response['results'], $uniqueResponse);
    }

    echo json_encode($response);
} else {
    echo json_encode(['message' => 'No Command found']);
}