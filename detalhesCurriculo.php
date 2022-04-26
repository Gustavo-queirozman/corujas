<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
$id_usuario = $_SESSION['usuarioId'];
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
    <link rel="stylesheet" type="text/css" href="./styles/detalhesCurriculo.css">
    <title>Corujas</title>
</head>

<?php
/*verifica se o usuario tem curriculo*/
$conn = new mysqli("localhost", "empr0577_corujas", "_!Bp.as]=2)3", "empr0577_corujas");
$sql = "SELECT * FROM curriculos WHERE fk_usuario = '$id_usuario'";
$resultado_usuario = mysqli_query($conn, $sql);
$resultado = mysqli_fetch_assoc($resultado_usuario);
if (isset($resultado)) { //usuário tem currículo
    $curriculo = true;
} else { //usuário não tem currículo
    $curriculo = false;
}


/*obtém os dados da vaga a partir do id*/
$url_atual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id = substr($url_atual, 50);
$query = "SELECT * FROM curriculos WHERE id_curriculo = '$id'";
$result = mysqli_query($conn, $query) or die("Erro de Banco de Dados");
?>



<body>
    <?php 
    if($categoria == "empresa"){ 
        echo
        '<header class="wrap-menu mobile">
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
        </header>';
    }else{
        echo 
        '<header class="wrap-menu mobile">
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
        </header>';
    }?>    

    <nav>
        <div class="flex-container"><br><br><br><br><br>

            <?php while ($dado = $result->fetch_array()) { ?>
                <div class="nome">
                    <b>Nome:</b>
                    <span><?php echo $dado['nome']; ?></span><br><br>
                </div>

                <div class="objetivo">
                    <b>Objetivo:</b>
                    <span><?php echo $dado['objetivo']; ?></span><br><br>
                </div>

                <div class="experiencia">
                    <b>Experiência:</b>
                    <span><?php echo $dado['experiencia']; ?></span><br><br>
                </div>

                <div class="formacao">
                    <b>Formação:</b>
                    <span><?php echo $dado['formacao']; ?></span><br><br>
                </div>

                <div class="idiomas">
                    <b>Idiomas:</b>
                    <span><?php echo $dado['idioma']; ?></span><br><br>
                </div>

                <div class="informacoes">
                    <b>Informações adicionais:</b>
                    <span><?php echo $dado['informacao']; ?></span>
                </div>
            <?php } ?>

            <?php 
            if ($categoria == "trabalhador") { ?>
                <form action="excluirCurriculo.php" method="post">
                    <input type="hidden" name="id" <?php echo "value='$id'"?>>
                    <button class="excluir">EXCLUIR CURRICULO</button>
                </form> 
            <?php
            }elseif($categoria == "empresa"){
                $query = "SELECT * FROM curriculos WHERE id_curriculo = '$id'";
                $result = mysqli_query($conn, $query) or die("Erro de Banco de Dados");
                while ($dado = $result->fetch_array()) { 
                    $fk_usuario = $dado['fk_usuario'];
                }?>
                    <?php 
                    $query = "SELECT * FROM curriculos WHERE id_curriculo = '$id'";
                    $result = mysqli_query($conn, $query) or die("Erro de Banco de Dados");
                    while ($dado = $result->fetch_array()) { 
                        $fk_usuario = $dado['fk_usuario'];
                    }?> 
                    
                    <?php 
                    $query = "SELECT * FROM trabalhadores WHERE id_trabalhador = '$fk_usuario'";
                    $result = mysqli_query($conn, $query) or die("Erro de Banco de Dados");
                    while ($dado = $result->fetch_array()) { 
                        $telefone = $dado['telefone'];
                    }?>

                    <a href="https://wa.me/<?php echo trim($telefone);?>" target="_blank"><div><button class="mensagem">ENVIAR MENSAGEM</button></div></a>

                    <form action="#" method="post">
                        <input type="hidden" name="id_usuario" <?php echo "value='$id_usuario'"?>>
                        <input type="hidden" name="id" <?php echo "value='$id'"?>>
                    </form> 
    <?php }?>
        </div>
    </nav>
</body>

</html>

<?php 
echo '<script src="btnMenu.js"></script>';
?>