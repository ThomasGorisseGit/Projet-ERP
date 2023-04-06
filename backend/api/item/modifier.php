<?php

require_once("../../_common/connection.php");

$tab = [
    "state"=>false
];
if(isset($_POST["idProduit"]) && !empty($_POST["idProduit"]))
{

    $q="UPDATE Produit SET ".$_POST["champ"]." = ? WHERE idProduit = ?;";
    $stmt = $db->prepare($q);
    $stmt->execute(array(
        $_POST["valeur"],
        $_POST["idProduit"]
    ));


    $tab = [
        "state"=>true
    ];


}

echo json_encode($tab);
