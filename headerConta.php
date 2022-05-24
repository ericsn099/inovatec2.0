<header>
    <div class="header-area">
        <div class="logo">
            <div class="logo-img">
                <img src="css/img/logo_css.png" alt="logo">
            </div>
            <div class="logo-span">
                <span>Sistema Comunit&Aacute;rio</span>
                <span>De Seguran&Ccedil;a</span>
            </div>
        </div>
        <div class="menu">
            <nav>
                <ul>
                    <?php if (!isset($_SESSION["login"])) { ?>
                        <li>
                            <a href="login.php">Entrar</a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="ocorrencia.php">Cadastrar Ocorrencia</a>
                        </li>
                        <li>
                            <a href="index.php">Mural de Ocorrencias</a>
                        </li>
                        <li>
                            <a href="sair.php">Sair</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="menu-hamburguer">
    <i class="fa-solid fa-bars"></i>
</div>

<div class="menu-lateral">
    <nav>
        <nav>
            <ul>
                <?php if (!isset($_SESSION["login"])) { ?>
                    <li>
                        <a href="login.php">Entrar</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="ocorrencia.php">Cadastrar Ocorrencia</a>
                    </li>
                    <li>
                        <a href="index.php">Mural de Ocorrencias</a>
                    </li>
                    <li>
                        <a href="sair.php">Sair</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </nav>
</div>
<script src="js/menu-hamburguer.js"></script>