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
                <li><a href="EmpresaDashboard.html">Criar vagas</a></li>
                <li><a href="notificacaoEmpresa.html">Notificação</a></li>
                <li><a href="ContaEmpresa.php">Conta</a></li>
            </ul>
        </div>
    </header>


<?php
    $preenchido = false;
    
    $erro_nome_empresa = false;
    $erro_titulo = false;
    $erro_salario = false;
    $erro_funcao = false;
    $erro_requisitos = false;
    $erro_descricao = false;
    $erro_tags = false;

    $nome_empresa = trim($_POST['nome_empresa']);
    $titulo = trim($_POST['titulo']);
    $salario = trim($_POST['salario']);
    $descricao = trim($_POST['descricao']);
    $funcao = trim($_POST['funcao']);
    $requisitos = trim($_POST['requisitos']);
    $tags = trim($_POST['tags']);

    if(empty($nome_empresa)){
        $preenchido = true;
        $erro_nome_empresa = true;
    }elseif(empty($titulo)){
        $preenchido = true;
        $erro_titulo = true;
    }elseif(empty($salario)){
        $preenchido = true;
        $erro_salario =true;
    }elseif(empty($descricao)){
        $preenchido = true;
        $erro_descricao = true;
    }elseif(empty($funcao)) {
        $preenchido = true;
        $erro_funcao = true;
    } elseif(empty($requisitos)) {
        $preenchido = true;
        $erro_requisitos = true;
    }elseif(empty($tags)){
        $preenchido = true;
        $erro_tags = true;
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
        $nome_empresa = stripcslashes($_POST['nome$nome_empresa']);
        $nome_empresa = $conn -> real_escape_string($nome_empresa);
        $titulo = stripcslashes($_POST['titulo']);
        $titulo = $conn -> real_escape_string($titulo);
        $salario = stripcslashes($_POST['salario']);
        $salario = $conn -> real_escape_string($salario);
        $descricao = stripcslashes($_POST['descricao']);
        $descricao = $conn -> real_escape_string($descricao);
        $funcao = stripcslashes($_POST['funcao']);
        $funcao = $conn -> real_escape_string($funcao);
        $requisitos = stripcslashes($_POST['requisitos']);
        $requisitos = $conn -> real_escape_string($requisitos);
        $tags = stripcslashes($_POST['tags']);
        $tags = $conn -> real_escape_string($tags);

        if ($conn->connect_error){
            die("Falha na conexão com o MySQL: " . $conn->connect_error);}
        else{
            echo "Conectado ao MySQL";
            $sql = "INSERT INTO vagas(empresa ,titulo, salario, descricao, funcao, restricao, fk_usuario) VALUES('$nome_empresa', '$titulo', '$salario', '$descricao', '$funcao', '$requisitos', '$id_usuario')";
           
            if ($conn -> query($sql)) {
                echo "Inserido com Sucesso";            
                $id = $conn->insert_id;
                $sql = "INSERT INTO tags_vagas(tag, fk_vaga) VALUES('$tags', '$id')";

                if ($conn -> query($sql)) {
                    echo "Inserido com Sucesso";            
                    $id = $conn->insert_id;
                    header('location: indexEmpresa.php');
                }else{
                    $erro = "Error: " . $sql . "" . mysqli_error($conn);
                    if(strpos($erro, 'Duplicate') == true) { $preenchido = true; $erro = "*E-mail já em uso";}else{ echo $erro;}
                }
            }else{
                $erro = "Error: " . $sql . "" . mysqli_error($conn);
                if(strpos($erro, 'Duplicate') == true) { $preenchido = true; $erro = "*E-mail já em uso";}else{ echo $erro;}
            }
           
        }

    }

?>

    <form action="vaga.php" method="post">
        <nav>
            <span>Nome Empresa:</span><br>
            <input maxlength="255" type="text" name="nome_empresa" placeholder="CI&T" <?php if($preenchido == true) {echo "value='$nome_empresa'"; }?>><div class="erro-form"><?php if($erro_nome_empresa == true) { echo '*Preenchimento obrigatório'; }?></div><br><br>
            <span>Título:</span><br>
            <input maxlength="255" type="text" name="titulo" placeholder="Engenheiro de Dados Sênior" <?php if($preenchido == true) {echo "value='$titulo'"; }?>><div class="erro-form"><?php if($erro_titulo == true) { echo '*Preenchimento obrigatório'; }?></div><br><br>
            <span>Salário:</span><br>
            <input maxlength="50" type="text" name="salario" placeholder="R$ 8.500,00" <?php if($preenchido == true) {echo "value='$salario'"; } ?>><div class="erro-form"><?php if($erro_salario == true) { echo '*Preenchimento obrigatório'; }?></div><br><br>

            <span>Descrição geral:</span><br>
            <textarea minlength="200" maxlength="5000" name="descricao" cols="30" rows="10" placeholder="Estamos procurando um desenvolvedor sênior para fazer parte de nossa equipe em nosso centro de desenvolvimento, trabalhando com nosso cliente gigante de mídia texano. Nesta posição, você irá projetar e implementar soluções de software, trabalhando em estreita colaboração com equipes nos EUA e no Brasil. Você precisa de proficiência avançada e / ou fluente em inglês para se comunicar com essas diferentes equipes durante a jornada de trabalho."><?php if($preenchido == true ) { echo $descricao; }?></textarea><div class="erro-form-text-area"><?php if($erro_descricao == true) {echo "*Preenchimento obrigatório"; }?></div><br><br>
            <span>Funções e responsabilidades:</span><br>
            <textarea maxlength="5000" name="funcao" cols="30" rows="10" placeholder="Definir, construir e entregar pipelines de dados de alta qualidade. Desenvolva código usado por ferramentas de dados na AWS para realizar a transformação de dados esperada e operações de processamento Desenvolva o projeto e a configuração da infraestrutura da AWS.."><?php if($preenchido == true ) { echo $funcao; }?></textarea><div class="erro-form-text-area"><?php if($erro_funcao == true) {echo "*Preenchimento obrigatório"; }?></div><br><br>
            <span>Qualificações básicas:</span><br>
            <textarea maxlength="5000" name="requisitos" id="" cols="30" rows="10" placeholder="Sólida experiência em desenvolvimento de software;Experiência no desenvolvimento de aplicações backend com framework Java e Spring com testes automatizados. A experiência com a nuvem de primavera é um diferencial; Experiência em trabalhar com bancos de dados do lado do desenvolvimento. Experiência preferida com DynamoDB, ElasticSearch, MySQL e PostgreSQL Experiência no desenvolvimento de sistemas nativos em nuvem utilizando containers. A experiência com AWS ECS e EKS é um diferencial; Experiência em trabalhar em um ambiente DevOps maduro, com integração e entrega contínuas. Desejável conhecimento de AWS lambda Vontade de trabalhar com diferentes tecnologias e aprender todos os dias; Capacidade de compartilhar seu conhecimento com mais membros da equipe júnior."><?php if($preenchido == true){echo $requisitos; }?></textarea><div class="erro-form-text-area"><?php if($erro_requisitos == true) {echo "*Preenchimento obrigatório"; }?></div><br><br>
            
            <span>Escolha tipo de vaga</span> <h5>Procuro emprego relacionado a...</h5><br>
            <input minlength="5" name="tags" type="text" placeholder="Ex: eletricista, mecanico, engenheiro civil, pedreiro" <?php if($preenchido){ echo "value='$tags'"; }?>><div class="erro-form"><?php echo '***Obs: separe com vírgula'; ?></div>
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
