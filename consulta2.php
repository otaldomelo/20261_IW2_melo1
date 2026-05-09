<?php

include "conecta.php";

function inserir($conn, $tamanho, $cor){

    if ($conn->query("INSERT INTO tb_camiseta VALUES (NULL, '".$tamanho."', '".$cor."')")){

        echo "
            <div class='alert alert-success mt-3'>
                Registro efetuado com sucesso!
            </div>
        ";

    } else {

        echo "
            <div class='alert alert-danger mt-3'>
                Registro não efetuado.
            </div>
        ";

    }

}

?>