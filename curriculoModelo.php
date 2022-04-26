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
    <link rel="stylesheet" type="text/css" href="./styles/vaga.css">
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



<?php
    $preenchido = false;
    
    $erro_nome = false;
    $erro_objetivo = false;
    $erro_experiencia = false;
    $erro_formacao = false;
    $erro_info_adicionais = false;
    $erro_idioma = false;
    $erro_idade = false;

    $nome = trim($_POST['nome']);
    $objetivo = trim($_POST['objetivo']);
    $experiencia = trim($_POST['experiencia']);
    $formacao = trim($_POST['formacao']);
    $info_adicionais = trim($_POST['info_adicionais']);
    $idioma = trim($_POST['idioma']);
    $idade = trim($_POST['idade']);

    if(empty($nome)){
        $preenchido = true;
        $erro_nome = true;
    }elseif(empty($objetivo)){
        $preenchido = true;
        $erro_objetivo = true;
    }elseif(empty($experiencia)){
        $preenchido = true;
        $erro_experiencia =true;
    }elseif(empty($formacao)){
        $preenchido = true;
        $erro_formacao = true;
    }elseif(empty($info_adicionais)) {
        $preenchido = true;
        $erro_info_adicionais = true;
    } elseif(empty($idioma)) {
        $preenchido = true;
        $erro_idioma = true;
    } elseif(empty($idade)) {
        $preenchido = true;
        $erro_idade = true;
    }else{
        $servidor = "localhost";
        $usuario = "empr0577_corujas";
        $senha = "_!Bp.as]=2)3";
        $nomeBD = "empr0577_corujas";
        // Inicia uma nova conexão com o servidor MySQL.
        // Em caso de sucesso na conexão, a variável $conn será
        // ser utilizada posteriormente para manipulação do banco
        // de dados através dessa conexão
        $conn = new mysqli($servidor, $usuario, $senha, $nomeBD);
        //Abaixo atribuímos os valores provenientes do formulário pelo método POST
        $nome = stripcslashes($_POST['nome']);
        $nome = $conn -> real_escape_string($nome);
        $objetivo = stripcslashes($_POST['objetivo']);
        $objetivo = $conn -> real_escape_string($objetivo);
        $experiencia = stripcslashes($_POST['experiencia']);
        $experiencia = $conn -> real_escape_string($experiencia);
        $formacao = stripcslashes($_POST['formacao']);
        $formacao = $conn -> real_escape_string($formacao);
        $info_adicionais = stripcslashes($_POST['info_adicionais']);
        $info_adicionais = $conn -> real_escape_string($info_adicionais);
        $idioma = stripcslashes($_POST['idioma']);
        $idioma = $conn -> real_escape_string($idioma);
        $idade = stripcslashes($_POST['idade']);
        $idade = $conn -> real_escape_string($idade);

        if ($conn->connect_error){
            die("Falha na conexão com o MySQL: " . $conn->connect_error);}
        else{
            if ($plano == "premium"){
                echo "Conectado ao MySQL";
                $sql = "INSERT INTO curriculos(nome ,objetivo, experiencia, formacao, idioma, informacao, fk_usuario, idade, plano) VALUES('$nome', '$objetivo', '$experiencia', '$formacao', '$idioma', '$info_adicionais', '$id', '$idade', '$plano')";
            
                if ($conn -> query($sql)) {
                    echo "Inserido com Sucesso";            
                    $id = $conn->insert_id;
                    header('location: vagas.php');
                }else{
                    echo "erro";
                }
            }else{
                echo "Conectado ao MySQL";
                $sql = "INSERT INTO curriculos_aprovacao(nome ,objetivo, experiencia, formacao, idioma, informacao, fk_usuario, idade, plano) VALUES('$nome', '$objetivo', '$experiencia', '$formacao', '$idioma', '$info_adicionais', '$id', '$idade', '$plano')";
            
                if ($conn -> query($sql)) {
                    echo "Inserido com Sucesso";            
                    $id = $conn->insert_id;
                    header('location: aprovacao.php');
                }else{
                    echo "erro";
                }
            }
           
        }

    }

?>

    <form action="curriculoModelo.php" method="post">
        <nav>
            <span>Nome Completo:</span><br>
            <input maxlength="255" type="text" name="nome" <?php if($preenchido == true) {echo "value='$nome'"; } ?>><div class="erro-form"><?php if($erro_nome == true) { echo '*Preenchimento obrigatório'; }?></div><br><br>
            
            <span>Objetivo:</span><br>
            <textarea maxlength="5000" name="objetivo" cols="30" rows="10" placeholder="[Área na qual pretende trabalhar ou título da vaga]"><?php if($preenchido == true ) { echo $objetivo; }?></textarea><div class="erro-form-text-area"><?php if($erro_objetivo == true) {echo "*Preenchimento obrigatório"; }?></div><br><br>
            
            <span>Experiência:</span><br>
            <textarea minlength="100" maxlength="5000" name="experiencia" cols="30" rows="10" placeholder="[Datas De] – [Até] [Cargo] | [Função] | [Nome da Empresa] [Este é o lugar para fornecer um breve resumo de suas principais responsabilidades e realizações mais brilhantes.]"><?php if($preenchido == true ) { echo $experiencia; }?></textarea><div class="erro-form-text-area"><?php if($erro_experiencia == true) {echo "*Preenchimento obrigatório"; }?></div><br><br>
            
            <span>Formação:</span><br>
            <textarea minlength="100" maxlength="5000" name="formacao" cols="30" rows="10" placeholder="[Nome da escola], [Cidade], [Estado] [Convém incluir aqui sua média e um breve resumo dos cursos, prêmios e homenagens relevantes.]"><?php if($preenchido == true){echo $formacao; }?></textarea><div class="erro-form-text-area"><?php if($erro_formacao == true) {echo "*Preenchimento obrigatório"; }?></div><br><br>
            
            <span>Informações Adicionais:</span><br>
            <textarea maxlength="5000" name="info_adicionais" cols="30" rows="10" placeholder="[Inclua prêmios, certificados, disponibilidade, cursos complementares e intercâmbio]"><?php if($preenchido == true ) { echo $info_adicionais; }?></textarea><div class="erro-form-text-area"><?php if($erro_info_adicionais == true) {echo "*Preenchimento obrigatório"; }?></div><br><br>
            
            <span>Idiomas:</span><br>
            <input maxlength="1000" type="text" name="idioma" placeholder="Inglês fluente, Espanhol básico" <?php if($preenchido == true) {echo "value='$idioma'"; } ?>><div class="erro-form"><?php if($erro_idioma == true) { echo '*Preenchimento obrigatório'; }?></div><br><br>
                        
            <span>Idade:</span><br>
            <input maxlength="2" type="text" name="idade" placeholder="18" <?php if($preenchido == true) {echo "value='$idade'"; } ?>><div class="erro-form"><?php if($erro_idade == true) { echo '*Preenchimento obrigatório'; }?></div><br><br>

            <div>
                <input type="submit" class="botao">
            </div>        
        </nav>
    </form>

</body>

</html>

<?php 
echo '<script src="btnMenu.js"></script>';
?>


