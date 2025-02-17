<?php
class Data1{
    
// dbection
private $db;
// Table
private $db_table = "data_table";
// Columns
public $userId;
public $id;
public $title;
public $body;
public $images;
public $active;
public $dated;
public $username;
public $password;
public $counties;
public $cities;
public $result;



// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getData(){
$sqlQuery = "SELECT userId, id, title, body, images, active, dated, username, password, counties, cities FROM " . $this->db_table;
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createData(){
// sanitize
$this->userId=htmlspecialchars(strip_tags($this->userId));
$this->id=htmlspecialchars(strip_tags($this->id));
$this->title=htmlspecialchars(strip_tags($this->title));
$this->body=htmlspecialchars(strip_tags($this->body));
$this->images=htmlspecialchars(strip_tags($this->images));
$this->active=htmlspecialchars(strip_tags($this->active));
$this->dated=htmlspecialchars(strip_tags($this->dated));
$this->username=htmlspecialchars(strip_tags($this->username));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->counties=htmlspecialchars(strip_tags($this->counties));
$this->cities=htmlspecialchars(strip_tags($this->cities));

echo $this->userId;
echo $this->id;
echo $this->title;
echo $this->body;
echo $this->images;
echo $this->active;
echo $this->dated;
echo $this->username;
echo $this->password;
echo $this->counties;
echo $this->cities;

$sqlQuery = "INSERT INTO
". $this->db_table ." SET userId = '".$this->userId."',
id = '".$this->id."',
title = '".$this->title."',
body = '".$this->body."',
images = '".$this->images."',
active = '".$this->active."',
dated = '".$this->dated."',
username = '".$this->username."',
counties = '".$this->counties."',
cities = '".$this->cities."',
password = '".$this->password."'

";
echo $sqlQuery;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleData(){
$sqlQuery = "SELECT userId, id, title, body, images, active, dated, username, password, counties, cities  FROM " .
 $this->db_table . " WHERE userId = '" . $this->userId . "'";

// echo $sqlQuery;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->userId = $dataRow['userId'];
$this->id = $dataRow['id'];
$this->title = $dataRow['title'];
$this->body = $dataRow['body'];
$this->images = $dataRow['images'];
$this->active = $dataRow['active'];
$this->dated = $dataRow['dated'];
$this->username = $dataRow['username'];
$this->password = $dataRow['password'];
$this->counties = $dataRow['counties'];
$this->cities = $dataRow['cities'];
}

// UPDATE
public function updateData(){
$this->title=htmlspecialchars(strip_tags($this->title));
$this->body=htmlspecialchars(strip_tags($this->body));
$this->id=htmlspecialchars(strip_tags($this->id));
$this->userId=htmlspecialchars(strip_tags($this->userId));
$this->images=htmlspecialchars(strip_tags($this->images));
$this->active=htmlspecialchars(strip_tags($this->active));
$this->dated=htmlspecialchars(strip_tags($this->dated));
$this->username=htmlspecialchars(strip_tags($this->username));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->counties=htmlspecialchars(strip_tags($this->counties));
$this->cities=htmlspecialchars(strip_tags($this->cities));

$sqlQuery = "UPDATE ". $this->db_table .
"SET title = '".$this->title."',
id = '".$this->id."',
body = '".$this->body."',
images = '".$this->images."',
active = '".$this->active."',
dated = '".$this->dated."',
username = '".$this->username."',
password = '".$this->password."',
counties = '".$this->counties."',
cities = '".$this->cities."'
WHERE userId = '" . $this->userId . "'";


$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteData(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = '" . $this->id . "'";

echo $sqlQuery;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>