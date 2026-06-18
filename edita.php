<?php

include "conecta.php";

$id = $_POST['id'];
$id_cor = $_POST['id_cor'];
$id_tamanho = $_POST['id_tamanho'];

$sql = "UPDATE tb_camiseta
        SET id_cor=:id_cor, id_tamanho=:id_tamanho
        WHERE codigo= :id";

$stmt = $conn->prepare($sql);

$ok = $stmt->execute([
    'id_cor' => $id_cor,
    'id_tamanho' => $id_tamanho,
    'id' => $id
]);

if($ok){

    echo json_encode([

        'message' => 'Registro atualizado com sucesso.',
        'id' => $id,
        'id_cor' => $id_cor,
        'id_tamanho' => $id_tamanho
    ]);

    exit; } else {
    echo json_encode([

        'message' => "Erro ao atualizar o registro."
    ]); 
}

?>