<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Camisetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>

    $(document).ready(function () {

        excluir();

        $("#pedidoForm").on('submit', function (e) {

            e.preventDefault();

            $.ajax({

                url: "insere.php",
                type: "POST",
                data: {
                    tamanho: $('#tamanho').val(),
                    cor: $('#cor').val()
                },

                success: function (data) {
                    $('#resultado').html(data);
                    excluir();
                },

                error: function () {
                    $('#resultado').html("Erro no pedido.");

                }
            });
        });
    });

    function excluir(){
        $('.excluir').click(function(){
            var id = $(this).attr('id');
            var $botao = $(this);

            $.ajax({

                url: "apaga.php",
                type: "POST",
                data: "id=" + id,
                dataType: "html"

            }).done(function(resposta){
                console.log(resposta);
                $botao.closest('tr').fadeOut(300, function() {
                    $(this).remove();
                });

            }).fail(function(jqXHR, textStatus){
                console.log("Request failed: " + textStatus);
                alert("Erro ao excluir o pedido!");

            }).always(function(){
                console.log("completou");
            });
        });
    }

</script>

</head>

<body>

    <div class="container form">
        <h1>PEDIDO DE CAMISETAS</h1>
        <p>Preencha o formulário abaixo para efetuar seu pedido!</p>
    </div>

    <form id="pedidoForm" action="insere.php" method="post">
        <div class="form-control">
            <label for="cor">Cor da Camiseta</label>
            <input type="text"
                class="form-control"
                name="cor"
                id="cor"
                placeholder="ex: Preto, Vermelho, Branco..."
                required>
        </div>

        <br>

        <div class="form-control">
            <label for="tamanho">Tamanho da camiseta:</label>
            <select class="form-select"
                name="tamanho"
                id="tamanho"
                required>
                <option value="" disabled selected hidden>
                    Selecione um tamanho
                </option>
                <option value="PP">PP - Extra Pequeno</option>
                <option value="P">P - Pequeno</option>
                <option value="M">M - Médio</option>
                <option value="G">G - Grande</option>
                <option value="GG">GG - Extra Grande</option>
            </select>
        </div>

        <br>

        <button type="submit" class="btn-submit">
            <span class="spinner-border spinner-border-sm me-2 d-none"
                id="spinner"
                role="status"
                aria-hidden="true"></span>
            Enviar Pedido
        </button>

        <br><br>

    </form>

    <div id="resultado"></div>

    <!-- css novo(tenho ansiedade)-->

    
<!--
       <div id="registro">
        <button type="button"
            id="bregistro"
            class="btn botao-registro"
            data-bs-toggle="modal"
            data-bs-target="#modalCadastro">

            Adicionar Pedido
        </button>
    </div>

-->

    <!-- coisinho do Cadastro -->
<!--
    <div class="modal" id="modalCadastro">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-superior">
                    <h4 class="modal-title">
                        Cadastro de Camiseta
                    </h4>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>

                </div>
                <div class="modal-body modal-interior">

  
                        <h2>Cor:</h2>

                        <input type="text"
                            class="cor entrada-texto"
                            placeholder="Ex: Preto, Branco...">

                        <br><br>

                        <h2>Tamanho:</h2>

                        <select class="tamanho entrada-texto">
                            <option value="PP">PP</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="GG">GG</option>
                        </select>
                </div>
                <div class="modal-footer modal-inferior">
                    <button class="botao-registro"
                        id="confirma">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </div>

-->

 <!--coisinho de editar-->

 <!--
    <div class="modal" id="modalEdita">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-superior">
                    <h4 class="modal-title">
                        Editar Pedido
                    </h4>
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body modal-interior">
                        <h2>Cor:</h2>

                        <input type="text"
                            class="editaCor entrada-texto">

                        <br><br>

                        <h2>Tamanho:</h2>
                        <select class="editaTamanho entrada-texto">
                            <option value="PP">PP</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="GG">GG</option>
                        </select>
                </div>

                <div class="modal-footer modal-inferior">
                    <button type="button"
                        class="btn save-button"
                        data-bs-dismiss="modal">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="lista-cards" class="d-flex flex-wrap gap-3">

-->

<!--a função não tá funcionando, resolve depois-->
        <?php

        include "consulta2.php";

        ?>

</body>

</html>
