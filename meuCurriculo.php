<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();

$plano = $_SESSION['usuarioPlano'];
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
    <link rel="stylesheet" type="text/css" href="./styles/meuCurriculo.css">
    <title>Corujas</title>
</head>


<?php
//conectar com db curriculos e verificar se o id do usuario está lá
$servidor = "localhost";
$usuario = "empr0577_corujas";
$senha = "_!Bp.as]=2)3";
$dbname = "empr0577_corujas";
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if (!$conn) {
    die("Falha na conexao: " . mysqli_connect_error());
} else {
    //echo "Conexao realizada com sucesso";
}

$sql = "SELECT * FROM curriculos WHERE fk_usuario = '$id'";
$result_usuario = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($result_usuario);
$curriculo = false;
if (isset($result)) {//usuário tem currículo
    $curriculo = true;
    $sql = "SELECT * FROM curriculos WHERE fk_usuario = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($dado = $result->fetch_array()){
        $nome= $dado['nome'];
        $formacao = $dado['formacao'];
        $experiencia = $dado['experiencia'];
        $idade = $dado['idade'];
        $id_curriculo = $dado['id_curriculo'];
    }

} else { //usuário não tem currículo
    $curriculo = false;
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
        <div class="container">
            <h1>Criar currículo</h1>
            <div class="grid-container">
                <?php if($curriculo == 'true') {?>
                    <div class="item" class="item-curriculo">
                        <?php 
                        if($plano == 'premium'){ ?>
                            <div class="triangulo">
                                <b><?php echo mb_strimWidth(trim($nome), 0, 21, "..");?></b><br><br>
                                <img src="triangulo.png" alt="triangulo">
                            </div>

                            <?php
                        }else{?>
                            <b><?php echo mb_strimWidth($nome, 0, 19, ".."); ?></b><br><br>
                  <?php }?>
                  
                        <span><?php echo mb_strimwidth($formacao, 0, 50, "..."); ?></span>
                        <span><?php echo mb_strimwidth($experiencia, 0, 100, "..."); ?></span><br>
                        <b class="idade"><?php echo $idade, " anos"; ?></b><br>
                        <a href="detalhesCurriculo.php?id=<?php echo $id_curriculo;?>"><button>MEU CURRÍCULO</button></a>
                    </div>
                <?php } ?>

                <div class="item">
                    <b>Modelo de Currículo</b><br><br>
                    <span>.nome</span><br>
                    <span>.objetivo</span><br>
                    <span>.experiência</span><br>
                    <span>.formação</span><br>
                    <span>.idiomas</span><br>
                    <span>.informações adicionais</span><br>
                    <a href="curriculoModelo.php"><button>CRIAR CURRÍCULO</button></a>
                </div>

            </div>
        </div>
       
    </nav>
    <div class="space"></div>

    <script src="btnMenu.js"></script>
</body>

</html>