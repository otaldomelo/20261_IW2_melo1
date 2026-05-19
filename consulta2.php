<?php

include "conecta.php";

function inserir($conn, $tamanho, $cor){

    $resultado = "";

    $sql = "INSERT INTO tb_camiseta (tamanho, cor)
            VALUES (:tamanho, :cor)";

    $stmtInsert = $conn->prepare($sql);

    if ($stmtInsert->execute([
        ':tamanho' => $tamanho,
        ':cor' => $cor
    ])){

        $resultado .= "
            <div class='alert alert-success'>
                Pedido realizado!
            </div>
        ";

        $stmt = $conn->query("SELECT codigo, tamanho, cor FROM tb_camiseta");

        $resultado .= "

            <table class='table table-striped table-bordered mt-3'>
                <thead class='table-dark'>
                    <tr>
                        <th>Código</th>
                        <th>Tamanho</th>
                        <th>Cor</th>
                    </tr>
                </thead>
                <tbody>
        ";

        while ($row = $stmt->fetchObject()) {

            $resultado .= "
                <tr>
                    <td>$row->codigo</td>
                    <td>$row->tamanho</td>
                    <td>$row->cor</td>
                    <td>
                        <button class='excluir' id='".$row->codigo."'>
                            Excluir
                        </button>
                    </td>
                </tr>
            ";

        }

        $resultado .= "
                </tbody>
            </table>
        ";

        echo $resultado;

    } else {

        echo "
            <div class='alert alert-danger'>
                Registro não efetuado.
            </div>
        ";

    }

}

?>