<?php

require_once("../_common/connection.php");
$pass = password_hash("password",PASSWORD_DEFAULT);
$q="
INSERT INTO Employe (identifiant, motDePasse, nom, prenom, email, adresse, salaire)
VALUES 
('john.smith', '$pass', 'Smith', 'John', 'john.smith@example.com', '123 Main St, Anytown USA', 50000),
('jane.doe', '$pass', 'Doe', 'Jane', 'jane.doe@example.com', '456 Oak Ave, Anytown USA', 60000),
('michael.jones', '$pass', 'Jones', 'Michael', 'michael.jones@example.com', '789 Pine St, Anytown USA', 55000),
('sara.smith', '$pass', 'Smith', 'Sara', 'sara.smith@example.com', '321 Maple Dr, Anytown USA', 65000),
('bob.johnson', '$pass', 'Johnson', 'Bob', 'bob.johnson@example.com', '654 Elm St, Anytown USA', 55000);
";
$stmt = $db->prepare($q);
$stmt->execute();