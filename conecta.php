<?php


$host = 'localhost';
$db = 'db_camiseta';
$user = 'root';
$pass = 'usbw';
$port = '3307';

try {

    $dsn = "mysql:host=$host;dbname=$db;port=$port";

    $conn = new PDO($dsn, $user, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $erro){

    echo "Erro na conexão: " . $erro->getMessage();

}

?>