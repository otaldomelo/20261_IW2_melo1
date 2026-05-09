<?php

include "conecta.php";

include "consulta2.php";

$tamanho = $_POST['tamanho'];
$cor = $_POST['cor'];

inserir($conn, $tamanho, $cor);

?>