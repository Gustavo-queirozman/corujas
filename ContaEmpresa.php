<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
$id = $_SESSION['usuarioId'];
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
    <link rel="stylesheet" type="text/css" href="./styles/conta.css">
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

    <div class="container">
        <div>
            <span>Para atualizar os dados entre em contato com o endereço de e-mail abaixo</span><br>
            <b>gustavoqueirozmit@gmail.com</b>
        </div>
    </div>
</body>

</html>


<?php
echo '<script src="btnMenu.js"></script>';
?>