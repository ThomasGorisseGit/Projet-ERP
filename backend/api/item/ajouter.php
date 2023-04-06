<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../../_common/connection.php");
// TODO INSERER UN STOCK
if(isset($_POST["nom"]))
{
    $nom = trim(htmlspecialchars($_POST["nom"]));
    $prix = trim(htmlspecialchars($_POST["prix"]));
    $desc = trim(htmlspecialchars($_POST["description"]));
    $q="INSERT INTO Produit(nom,prix,description) VALUES (?,?,?) ";
    $stmt =$db->prepare($q);
    $stmt->execute(array(
        $nom,
        $prix,
        $desc
    ));
    

    $id = getProductID($db,$nom,$prix);


    $q= "INSERT INTO Stock(idProduit,quantite) VALUES (?,?) ";

    $stmt = $db->prepare($q);
    $stmt->execute(array(
        $id,
        $_POST["quantite"]
    ));

    header("Content-Type: application/json");
    $tab = [
        "state"=>true
    ];
    echo json_encode($tab);
}
else{
    $tab = [
        "state"=>false
    ];
    echo json_encode($tab);
}


function getProductID($db,string $nom,float $prix) : int
{
    $q="SELECT idProduit FROM Produit WHERE nom = ? AND prix = ? ";
    $stmt = $db->prepare($q);
    $stmt->execute(array($nom,$prix));
    return $stmt->fetch()["idProduit"];
}