<?php

include "conecta.php";

$resultado = "";

$stmt = $conn->query("SELECT tamanho, cor FROM tb_camiseta");

while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo $resultado['tamanho'] . " - " . $resultado['cor'] . "<br>";

}

?>