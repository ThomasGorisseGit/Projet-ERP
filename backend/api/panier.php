<?php

require_once("../_common/connection.php");

$q = "SELECT * FROM Panier INNER JOIN PanierProduit ON Panier.idPanier=PanierProduit.idPanier WHERE Panier.enCours=true";
$stmt = $db->prepare($q);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($data);

