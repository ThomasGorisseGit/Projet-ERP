<?php
require_once("../../_common/connection.php");
if(isset($_GET["nom"]))
{
    $q="SELECT * FROM Employe WHERE nom = ? OR prenom = ?";
    $stmt = $db->prepare($q);
    $stmt->execute(array(
        $_GET["nom"],
        $_GET["nom"]
    ));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    header("Content-Type: application/json");
    echo json_encode($data);
}else{
    $tab = array(
        "status"=>false
    );
    echo json_encode($tab);
}