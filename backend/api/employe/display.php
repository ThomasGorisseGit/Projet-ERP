<?php
require_once("../../_common/connection.php");

$q="SELECT * FROM Employe";

$stmt = $db->prepare($q);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
header("Content-Type: application/json");
echo json_encode($data);
