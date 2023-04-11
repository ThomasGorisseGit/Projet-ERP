<?php
require_once("../../_common/connection.php");
header("Content-Type: application/json");
if(isset($_POST["nomFournisseur"] ,$_POST["nomProduit"]))
{
    $q="SELECT * FROM Fournisseur WHERE nom = ?";
    $stmt = $db->prepare($q);
    $stmt->execute(array(
        $_POST["nomFournisseur"]
    ));
    $idFournisseur = $stmt->fetch(PDO::FETCH_ASSOC)["idFournisseur"];


    $q="SELECT * FROM Produit WHERE nom = ?";
    $stmt = $db->prepare($q);
    $stmt->execute(array(
        $_POST["nomProduit"]
    ));
    $idProduit = $stmt->fetch(PDO::FETCH_ASSOC)["idProduit"];

    
    $q="DELETE FROM Reapprovisionnement WHERE idFournisseur = ? AND idProduit = ?";
    $stmt= $db->prepare($q);
    $stmt->execute(array(
        $idFournisseur,
        $idProduit
    
    ));
    $tab = [
        "status"=>true
    ];
    echo json_encode($tab);
}else{
    $tab = [
        "status"=>false,
        "message"=>"data pas renseignée"
    ];
    echo json_encode($tab);
}