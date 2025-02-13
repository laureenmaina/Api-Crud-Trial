<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../data.php';

$database = new Database();
$db = $database->getConnection();
$item = new Data1($db);

// Read raw JSON input
$data = json_decode(file_get_contents("php://input"));

// print_r($data);

echo $data->userId;
echo $data->id;
echo $data->title;
echo $data->body;
echo $data->images;
echo $data->active;
echo $data->dated;
echo $data->username;
echo $data->password;

if (!isset($data->userId) || !isset($data->id) || !isset($data->title) || !isset($data->body) || !isset($data->images) || !isset($data->active)|| !isset($data->dated)|| !isset($data->username) || !isset($data->password)) {
    echo json_encode(["message" => "Incomplete data."]);
    http_response_code(400);
    exit();
}

// Assign data to object
$item->userId = $data->userId;
$item->id = $data->id;
$item->title = $data->title;
$item->body = $data->body;
$item->images = $data->images;
$item->active = $data->active;
$item->dated = $data->dated;
$item->username = $data->username;
$item->password = $data->password;

// Debugging
error_log("Updating post: UserID={$item->userId}, ID={$item->id}, Title={$item->title}, Body={$item->body},images={$item->images},Active={$item->active},Dated={$item->dated},Username={$item->username},Password={$item->password}");

// Call the update method
if ($item->updateData()) {
    echo json_encode(["message" => "Data updated successfully."]);
    http_response_code(200);
} else {
    echo json_encode(["message" => "Data could not be updated."]);
    http_response_code(500);
}
?>













