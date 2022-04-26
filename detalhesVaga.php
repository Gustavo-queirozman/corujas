<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
$plano = $_SESSION['usuarioPlano'];
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
    <link rel="stylesheet" type="text/css" href="./styles/detalhesVaga.css">
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
$id = substr($url_atual, 45);
$query = "SELECT * FROM vagas WHERE id_vaga = '$id'";
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
                <div class="empresa">
                    <h1><?php echo $dado['empresa']; ?></h1><br><br>
                </div>

                <div class="barra"></div>

                <div class="titulo">
                    <h3><?php echo $dado['titulo']; ?></h3><br><br>
                </div>

                <div class="descricao">
                    <b>Descrição geral:</b><br>
                    <span><?php echo $dado['descricao']; ?></span><br><br>
                </div>

                <div class="funcao">
                    <b>Função e responsabilidades:</b><br>
                    <span><?php echo $dado['funcao']; ?></span><br><br>
                </div>

                <div class="restricao">
                    <b>Qualificação básica:</b><br>
                    <span><?php echo $dado['restricao']; ?></span><br><br>
                </div>

                <div class="salario">
                    <b>Salário:</b><br>
                    <span><?php echo $dado['salario']; ?></span>
                </div>
            <?php } ?>

            <?php 
            if ($categoria == "trabalhador") { 
                if($curriculo == true){ ?>
                    <form action="enviarCurriculo.php" method="post">
                        <input type="hidden" name="id_usuario" <?php echo "value=' $id_usuario'"?>>
                        <input type="hidden" name="id"  <?php echo "value='$id'"?>>
                        <input type="hidden" name="plano" <?php echo "value='$plano'"?>>
                        <button>ENVIAR MEU CURRÍCULO</button>
                    </form>
                    <?php
                }elseif($curriculo == false){
                    echo '<a href="meuCurriculo.php"><button>ENVIAR MEU CURRÍCULO</button></a>';//criar currículo
                }
                
            }elseif($categoria == "empresa"){ ?>

                <form action="excluirVaga.php" method="post">
                    <button>EXCLUIR VAGA</button>
                    <input type="hidden" name="id" <?php echo "value='$id'"?>>
                </form>

                <style type="text/css">
                    button{ 
                        padding: 5px;
                        border-radius: 10px;
                        color: white;
                        border: 2px solid red;
                        text-decoration: none;
                        background-color: red;
                    }
                    button:hover{
                        background-color: red;
                        border: 2px solid red;
                        text-decoration: none;
                    }
                </style>
            <?php }?>
        </div>
    </nav>

<?php 
echo '<script src="btnMenu.js"></script>';
?>

</body>

</html>

