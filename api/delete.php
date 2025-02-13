<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../data.php';

$database = new Database();
$db = $database->getConnection();
$item = new Data1($db);

// Ensure the request method is DELETE
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["message" => "Only DELETE method is allowed."]);
    exit;
}

$jsonInput = file_get_contents("php://input");
error_log("Raw input received: " . $jsonInput); // Log input for debugging

if (!$jsonInput) {
    http_response_code(400);
    echo json_encode(["message" => "No data received."]);
    exit;
}

$data = json_decode($jsonInput);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(["message" => "Invalid JSON format.", "error" => json_last_error_msg()]);
    exit;
}

if (!isset($data->id) || empty($data->id)) {
    http_response_code(400);
    echo json_encode(["message" => "Post ID is required."]);
    exit;
}
