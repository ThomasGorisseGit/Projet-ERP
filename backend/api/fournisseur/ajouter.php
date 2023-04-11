<?php

require_once("../../_common/connection.php");

if(isset($_POST["nom"])&& alreadyExistst($db,$_POST["numeroSiret"],$_POST["nom"]))
{
  

    $list = explode(",",$_POST["products"]);

    $q="INSERT INTO Fournisseur(nom,numeroSiret) VALUES (?,?)";
    $stmt =$db->prepare($q);
    $stmt->execute(array(
        $_POST["nom"],
        $_POST["numeroSiret"]
    ));
    $fournisseurID = getFournisseurID($db,$_POST["numeroSiret"],$_POST["nom"]);
    foreach($list as $item)
    {
        $q = "INSERT INTO FournisseurProduit(idProduit,idFournisseur,referenceProduitFournisseur) VALUES (?,?,?)";
        $stmt = $db->prepare($q);
        $stmt->execute(array(
            $item,
            $fournisseurID,
            $item*55
        ));
    }

    $tab = [
        "status" => true
    ];
    header("Content-Type: application/json");
    echo json_encode($tab);
}

function getFournisseurID($db, $siret, $nom)
{
    $q="SELECT * FROM Fournisseur WHERE numeroSiret = ? AND nom = ?";
    $stmt = $db->prepare($q);
    $stmt->execute(array($siret,$nom));
    return $stmt->fetch(PDO::FETCH_ASSOC)["idFournisseur"];
    
}

function alreadyExistst($db, $siret, $nom)
{
    $q="SELECT * FROM Fournisseur WHERE numeroSiret = ? AND nom = ?";
    $stmt = $db->prepare($q);
    $stmt->execute(array($siret,$nom));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if($data==false) return true;
    else echo json_encode(["status" => false,"error"=>"AlreadyExists"]);
}