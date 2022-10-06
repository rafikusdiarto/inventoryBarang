<?php

require_once("db.php");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($db->connect_error){
    http_response_code(500);
    die("Connection failed: {$db->connect_error}");
}

$query = "SELECT * FROM kondisi";
$sql = $db->query($query);
$data = [];
while ($row = $sql->fetch_assoc()){
    array_push($data, $row);
}
$sql->close();
header("Content-Type: application/json");
echo json_encode($data);
?>