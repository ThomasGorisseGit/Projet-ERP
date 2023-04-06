<?php

require_once "../_common/connection.php";

$q= "SELECT * FROM Produit INNER JOIN Stock ON Stock.idProduit = Produit.idProduit";
$stmt = $db->prepare($q);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($data);