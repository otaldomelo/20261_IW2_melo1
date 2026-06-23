<?php
header('Content-Type: application/json; charset=utf-8');

include "conecta.php";

if (!isset($_POST['id'])) {
    echo json_encode(['error' => 'Missing id']);
    exit;
}

$id = $_POST['id'];

$stmt = $conn->prepare("SELECT id_cor, id_tamanho FROM tb_camiseta WHERE codigo = :id");
$stmt->execute(['id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    echo json_encode([
        'id_cor' => $row['id_cor'],
        'id_tamanho' => $row['id_tamanho']
    ]);
} else {
    echo json_encode(['error' => 'Registro não encontrado']);
}
