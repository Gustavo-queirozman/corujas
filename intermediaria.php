<?php

$id_usuario = $_POST['id_usuario'];
$check = $_POST['check'];
$tags = $_POST['tags'];
$botao_salvar = $_POST['salvar'];
$botao_upgrade = $_POST['upgrade'];


if($botao_salvar){
    if($check){
        $check = "sim";
    }else{
        $check = "nao";
    }
    $conn = mysqli_connect("localhost", "empr0577_corujas", "_!Bp.as]=2)3", "empr0577_corujas") or die('Erro ao conectar ao banco de dados requisitado');
    $sql = "UPDATE tags_usuarios SET tag = '$tags', enviar_curriculo = '$check' WHERE fk_usuario = '$id_usuario'";
    $result = mysqli_query($conn,$sql) or die("Erro ao consultar");
    header("Location: ContaTrabalhador.php");

}else{
    echo "levar para tela de planos";
    header("Location: planos.php");
}
?>