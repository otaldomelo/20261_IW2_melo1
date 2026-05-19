<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Loja de Camisetas</title>
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

            $.ajax({

                url: "apaga.php",
                type: "POST",
                data: "id=" + id,
                dataType: "html"

            }).done(function(resposta){
                console.log(resposta);
                location.reload();

            }).fail(function(jqXHR, textStatus){
                console.log("Request failed: " + textStatus);

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

</body>

</html>