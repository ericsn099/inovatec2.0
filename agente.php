<?php
session_start() or die('A sessão não pode ser iniciada');
include "conexao.php";
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


$SQL = "SELECT * FROM agente WHERE login = '" . $_SESSION['login'] . "'";
$dados = mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
$linha = mysqli_fetch_assoc($dados);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/meuStilo9.css" />
    <link rel="stylesheet" href="css/headerContaCss.css" />
    <title>Alterar Agente</title>
</head>

<body>
<?php include('headerConta.php'); ?>
    <div class="container">
        <div class="container-area">
            <div class="form">
                <form class="form" method="POST" action="update_agente.php">
                    <div class="form-img">
                        <div class="img-area">
                            <img src="css/img/im1.png" alt="camera">
                        </div>
                    </div>
                    <label class="label-input">
                        <i class="fa-solid fa-user  icon-modify"></i>
                        <input type="text" placeholder="Nome" name="nome" value="<?php echo $linha["nome"]; ?>" required>
                    </label>
                    <label class="label-input">
                        <i class="fa-solid fa-user  icon-modify"></i>
                        <input type="text" placeholder="Usuário" name="login" value="<?php echo $linha["login"]; ?>" required>
                    </label>

                    <label class="label-input">
                        <i class="fa-solid fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha" value="<?php echo $linha["senha"]; ?>" required>
                    </label>

                    <div class="botoes">
                        <button type="submit" class="alterar">Alterar</button>
                        <a href="index.php" class="voltar">Voltar</a>
                        <a href="excluir_agente.php" class="excluir">Excluir conta</a>
                    </div>
                </form>
            </div>
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
            </div>
        </div>
    </div>
</body>

</html>