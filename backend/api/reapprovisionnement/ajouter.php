<?php

require_once("../../_common/connection.php");
if(isset($_POST["idFournisseur"]))
{
    $stock = getStock($db,$_POST["idProduit"]);
    $today =date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
    $week  = date("Y-m-d",mktime(0, 0, 0, date("m")+rand(0,1)  , date("d")+rand(3,10), date("Y")));

   $q="INSERT INTO Reapprovisionnement(idFournisseur,idStock,idProduit,dateCommande,dateReception, quantite, montant) VALUES (?,?,?,?,?,?,?)";
   $stmt=$db->prepare($q);
   $stmt->execute(array(
        $_POST["idFournisseur"],
        $stock["idStock"],
        $_POST["idProduit"],
        $today,
        $week,
        $_POST["quantite"],
        $_POST["montant"]
   ));
   $tab = [
       "status"=>true
   ];
   header("Content-Type: appliation/json");
   echo json_encode($tab);

}else{
    $tab = [
        "status"=>false
    ];
    header("Content-Type: appliation/json");
    echo json_encode($tab);
}

function getStock($db,int $id)
{
    $q="SELECT * FROM Stock WHERE idProduit = ?";
    $stmt =$db->prepare($q);
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}