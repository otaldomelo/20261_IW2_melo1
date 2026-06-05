<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conecta.php';
include 'consulta.php';

$id_cor = $_POST['id_cor'];
$id_tamanho = $_POST['id_tamanho'];

$sql = "
INSERT INTO tb_camiseta
(id_tamanho, id_cor)
VALUES
(
'$id_tamanho',
'$id_cor'
)";

if($conn->query($sql)){
    consulta();
} else {
    echo "não inseriu";
}

?>