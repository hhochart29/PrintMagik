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

$data = json_decode(file_get_contents("php://input"));

$email    = $data->email;
$password = $data->password;

$stmt = $entity->read($email, $password);
$num  = $stmt->rowCount();

if ($num > 0) {
    $response            = [];
    $response['results'] = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $uniqueResponse = [
            'email'   => $email,
            'isAdmin' => $is_admin,
        ];

        array_push($response['results'], $uniqueResponse);
    }
    echo json_encode($response);
} else {
    echo json_encode(['message' => 'User not found']);
}