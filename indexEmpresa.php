<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
$id_usuario = $_SESSION['usuarioId'];
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
    <link rel="stylesheet" type="text/css" href="./styles/indexEmpresa.css">
    <title>Corujas</title>
</head>


<?php
//$mysqli = new mysqli("localhost","my_user","my_password","my_db");
$conn = new mysqli("localhost", "empr0577_corujas", "_!Bp.as]=2)3", "empr0577_corujas");
$query = "SELECT * FROM vagas WHERE fk_usuario = '$id_usuario'";
$result_vagas = mysqli_query($conn, $query) or die("Erro de Banco de Dados");
?>

<body>
    <header class="wrap-menu mobile">
        <div class="logo-menu">
            <img class="logo" src="./logo.png" alt="logo">
        </div>
        
        <a class="btnMenu btnMenu_open" href="#menu">Menu</a>

        <ul id="menu" class="menu">
            <li class="btnMenu btnMenu_close">Cursos</li>

            <li class="menu-item">
                <a class="menu-item-action" href="curriculosEmpresa.php">Currículos</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="criarVagas.html">Criar vagas</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="notificacaoEmpresa.html">Notificação</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="ContaEmpresa.php">Conta</a>
            </li>
        </ul>
    </header>

    <header class="header">
        <div class="logo">
            <img src="159369672_2830559943850837_6735875689925307654_n.png" alt="Logo">
        </div>

        <div class="menu">
            <ul>
                <li><a href="curriculosEmpresa.php">Currículos</a></li>
                <li><a href="criarVagas.html">Criar vagas</a></li>
                <li><a href="notificacaoEmpresa.html">Notificação</a></li>
                <li><a href="ContaEmpresa.php">Conta</a></li>
            </ul>
        </div>
    </header>

    <nav>
        <div class="container">
            <div class="vagas">
                <h1>Minhas vagas</h1>
                <div class="grid-container">
                    <?php while ($dado = $result_vagas->fetch_array()) {?>
                        <div class="item">
                            <b><?php echo mb_strimwidth($dado['titulo'], 0, 35, "..."); ?></b><br><br>
                            <span><?php echo mb_strimwidth($dado['descricao'], 0, 185, "..."); ?></span><br><br>
                            <div><b class="salario"><?php echo $dado['salario']; ?></b></div>
                            <a href="detalhesVaga.php?id=<?php echo $dado['id_vaga']; ?>"><button><b>DETALHES</b></button></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="space">
            </div>
        </div>
    </nav>
    
    <script src="btnMenu.js"></script>
</body>

</html>