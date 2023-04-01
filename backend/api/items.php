<?php

require_once "../_common/connection.php";

$query = "SELECT * FROM Produit";
$stmt = $db->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($data);