<?php
session_start();
$pequisa = $_POST['busca'] ?? '';

require "conexao.php";
$sql = "SELECT publicacaoagente.datahora, publicacaoagente.id,bairro.nomeBairro, rua.nome, publicacaoagente.nivel, publicacaoagente.publicacao from bairro,rua,publicacaoagente  where bairro.id = publicacaoagente.id_bairro and rua.id = publicacaoagente.id_rua and bairro.nomeBairro like '%$pequisa%' order by publicacaoagente.id desc";
$dados = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/meuStilo6.css" />
    <title>Ocorrências</title>
</head>

<body>
    <?php include('headerIndex.php'); ?>

    <section class="pesquisa">
        <div class="pesquisa-area">
            <div class="p-leftSide">
                <form action="" method="POST">
                    <input type="text" placeholder="Digite o nome do bairro" name="busca">
                    <button>Procurar</button>
                </form>
            </div>
            <div class="p-rigthSide">
                <span>Mapa de Crimes</span>
            </div>
        </div>
    </section>
    <section class="principal">
        <div class="principal-area">
            <div class="area-dashbord">
                <div class="dashbord-item">
                    <div class="dash-item">
                        <div class="d-i-leftSide">
                            Assalto
                        </div>
                        <div class="d-i-rightSide">
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 1";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dash-item">
                        <div class="d-i-leftSide">
                            Furto
                        </div>
                        <div class="d-i-rightSide">
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 2";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dash-item">
                        <div class="d-i-leftSide">
                            Tentativa <br>
                            de Assalto
                        </div>
                        <div class="d-i-rightSide">
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 3";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dash-item">
                        <div class="d-i-leftSide">
                            Suspeito
                        </div>
                        <div class="d-i-rightSide">
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 4";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dash-item">
                        <div class="d-i-leftSide">
                            Perda de <br> documento
                        </div>
                        <div class="d-i-rightSide">
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 5";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dash-item">
                        <div class="d-i-leftSide">
                            Tiroteio
                        </div>
                        <div class="d-i-rightSide">
                            <?php $sql2 = "SELECT COUNT(id_situacao) as soma FROM publicacaoagente WHERE id_situacao = 6";
                            $dados3 = mysqli_query($conn, $sql2);
                            ?>
                            <?php
                            while ($linha = mysqli_fetch_assoc($dados3)) {
                                $nome = $linha['soma'];
                                echo "<div class='qtd'> $nome </div>";
                            }
                            ?>
                        </div>
                    </div>

                </div>
                <div class="seja-agente">
                    <span>Seja um Agente</span>
                    <div class="agente-area">

                    </div>
                </div>
            </div>
            <div class="area-mapa">

            </div>
        </div>
    </section>
    <div class="titulo-pub">
        <h2>publicacões</h2>
        <div class="seta-down">
            <img src="css/img/down.png">
        </div>
    </div>
    <section class="publicacoes ">
        <?php
        while ($pub = mysqli_fetch_assoc($dados)) {

            $id = $pub['id'];
            $bairro = $pub['nomeBairro'];
            $rua = $pub['nome'];
            $nivel = $pub['nivel'];
            $publicacao = $pub['publicacao'];
            $datahora = $pub['datahora'];

            if ($nivel == 1) {
                $nivel  = "<div class='opcao' style='background: green'> </div>";
            } else if ($nivel == 2) {
                $nivel  = "<div class='opcao' style='background: yellow'> </div>";
            } else {
                $nivel  = "<div class='opcao' style='background: red'> </div>";
            }
            echo            "
        <div class='ocorrencia'>
            <div class='oc-header'>
            <div class='leftSide'> 
            <h3>$datahora</h3>
            </div>
            <div class='rightSide'>
               <button><i class='fa-solid fa-pen'></i></button>
               <button><i class='fa-solid fa-rectangle-xmark'></i></button>
            </div>
                
            </div>
            <div class='oc-titulo'>
                <h3>$bairro, $rua </h3><br> 
                
                <div class='opcao'>$nivel</div>
            </div>
            <div class='oc-body'>
                <p>
                $publicacao
                </p>
            </div>

            <div class='oc-footer'>
                <div class='oc-f-icon'>
                    <div class='qtd-like qtd-like-on'></div>
                    <button class='like'><i class='fa-solid fa-thumbs-up'></i></button>
                    <span>Curti</span>

                </div>
                <div class='oc-f-icon'>
                    <button class='comentario'> <i class='fa-solid fa-message'></i></button>
                    <span>Comentar</span>
                </div>
                <div class='oc-f-icon'>
                    <button> <i class='fa-solid fa-share-from-square'></i></button>
                    <span>Compartilhar</span>
                </div>
            </div>";
        } ?>
        </div>
    </section>

    <footer>
        <div class="footer-area">
            <div class="f-s-l">
                Sistema comunitário de Segurança
            </div>
            <div class="f-s-r">
                &copy; 2022
            </div>
        </div>
    </footer>


    <div class="modal">
        <div class="modal-area">
            <div class="modal-header">
                <div class="fechar-modal">
                    <i class="fa-solid fa-rectangle-xmark"></i>
                </div>
            </div>
            <div class="modal-info">
                <div class="img-agente">

                </div>
                <div class="texto-agente">
                    Cada dia que passa nos deparamos com cenas terríveis de violência ao nosso redor, então criamos uma
                    ferramenta que poderá nos ajudar a levar as autoridades da segurança pública em tempo hábil tais atos de
                    violência... Querem nos ajudar a mudar isto? Inscrevam-se e tornem isso possível.

                    <a href="cadastrarAgente.php">Seja um agente</a>
                </div>
            </div>
        </div>
    </div>

    


    <script src="js/pesquisarOcorrencia.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/menu-hamburguer.js"></script>
</body>

</html>