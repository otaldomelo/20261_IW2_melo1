<?php

include 'conecta.php';
$tamanho = $_POST['tamanho'];
$cor = $_POST['cor'];

if ($conn->query("INSERT INTO tb_camiseta VALUES (NULL, '".$tamanho."', '".$cor."')")){
    echo "registro efetuado com sucesso";
}else{
    echo "registro não efetuado";
};

?>
