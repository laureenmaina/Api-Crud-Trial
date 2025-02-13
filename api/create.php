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

// Read the raw POST data
$data = json_decode(file_get_contents("php://input"), true);
// print_r($data);

echo $data['userId'];
echo $data['id'];
echo $data['title'];
echo $data['body'];
echo $data['images'];
echo $data['active'];
echo $data['dated'];
echo $data['username'];
echo $data['password'];
// echo $data['county'];
// echo $data['cities'];


// Check if decoding was successful
if (isset($data['userId'],$data['id'], $data['title'],
 $data['body'],$data['images'],$data['active'],$data['dated'],$data['username'],$data['password'])) {
    // Access the JSON data
    $item->userId = $data['userId'];
    $item->id = $data['id'];
    $item->title = $data['title'];
    $item->body = $data['body'];
    $item->images = $data['images'];
    $item->active = $data['active'];
    $item->dated = $data['dated'];
    $item->username = $data['username'];
    $item->password = $data['password'];

    if ($item->createData()) {
        echo json_encode(["message" => "Post created successfully."]);
    } else {
        echo json_encode(["message" => "Post could not be created."]);
    }
} else {
    echo json_encode(["message" => "Invalid data."]);
}
?>










































