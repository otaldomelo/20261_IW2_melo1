<?php

$stmt = $conn->query("SELECT tamanho, cor FROM tb_camiseta");
while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Tamanho: " . $resultado['tamanho'] . " - Cor: " . $resultado['cor'] . "<br>";

}

?>