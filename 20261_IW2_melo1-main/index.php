<!DOCTYPE html>
<html lang="pt-br">

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

            let cor, tamanho, id

            $("#confirma").click(function () {
                cor = $(".cor").val();
                tamanho = $(".tamanho").val();
                var formData = new FormData()
                formData.append("cor", cor)
                formData.append("tamanho", tamanho)

                $.ajax({

                    url: 'insere.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function (response) {
                        alert('Pedido cadastrado com sucesso!')
                        $("#lista-cards").html(response);
                        $("#modalCadastro").modal("hide");
                        $(".cor").val("")
                        $(".tamanho").val("PP")

                    },

                    error: function () {
                        alert('Erro ao cadastrar pedido.')
                    }
                });
            });

            $(document).on('click', '.delete-button', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: "apaga.php",
                    method: "POST",
                    data: { id: id },
                    dataType: "html",
                    success: function (response) {
                        if (response === 'success') {
                            alert('Registro apagado com êxito.');
                            $('[data-id="' + id + '"]').closest('.card').remove();
                        } else {
                            alert('Erro ao apagar o registro.')
                        }

                    },

                    error: function () {
                        alert('Erro na comunicação com o servidor')
                    }
                });
            });

            let editingCard = null

            $(document).on('click', '.edit-button', function () {

                editingCard = $(this).closest(".card")

                let id = editingCard.data("id")
                let cor = editingCard.find(".cor").text()
                let tamanho = editingCard.find(".tamanho").text()

                $(".editaCor").val(cor)
                $(".editaTamanho").val(tamanho)
                $("#modalEdita").data("id", id)
                $("#modalEdita").modal("show")
            });

            $(document).on('click', '.save-button', function () {
                id = $("#modalEdita").data("id")
                cor = $(".editaCor").val()
                tamanho = $(".editaTamanho").val()
                var formData = new FormData()
                formData.append("cor", cor)
                formData.append("tamanho", tamanho)
                formData.append("id", id)

                $.ajax({
                    url: 'edita.php',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (resposta) {

                        alert(resposta)
                        if (editingCard) {
                            editingCard.find(".cor").text(cor)
                            editingCard.find(".tamanho").text(tamanho)
                        }

                        document.activeElement.blur();
                        $("#modalEdita").modal("hide");

                        editingCard = null

                    },

                    error: function () {

                        alert("Erro ao atualizar pedido.")
                    }
                });
            })
        });

    </script>

</head>

<body>

<h1>PEDIDO DE CAMISETAS</h1>

    <div id="registro">
        <button type="button"
            id="bregistro"
            class="btn botao-registro"
            data-bs-toggle="modal"
            data-bs-target="#modalCadastro">

            Adicionar Pedido
        </button>
    </div>

    <!-- coisinho do Cadastro -->

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
                            placeholder="Ex: Preto, Branco..."
                            required>

                        <br><br>

                        <h2>Tamanho:</h2>

                        <select class="tamanho entrada-texto" required>
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

 <!--coisinho de editar-->

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
                        class="btn save-button">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="lista-cards" class="d-flex flex-wrap gap-3">

        <?php

        include "consulta.php";
        consulta();

        ?>
        
    </div>
</body>

</html>