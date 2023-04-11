<?php
header('Content-Type: application/json');

require_once("../../_common/connection.php");
if(isset($_GET["idProduit"]))
{
    $q="SELECT * FROM FournisseurProduit INNER JOIN Fournisseur ON Fournisseur.idFournisseur = FournisseurProduit.idFournisseur WHERE FournisseurProduit.idProduit = ?";
    $stmt = $db->prepare($q);
    $stmt->execute(array(
        $_GET["idProduit"]
    ));
    
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($data,JSON_PRETTY_PRINT);
}
else if(isset($_GET["idFournisseur"]))
{
    $q="SELECT * FROM FournisseurProduit INNER JOIN Fournisseur ON Fournisseur.idFournisseur = FournisseurProduit.idFournisseur WHERE Fournisseur.idFournisseur = ?";
    $stmt = $db->prepare($q);
    $stmt->execute(array(
        $_GET["idFournisseur"]
    ));
    
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($data,JSON_PRETTY_PRINT);
}
else{
    $tab = [
        "status"=>false,
        "message"=>"veuillez fournir un ID Produit ou un ID Fournisseur"
    ];
    echo json_encode($tab,JSON_PRETTY_PRINT);

}