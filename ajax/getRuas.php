<?php
include "../conexao.php";

if (isset($_POST['id_bairro'])) {
    $id_bairro = $_POST['id_bairro'];

    $sqlRua = "SELECT * FROM rua WHERE id_bairro = '$id_bairro' order by nome asc";
    $dados = mysqli_query($conn, $sqlRua);

    $return = '';

    if (isset($_POST['ruas_option'])) {
        if ($_POST['ruas_option'] == 'select') {
            while ($linha = mysqli_fetch_assoc($dados)) {
                $nome = $linha['nome'];
                $return .= "<option  value='" . $linha['id'] . "' class='op_ruas' data-bairro='" . $linha['id_bairro'] . "'> $nome </option>";
            }
        }
    }

    $array = array("erro" => 0, "ruas" => $return);
    echo json_encode($array);
}
