<?php
  $username = 'root';
  $password = 'usbw';

try {
  $conn = new PDO('mysql:host=localhost;dbname=db_camiseta;port=3307', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


// string com comando mysql, armazena string em uma variavel, executa
?>