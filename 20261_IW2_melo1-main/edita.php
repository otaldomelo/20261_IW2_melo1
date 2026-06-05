<?php

include "conecta.php";

$id = $_POST['id'];
$id_cor = $_POST['id_cor'];
$id_tamanho = $_POST['id_tamanho'];

$sql = "UPDATE tb_camiseta
        SET id_cor=?, id_tamanho=?
        WHERE codigo=?";

$stmt = $conn->prepare($sql);

$ok = $stmt->execute([
    $id_cor,
    $id_tamanho,
    $id
]);

if($ok){
    echo "Registro atualizado com sucesso";
} else {
    echo "Erro ao atualizar o registro";
}

?>