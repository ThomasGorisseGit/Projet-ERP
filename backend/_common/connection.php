<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "local.php";
$db = new PDO
("mysql:host=localhost;dbname=ERP", 
$_ENV["NAME"],
$_ENV["PASSWORD"]);