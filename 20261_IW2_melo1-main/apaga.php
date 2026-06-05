<?php

include 'conecta.php';

$id = $_POST['id'];

$sql = "DELETE FROM tb_camiseta
        WHERE codigo = '".$id."'";

if($conn->query($sql)){
    echo "success";
} else {
    echo "erro";
}

?>