<?php

include 'conecta.php';
$tamanho = "G";
$cor = "azul";


if ($conn->query("INSERT INTO tb_camiseta VALUES (NULL, '".$tamanho."', '".$cor."')")){
    echo "registro efetuado com sucesso";
}else{
    echo "registro não efetuado";
};

?>
