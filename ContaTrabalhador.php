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
    <link rel="stylesheet" type="text/css" href="./styles/reset.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/btnMenu.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/menu.css" media="screen and (max-width: 1023px)">
    <link rel="stylesheet" type="text/css" href="./styles/header.css" media="screen and (min-width: 1024px)">
    <link rel="stylesheet" type="text/css" href="./styles/conta.css">
    <title>Corujas</title>
</head>

<?php
    $conn = mysqli_connect("localhost", "empr0577_corujas", "_!Bp.as]=2)3", "empr0577_corujas") or die('Erro ao conectar ao banco de dados requisitado');
    $sql = "SELECT * FROM tags_usuarios WHERE fk_usuario = '$id_usuario'"; 
    $result = mysqli_query($conn,$sql) or die("Erro ao tentar obter o registro");
    while ($dado = $result->fetch_array()){
        $tags = $dado['tag'];
        $check = $dado['enviar_curriculo'];
    }
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
        <form action="intermediaria.php" method="post">
            <div class="textos">
                <span>Para atualizar outros tipos de dados entre em contato <br> com o endereço de e-mail abaixo</span><br>
                <b>gustavoqueirozmit@gmail.com</b><br><br><br>
            </div>

            <span>Atualizar tipo de vaga:</span>
            <h5>Procuro emprego relacionado a...</h5>
            <input class="input" type="text" name="tags" placeholder="Ex: eletricista, mecanico, engenheiro civil, pedreiro" <?php echo "value='$tags'"; ?>>
            <div class="erro-form">***Obs: separe com vírgula</div>

            <?php if ($plano == "premium") { ?>
                <div class="check-box">
                    <label class="label">
                        <input type="checkbox" name="check" <?php if($check == 'sim'){ echo "checked='checked'"; }?>>
                        <span>Enviar currículo automaticamente</span>
                    </label>
                </div>
            <?php } ?>

            <div class="botao">
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                <input name="salvar" class="submit" type="submit" class="submit" value="Salvar">
            </div>

            <?php if ($plano != "premium") { ?>
                <div class="upgrade">
                    <span>Quero desbloquear novas funções:</span>
                    <input name="upgrade" type="submit" value="Fazer upgrade">
                </div>
            <?php } ?>
        </form>
    </nav>
</body>

</html>

<?php
echo '<script src="btnMenu.js"></script>';
?>