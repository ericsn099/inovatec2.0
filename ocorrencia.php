<?php
session_start() or die('A sessão não pode ser iniciada');
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
if ((!isset($_SESSION['login']))) {
    header('location:index.php');
    exit;
}

$logado = $_SESSION['login'];
include "conexao.php";

$sqlBairro = "SELECT * FROM bairro";
//$sqlRua = "SELECT * FROM rua ";
$sqlTipo = "SELECT * FROM situacao";

$dados = mysqli_query($conn, $sqlBairro);
//$dados2 = mysqli_query($conn, $sqlRua);
$dados3 = mysqli_query($conn, $sqlTipo);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/headerOcorrenciaCss.css" />
    <link rel="stylesheet" href="css/meuEstilo4.css" />
    <title>Ocorrência</title>
</head>

<body>
    <?php include('headerOcorrencia.php'); ?>

    <div class="ocorrencia">
        <div class="ocorrencia-area">
            <div class="ocorrencia-img">

            </div>
        </div>
        <div class="ocorrencia-form">
            <form action="cadastro_ocorrencia.php" method="POST">
                <div class="form-img">
                    <h2>Ocorrência</h2>
                </div>
                <div class="form-item">
                    <label>Bairros</label>
                    <select id="sl_bairros" name='cmbairros'>
                        <option>Selecione...</option>
                        <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $idBairro = $linha['id'];
                            $nome = $linha['nomeBairro'];
                            echo "<option value='$idBairro'> $nome </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-item">
                    <label>Ruas</label>
                    <select class="custom-select form-select" id="sl_ruas" name='cmrua'>
                        <option>Selecione..</option>
                    </select>
                </div>
                <div class="form-item">
                    <label>Tipo de Ocorrência</label>
                    <select id="sl_ocorrencias" name='cmocorrencia'>
                        <option>Selecione..</option>
                        <?php
                        while ($linha = mysqli_fetch_assoc($dados3)) {
                            $nome = $linha['tipo'];
                            echo "<option  value='" . $linha['id'] . "'> $nome </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-item">
                    <div class="ball">
                        <div data-key="1" name="verde" class="item"></div>
                        <div data-key="2" name="amarelo" class="item"></div>
                        <div data-key="3" name="vermelho" class="item"></div>
                        <select name="nivel">
                            <option>N&iacute;vel de Ocorr&ecirc;ncia</option>
                            <option value="1">Verde (Seguro)</option>
                            <option value="2">Amarelo (Alerta)</option>
                            <option value="3">Vermelho (Perigo)</option>
                        </select>
                    </div>
                </div>
                <div class="form-item">
                    <label class="labeloc">Publica&ccedil;&atilde;o</label>
                    <textarea name="publicacao" require></textarea>
                </div>
                <div class="botoes">
                    <button type="submit">Salvar</button>
                    <a href="index.php" class="voltar">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sl_bairros").change(function() {
                var id_bairro = $(this).val();
                $("#sl_ruas option").remove();

                //$("#sl_ruas option[data-bairro='" + id_bairro + "']").show();

                $.ajax({
                    type: 'post',
                    url: 'ajax/getRuas.php',
                    data: {
                        "id_bairro": $("#sl_bairros").val(),
                        "ruas_option": "select"
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#sl_ruas").append(data.ruas);
                    }
                });
            })
        })
    </script>
</body>

</html>