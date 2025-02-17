<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = "localhost";
$user = "root";
$password = "";
$database = "trial_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$query = "SELECT city_id, city_name FROM cities";
$result = $conn->query($query);

$cities = [];
while ($row = $result->fetch_assoc()) {
    $cities[] = $row;
}

echo json_encode(["cities" => $cities]);
$conn->close();
?>
