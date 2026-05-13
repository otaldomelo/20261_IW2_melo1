<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "conecta.php";
include "consulta2.php";

$tamanho = $_POST['tamanho'];
$cor = $_POST['cor'];

inserir($conn, $tamanho, $cor);

?>