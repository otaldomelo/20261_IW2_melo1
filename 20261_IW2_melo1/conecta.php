<?php

$host = 'localhost';
$db = 'db_camiseta';
$user = 'root';
$pass = 'usbw';
$port = '3307';

$dsn = "mysql:host=$host;dbname=$db;port=$port";
$conn = new PDO($dsn, $user, $pass);

?>