<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../data.php';
$database = new Database();

$db = $database->getConnection();
$items = new Data1($db);
$records = $items->getData();
$itemCount = $records->num_rows;
//echo json_encode($itemCount);
if($itemCount > 0){
//$dataArr = array();
$dataArr = array();
//$dataArr["body"] = array();
//$dataArr["itemCount"] = $itemCount;
while ($row = $records->fetch_assoc())
{
    //array_push($dataArr["body"], $row);
    array_push($dataArr, $row);
}
echo json_encode($dataArr, JSON_PRETTY_PRINT);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>