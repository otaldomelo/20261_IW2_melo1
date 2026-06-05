<?php

function consulta (){
include "conecta.php";
$stmt = $conn->query("SELECT * FROM tb_camiseta");
while ($row = $stmt->fetch()) {

?>

<div class="card" style="width: 18rem;" data-id="<?php echo $row['codigo']; ?>">
  <div class="card-body">
<?php

echo "
<span class='id'>" . $row['codigo'] . "</span> <br />
<span class='cor'>" . $row['cor'] . "</span> <br />
<span class='tamanho'>" . $row['tamanho'] . "</span> <br /><br />
";

echo '
<button class="delete-button btn botao-registro"
data-id="'.$row['codigo'].'">
Apagar
</button>
<button class="edit-button btn botao-registro">
Editar
</button>
';

?>

    </div>
</div>
<?php
}
}
?>