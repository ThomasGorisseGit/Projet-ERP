<?php

require_once("../../_common/connection.php");

$q = "SELECT * FROM Panier WHERE enCours = false";
$stmt = $db->prepare($q);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*
    Object = {
        "idPanier"=1,
        "idClient"=NULL,
        "montant"=120,
        "idPanierProduit"=[
            {
                "nom"=truc,
                "quantite"=3,
                "prix"=1
            },
            {

            }
        ]
    }
*/
$all = [];
foreach($data as $row)
{
    $q="SELECT * FROM PanierProduit INNER JOIN Produit ON Produit.idProduit = PanierProduit.idProduit WHERE PanierProduit.idPanier = ?";
    $stmt = $db->prepare($q);
    $stmt->execute(array($row["idPanier"]));
    $content = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $list = [];
    foreach($content as $product)
    {
        $one = array(
            "nom"=>$product["nom"],
            "prix"=>$product["prix"],
            "quantite"=>$product["quantite"]
        );
        array_push($list,$one);
    }

    $test = array(
        "idPanier"=>$row["idPanier"],
        "idClient"=>$row["idClient"],
        "montant"=>$row["montant"],
        "listeProduits"=>$list
    );
    array_push($all,$test);
}

header('Content-Type: application/json');
print_r( json_encode($all));

