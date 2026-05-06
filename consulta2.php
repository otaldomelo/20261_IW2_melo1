<?php

include "conecta.php";

function inserir($conn, $tamanho, $cor){
    $resultado = "";

    if ($conn->query("INSERT INTO tb_camiseta VALUES (NULL, '".$tamanho."', '".$cor."')")){
        echo "registro efetuado com sucesso <br>"; 

        $stmt = $conn->query("SELECT tamanho, cor FROM tb_camiseta"); 
        while ($row = $stmt->fetchObject()) {
            $resultado .= "$row->tamanho - $row->cor <br>";
        }

        echo $resultado;

    } else {
        echo "registro não efetuado";
    }
}

$tamanho = "M";
$cor = "vermelho";

inserir($conn, $tamanho, $cor);

?>