<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/meuStilo8.css"/>
        <title>Cadastrar Agente</title>
    </head>
    <body>
        <div class="container">
            <div class="container-area">
                <div class="form">
                <form class="form" method="POST" action="cadastro_agente.php">
                        <div class="form-img">
                            <div class="img-area">
                                <img src="css/img/im1.png" alt="camera">
                            </div>
                        </div>
                        <label class="label-input">
                            <i class="fa-solid fa-user  icon-modify"></i>
                            <input type="text" placeholder="Nome" name="nome" required>
                        </label>
                        <label class="label-input">
                            <i class="fa-solid fa-user  icon-modify"></i>
                            <input type="text" placeholder="Usuário" name="login" required>
                        </label>
                        <label class="label-input">
                            <i class="fa-solid fa-lock icon-modify"></i>
                            <input type="password" placeholder="Senha" name="senha" required>
                        </label>
                       
                        
                        <button class="btn btn-form">Cadastrar</button>
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