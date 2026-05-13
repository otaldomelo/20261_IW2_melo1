<?php

include "conecta.php";

function inserir($conn, $tamanho, $cor){

    $resultado = "";

    try {
        // Usando prepared statement para evitar SQL injection
        $stmt = $conn->prepare("INSERT INTO tb_camiseta VALUES (NULL, :tamanho, :cor)");
        
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':cor', $cor);
        
        if ($stmt->execute()) {

            $resultado .= "
                <div class='alert alert-success'>
                    Pedido realizado com sucesso!
                </div>
            ";

            $stmt = $conn->query("SELECT tamanho, cor FROM tb_camiseta");

            $resultado .= "

                <table class='table table-striped table-bordered mt-3'>

                    <thead class='table-dark'>

                        <tr>
                            <th>Tamanho</th>
                            <th>Cor</th>
                        </tr>

                    </thead>

                    <tbody>
            ";

            while ($row = $stmt->fetchObject()) {

                $resultado .= "
                    <tr>
                        <td>" . htmlspecialchars($row->tamanho) . "</td>
                        <td>" . htmlspecialchars($row->cor) . "</td>
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
    } catch(PDOException $erro) {
        echo "
            <div class='alert alert-danger'>
                Erro ao inserir: " . htmlspecialchars($erro->getMessage()) . "
            </div>
        ";
    }

}

?>
