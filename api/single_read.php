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
$item->userId = isset($_GET['userId']) ? $_GET['userId'] : die();
$item->getSingleData();
if($item->userId != null){

// create array
$data_arr = array(
"userId" => $item->userId,
"id" => $item->id,
"title" => $item->title,
"body" => $item->body,
"images" => $item->images,
"active" => $item->active,
"dated" => $item->dated,
"username" => $item-> username,
"password" => $item -> password,

);

http_response_code(200);
echo json_encode($data_arr);
}
else{
http_response_code(404);
echo json_encode("Data not found.");
}
?>