<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
$id = $_SESSION['usuarioId'];
$plano = $_SESSION['usuarioPlano'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/reset.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/btnMenu.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/menu.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/header.css" media="screen and (min-width: 1024px)">
    <link rel="stylesheet" type="text/css" href="./styles/aprovacao.css">
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

    <form action="planos.php" method="post">
        <div class="container">
            <span>Você <b>atingiu o limite</b> de currículos que podem ser enviados durante o mês,<br> <b>faça upgrade</b> agora e <b>envie currículos ilimitados</b>.</span><br>
            <div class="botao">
                <input name="upgrade" type="submit" value="Fazer upgrade">
            </div>
        </div>
    </form>
</body>

</html>