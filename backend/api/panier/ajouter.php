<?php

use function PHPSTORM_META\type;

require_once "../../_common/connection.php";





    

if(isset($_POST["list"]))
{
    $var = explode(",",$_POST["list"]);

    $montant = 0 ;
    $q = "SELECT * FROM Panier WHERE enCours=true";
    $stmt = $db->prepare($q);
    $stmt->execute();
    $idPanier = $stmt->fetch(PDO::FETCH_ASSOC)["idPanier"];
    for($i=0;$i<count($var)-1;$i++)
    {
        $idArticle = $var[$i];
        $quantite = $var[$i+1];


        $montant += getPrice($db,$idArticle,$quantite);

        $q ="INSERT INTO PanierProduit(idPanier, idProduit, quantite) VALUES(?,?,?)";
        $stmt = $db->prepare($q);
        $stmt->execute(array(
            $idPanier,$idArticle,$quantite
        ));
    }

    updatePrice($db,$montant);
    createNewPanier($db);
    $tab = [
        "state"=>true
    ];
    echo json_encode($tab);


}
  



function getPrice($db,$idArticle,$quantite) :float
{
    $query = "SELECT * FROM Produit WHERE idProduit = ?";
    $stmt = $db->prepare($query);
    $stmt->execute(
        array(
            $idArticle
        )
    );
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data["prix"] * $quantite;
}

function updatePrice($db,$montant) :void
{
    $q = "UPDATE Panier SET montant =? WHERE enCours = true ";
    $stmt = $db->prepare($q);
    $stmt->execute(array(
        $montant
    ));
}


function createNewPanier($db) :void 
{
    $q="UPDATE Panier SET enCours = false  WHERE enCours = true ";
    $stmt = $db->prepare($q);
    $stmt->execute();



    $q="INSERT INTO Panier(idClient, montant, enCours) VALUES(null,0,true)";
    $stmt = $db->prepare($q);
    $stmt->execute();
}
