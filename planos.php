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
    <link rel="stylesheet" href="./styles/planos.css">
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
                <li><a href="notificacao.html">Notificação</a></li>
                <li><a href="contaTrabalhador.php">Conta</a></li>
            </ul>
        </div>
    </header>

    <form action="assinar.php" method="post">
        <div class="container">
            <div class="grid-container">
                <div class="item">
                    <div>Free</div>

                    <div class="preco">
                        <b><b class="menor">R</b>$0</b>
                    </div>

                    <ul>
                        <li class="yes">Envio do currículo manual</li>
                        <li class="yes">Envio do currículo 1/semana</li>
                        <li class="yes">Aprovação do currículo 10 dias</li>
                        <li class="no">Envio do currículo automático</li>
                        <li class="no">Envio do currículo ilimitado</li>
                        <li class="no">Aprovação do currículo instantâneo</li>
                        <li class="no">Selo de verificação</li>
                        <li class="no">Prioridade do currículo máxima, no topo da lista</li>
                    </ul>

                    <div class="botao">
                        <input type="submit" name="premium" value="Assinar">
                    </div>
                </div>

                <div class="item">
                    <div>Premium</div>

                    <div class="preco">
                        <span><s>R$20</s></span>
                        <b><b class="menor">R</b>$7</b>
                    </div>
                    
                    <ul>
                        <li class="yes">Envio do currículo manual</li>
                        <li class="yes">Envio do currículo automático</li>
                        <li class="yes">Envio do currículo ilimitado</li>
                        <li class="yes">Aprovação do currículo instantâneo</li>
                        <li class="yes">Selo de verificação</li>
                        <li class="yes">Prioridade máxima do currículo, no topo da lista</li>
                    </ul>
                    
                    <br><br><br>
                    <div class="botao">
                        <input type="submit" name="premium" value="Assinar">
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php 
echo '<script src="btnMenu.js"></script>';
?>

</body>

</html>