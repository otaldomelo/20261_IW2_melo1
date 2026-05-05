<?php
while ($resultado = $stmt->fetchObject()) {
    echo  $resultado->tamanho . " - " . $resultado->cor . "<br>";
}
?>