<?php
require_once "../_common/connection.php";

if(isset($_GET["idProduit"]))
{

    $query = "SELECT * FROM Produit WHERE idProduit = ?";
    $stmt = $db->prepare($query);
    $stmt->execute(
        array($_GET["idProduit"])
    );
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if($data==false)
    {
        $data = array(
            "Error"=>"No Content"
        );
    }
    header('Content-Type: application/json');
}else{
    $data = array(
        'Error'=>"Bad Request"
    );

    header('Content-Type: application/json');
}
echo json_encode($data);
