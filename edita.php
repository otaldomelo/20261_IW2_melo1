<?php

include "conecta.php";

$id = $_POST['id'];
$cor = $_POST['cor'];
$tamanho = $_POST['tamanho'];

$sql = "UPDATE tb_camiseta
        SET cor=?, tamanho=?
        WHERE codigo=?";

$stmt = $conn->prepare($sql);
$ok = $stmt->execute([
    $cor,
    $tamanho,
    $id
]);

if($ok){
    echo "Registro atualizado com sucesso";
} else {
    echo "Erro ao atualizar o registro";
}

?>