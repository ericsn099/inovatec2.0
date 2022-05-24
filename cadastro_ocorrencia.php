<!doctype html>
<html lang="en">
<?php session_start(); ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <title>Vigilante</title>
</head>

<body>
    <div class="container">
        <div class="row-9">
            <?php
            date_default_timezone_set("America/Manaus");
            $hoje = date("d-m-y H:i:s");
            include "conexao.php";
            $publicacao = $_POST['publicacao'];
            $nivel = $_POST['nivel'];
            $situacao = $_POST['cmocorrencia'];
            $bairro = $_POST['cmbairros'];
            $rua = $_POST['cmrua'];
            $agente = $_SESSION['id'];
            $sql = "INSERT INTO `publicacaoagente`(`publicacao`, `nivel`, `id_situacao`,`datahora`,`id_agente`, `id_bairro`, `id_rua`) 
                        VALUES ('$publicacao','$nivel','$situacao','$hoje','$agente','$bairro','$rua')";

            mysqli_query($conn, $sql);
            ?>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        window.location.replace("./index.php");
    </script>

</body>

</html>