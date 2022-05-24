<?php
// Inicia sessões
session_start() or die('A sessão não pode ser iniciada');
$msg = null;
if (isset($_POST['login'])) {
    // Conexão com o banco de dados	
    require "./conexao.php";

    // Recupera o login
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    

    $SQL = "SELECT id, login, senha FROM agente WHERE login = '" . $_POST["login"] . "' AND senha='" . $_POST["senha"] . "'";
    $result_id = mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
    $total = mysqli_num_rows($result_id);
    // Caso o usuário tenha digitado um login válido o número de linhas será 1..
    if ($total) {
        // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
        $dados = mysqli_fetch_array($result_id);

        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["id"] = $dados["id"];
        header("Location: ocorrencia.php");
        exit;
    }
    // Senha inválida
    else {
        $msg = "Acesso inválido! Favor verifique os dados informados.";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/meuStilo7.css" />
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="cont-texto">
                <h2 class="titulo">Sistema de Segurança comunitario</h2>
                <div class="social-media">
                    <ul class="social-media-icon">
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-facebook-square"></i></a></li>
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-instagram-square"></i></a></li>
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="descricao">
                    E se a segurança de que está a sua volta dependesse de você? Ou de mim?
                    Ou de todos nós? Seja um agente voluntário e ajude a proteger quem está ao seu redor!
                </div>
                <a class="cad" href="cadastrarAgente.php">Cadastre-se</a>
            </div>


            <div class="form">
                <form class="form" action="" method="POST">
                    <div class="form-img">
                        <div class="img-area">
                            <img src="css/img/im1.png" alt="camera">
                        </div>
                    </div>
                    <?php if (!is_null($msg)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $msg ?>
                        </div>
                    <?php } ?>
                    
                    <label class="label-input">
                        <i class="fa-solid fa-user  icon-modify"></i>
                        <input type="text" id="login" placeholder="Usuário" name="login" require>
                    </label>

                    <label class="label-input">
                        <i class="fa-solid fa-lock icon-modify"></i>
                        <input type="password" id="senha" placeholder="Senha" name="senha" require>
                    </label>

                    <div class="botoes">
                        <button class="btn btn-form" id="entrar">Entrar</button>
                        <button class="cad"><a href="cadastrarAgente.php">Cadastre-se</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--<div class="alerta">
        <div class="alerta-area">
            <div class="alerta-header" onclick="fecharAlerta()">
                <i class="fa-solid fa-rectangle-xmark"></i>
            </div>
            <div class="alerta-body">
                <p>Usuário ou senha invalidos</p>
            </div>
        </div>
    </div>
    <script src="js/login.js"></script> -->
</body>

</html>