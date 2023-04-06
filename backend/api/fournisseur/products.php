<?php

require_once("../../_common/connection.php");

$q="SELECT * FROM FournisseurProduit INNER JOIN Fournisseur ON Fournisseur.idFournisseur = FournisseurProduit.idFournisseur";
$stmt = $db->prepare($q);
$stmt->execute();

$data = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($data);