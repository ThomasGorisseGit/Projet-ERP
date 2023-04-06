<?php

require_once("../../_common/connection.php");

if(isset($_POST["nom"]))
{
    $q="INSERT INTO Fournisseur(nom,numeroSiret) VALUES (?,?)";
    $stmt =$db->prepare($q);
    $stmt->execute(array(
        $_POST["numeroSiret"],
        $_POST["nom"]
    ));

    $tab = [
        "status" => true
    ];
    header("Content-Type: application/json");
    echo json_encode($tab);
}