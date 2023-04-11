<?php


require_once "../../_common/connection.php";





    

if(isset($_POST["list"]))
{
    $var = explode(",",$_POST["list"]);
    $montant = 0 ;
    $q = "SELECT * FROM Panier WHERE enCours=true";
    $stmt = $db->prepare($q);
    $stmt->execute();
    $idPanier = $stmt->fetch(PDO::FETCH_ASSOC)["idPanier"];
    for($i=0;$i<count($var)-1;$i+=2)
    {
        $idArticle = $var[$i];
        $quantite = $var[$i+1];
        $montant += getPrice($db,$idArticle,$quantite);

        $q="SELECT * FROM Stock WHERE idProduit = ?";
        $stmt = $db->prepare($q);
        $stmt->execute(array($idArticle));
        $qte = $stmt->fetch(PDO::FETCH_ASSOC)["quantite"];
        if($qte<$quantite)
        {
            $tab = [
                "status"=>false,
                "message"=>"Le produit ".getName($db,$idArticle) . " n'est plus disponible",
                "item"=>getName($db,$idArticle)
            ];
            header("Content-Type: application/json");
            echo json_encode($tab);
            die();
        }

        $q="UPDATE Stock SET quantite =? WHERE idProduit = ?";
        $stmt=$db->prepare($q);
        $stmt->execute(array(
            $qte-$quantite,
            $idArticle
        ));


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
    $data=getProduct($db,$idArticle);
    return $data["prix"] * $quantite;
}
function getName($db,$idArticle)
{
    $data=getProduct($db,$idArticle);
    return $data["nom"];
}
function getProduct($db,$idArticle)
{
    $query = "SELECT * FROM Produit WHERE idProduit = ?";
    $stmt = $db->prepare($query);
    $stmt->execute(
        array(
            $idArticle
        )
    );
    return $stmt->fetch(PDO::FETCH_ASSOC);
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
