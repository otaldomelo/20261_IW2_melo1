<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conecta.php';
include 'consulta.php';

$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];
$sql = ("INSERT INTO tb_camiseta
VALUES (
null,
'".$tamanho."',
'".$cor."'
)");

if($conn->query($sql)){
    consulta();
} else {
    echo "não inseriu";
}

?>