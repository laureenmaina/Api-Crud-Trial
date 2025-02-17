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

$query = "SELECT county_id, name FROM counties";
$result = $conn->query($query);

$counties = [];
while ($row = $result->fetch_assoc()) {
    $counties[] = $row;
}

echo json_encode(["counties" => $counties]);
$conn->close();
?>
