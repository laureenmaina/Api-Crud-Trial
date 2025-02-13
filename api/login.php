<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "connection.php";

$username = $_GET['username'] ?? null;
$password = $_GET['password'] ?? null;

if (!$username || !$password) {
    echo json_encode(["error" => "Missing username or password"]);
    exit();
}

// echo $username. ' '. $password;

$sql = "SELECT * FROM data_table WHERE username = '".$username."' and password = '".$password."'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// print_r($user) ;

//echo count($user).'<br/>';

$stmt->close();
$conn->close();

if(!empty($user)){
    echo json_encode($user);  // Return user data if password matches
} else {
    echo json_encode(["error" => "Invalid password"]);
}

?>
