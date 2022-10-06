<?php
require_once ("./db.php");

$query = $_POST['data'];
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$sql = "SELECT * 
FROM barang as b
INNER JOIN asal AS a
ON b.asal = a.asal_id
INNER JOIN kondisi AS k
ON b.kondisi = k.id_kondisi 
WHERE b.nama_barang LIKE '%{$query}%'";
$result = $db->query($sql);
$response = [];
while ($row = $result->fetch_assoc()) {
  $row['formatRupiah'] = number_format($row['harga_barang'], 2, ",", ".");
  array_push($response, $row);
}
header("Content-Type: application/json");
echo json_encode($response);
?>