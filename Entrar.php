<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
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
    <link rel="stylesheet" type="text/css" href="./styles/Entrar.css">
    <title>Corujas</title>
</head>

<body>
    <header class="wrap-menu mobile">
        <div class="logo-menu">
            <img class="logo" src="./logo.png" alt="logo">
        </div>

        <a class="btnMenu btnMenu_open" href="#menu">Menu</a>

        <ul id="menu" class="menu">
            <li class="btnMenu btnMenu_close">menu</li>

            <li class="menu-item">
                <a class="menu-item-action" href="index.html">Home</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="index.html">Sobre nós</a>
            </li>

            <li class="menu-item">
                <a class="menu-item-action" href="Entrar.php">Entrar</a>
            </li>
        </ul>
    </header>

    <header class="header">
        <div class="logo">
            <img src="159369672_2830559943850837_6735875689925307654_n.png" alt="Logo">
        </div>

        <div class="menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html">Sobre nós</a></li>
                <li><a href="Entrar.php">Entrar</a></li>
            </ul>
        </div>
    </header>

    <div class="Login">
        <div>
            <form action="valida.php" method="post">
                <h1>Login</h1>
                <input type="email" name="email" placeholder="E-mail">
                <input type="password" name="senha" placeholder="Senha">
                <div class="button">
                    <input type="submit" class="botao">
                </div>

                <?php
                //Recuperando o valor da variável global, os erro de login.
                if (isset($_SESSION['loginErro'])) {
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                } ?>

                <?php
                //Recuperando o valor da variável global, deslogado com sucesso.
                if (isset($_SESSION['logindeslogado'])) {
                    echo $_SESSION['logindeslogado'];
                    unset($_SESSION['logindeslogado']);
                } ?>

                <div class="barra_inferior">
                    <span>Ainda não é cadastrado?</span>
                    <span><a href="CardsCadastro.html">Criar conta</a></span>
                </div>
            </form>
        </div>
    </div>

    <script src="btnMenu.js"></script>
</body>

</html>