<?php
require_once ("./db.php");

$query = $_POST['data'];
// echo $query;
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
switch ($query) {
    case 'kondisi':
        $sql = "SELECT * 
        FROM barang as b
        INNER JOIN asal AS a
        ON b.asal = a.asal_id
        INNER JOIN kondisi AS k
        ON b.kondisi = k.id_kondisi
        ORDER BY b.`kondisi` ASC";
        break;
    case 'asal':
        $sql = "SELECT * 
        FROM barang as b
        INNER JOIN asal AS a
        ON b.asal = a.asal_id
        INNER JOIN kondisi AS k
        ON b.kondisi = k.id_kondisi
        ORDER BY b.`asal` ASC";
        break;
    case 'nama':
        $sql = "SELECT * 
        FROM barang as b
        INNER JOIN asal AS a
        ON b.asal = a.asal_id
        INNER JOIN kondisi AS k
        ON b.kondisi = k.id_kondisi
        ORDER BY b.`nama_barang` ASC";
        break;
}
$result = $db->query($sql);
$response = [];
while ($row = $result->fetch_assoc()) {
    $row['formatRupiah'] = number_format($row['harga_barang'], 2, ",", ".");
    array_push($response, $row);
}
header("Content-Type: application/json");
echo json_encode($response);
?>