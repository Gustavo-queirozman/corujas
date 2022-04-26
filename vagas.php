<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();

$id_usuario = $_SESSION['usuarioId'];
$plano = $_SESSION['usuarioPlano'];
$categoria = $_SESSION['usuarioCategoria'];
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/reset.css" media="screen and (max-width: 1125px)">
    <link rel="stylesheet" type="text/css" href="./styles/btnMenu.css" media="screen and (max-width: 1125px)">
    <link rel="stylesheet" type="text/css" href="./styles/menu.css" media="screen and (max-width: 1125px)">
    <link rel="stylesheet" type="text/css" href="./styles/header.css" media="screen and (min-width: 1126px)">
    <link rel="stylesheet" type="text/css" href="./styles/vagas.css">
    <title>Corujas</title>
</head>




<body>
    <header class="wrap-menu mobile">
        <div class="logo-menu">
            <img class="logo" src="./logo.png" alt="logo">
        </div>
        
        <a class="btnMenu btnMenu_open" href="#menu">Menu</a>

        <ul id="menu" class="menu">
            <li class="btnMenu btnMenu_close">Cursos</li>

            <li class="menu-item">
                <a class="menu-item-action" href="vagas.php">Vagas</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="meuCurriculo.php">Meu currículo</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="notificacaoTrabalhador.html">Notificação</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="ContaTrabalhador.php">Conta</a>
            </li>
        </ul>
    </header>


    <header class="header">
        <div class="logo">
            <img src="159369672_2830559943850837_6735875689925307654_n.png" alt="Logo">
        </div>

        <div class="menu">
            <ul>
                <li><a href="vagas.php">Vagas</a></li>
                <li><a href="meuCurriculo.php">Meu currículo</a></li>
                <li><a href="notificacaoTrabalhador.html">Notificação</a></li>
                <li><a href="ContaTrabalhador.php">Conta</a></li>
            </ul>
        </div>
    </header>
    

    <nav>
        <div class="vagas">
            <h1>Vagas</h1>
            <div class="grid-container">


<?php
//$mysqli = new mysqli("localhost","my_user","my_password","my_db");
$conn = new mysqli("localhost", "empr0577_corujas", "_!Bp.as]=2)3", "empr0577_corujas");
$query = "SELECT * FROM tags_usuarios WHERE fk_usuario = '$id_usuario'";
$result_tags = mysqli_query($conn, $query) or die("Erro de Banco de Dados");
while ($dado = $result_tags->fetch_array()){
    $tags = $dado['tag'];
}

$array_tags = explode(', ',$tags);
foreach ($array_tags as $value){
    $query = "SELECT * FROM tags_vagas WHERE tag LIKE '%$value%' ";
    $result_tags = mysqli_query($conn, $query) or die("Erro de Banco de Dados");
    while ($dado = $result_tags->fetch_array()){
        if(empty($list_fk_vaga)){
            $list_fk_vaga = $dado['fk_vaga'];
        }else{
            $list_fk_vaga = $dado['fk_vaga']. ' ' .$list_fk_vaga;
        }
    }
}

$array_fk_vaga = explode(' ',$list_fk_vaga);
$array_fk_vaga = array_unique($array_fk_vaga);
foreach ($array_fk_vaga as $value){
    $fk_vaga = $value;
    $query = "SELECT * FROM vagas WHERE id_vaga = '$fk_vaga'";
    $result = mysqli_query($conn, $query) or die("Erro de Banco de Dados");?>


                <?php while ($dado = $result->fetch_array()) { ?>
                    <div class="item">
                        <b><?php echo mb_strimwidth($dado['titulo'], 0, 35, ".."); ?></b><br><br>
                        <span><?php echo mb_strimwidth($dado['descricao'], 0, 185, "..."); ?></span><br><br>
                        <div><b class="salario"><?php echo $dado['salario']; ?></b></div>
                        <a href="detalhesVaga.php?id=<?php echo $dado['id_vaga']; ?>"><button><b>DETALHES</b></button></a>
                    </div>
                <?php 
                }?>

<?php
}
?>
            </div>
        </div>
    </nav>
    <div class="space">

    <script src="btnMenu.js"></script>
</body>
</html>