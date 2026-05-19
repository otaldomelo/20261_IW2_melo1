<?php

include 'conecta.php';
include 'consulta2.php';

$id = $_POST['id'];
$sql = "DELETE FROM tb_camiseta WHERE codigo = '".$id."'";
if($pdo->query(sql)){
    consultar();
} else {
    echo "erro";
}

php>