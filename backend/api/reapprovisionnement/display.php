<?php

require_once("../../_common/connection.php");

$q = "SELECT Produit.nom as nomProduit, Fournisseur.nom as nomFournisseur, Reapprovisionnement.idReapprovisionnement, Reapprovisionnement.montant, Reapprovisionnement.quantite, Reapprovisionnement.dateCommande, Reapprovisionnement.dateReception, Reapprovisionnement.etat FROM Reapprovisionnement INNER JOIN Fournisseur ON Fournisseur.idFournisseur = Reapprovisionnement.idFournisseur INNER JOIN Produit ON Produit.idProduit = Reapprovisionnement.idProduit";
$stmt = $db->prepare($q);
$stmt->execute();



$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


header("Content-Type: application/json");
echo json_encode($data);