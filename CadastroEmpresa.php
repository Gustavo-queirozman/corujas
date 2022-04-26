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
        <link rel="stylesheet" type="text/css" href="./styles/RegistrarEmpresa.css">
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

<?php
    include_once '';
?>

<?php 
    $preenchido = false;
    $erro_nome = false;
    $erro_cnpj = false;
    $erro_nome_empresa = false;
    $erro_email = false;
    $erro_senha = false;
    $erro_numero = false;
    $erro_pais = false;
    $erro_cidade = false;
    $erro_estado = false;
    $erro_endereco = false;
    $categoria = "empresa";
    $id = "";
    $erro = "";

    $nome = trim($_POST['nome']);
    $cnpj = trim($_POST['cnpj']);
    $nome_empresa = trim($_POST['nome_empresa']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $numero = trim($_POST['numero']);
    $pais = trim($_POST['pais']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $endereco = trim($_POST['endereco']);

    if(empty($nome)){
        $preenchido = true;
        $erro_nome = true;
    }elseif(empty($cnpj)){
        $preenchido = true;
        $erro_cnpj = true;
    }elseif(empty($nome_empresa)){
        $preenchido = true;
        $erro_nome_empresa = true;
    }elseif(empty($email)){
        $preenchido = true;
        $erro_email = true;
    }elseif(empty($senha)){
        $preenchido = true;
        $erro_senha = true;
    }elseif(empty($numero)){
        $preenchido = true;
        $erro_numero = true;
    }elseif(empty($pais)){
        $preenchido = true;
        $erro_pais = true;
    }elseif(empty($cidade)){
        $preenchido = true;
        $erro_cidade = true;
    }elseif(empty($estado)){
        $preenchido = true;
        $erro_estado = true;
    }elseif(empty($endereco)){
        $preenchido = true;
        $erro_endereco = true;
    }else {
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
        $cnpj = stripcslashes($_POST['cnpj']);
        $cnpj = $conn -> real_escape_string($cnpj);
        $nome_empresa = stripcslashes($_POST['nome_empresa']);
        $nome_empresa = $conn -> real_escape_string($nome_empresa);
        $email = stripcslashes($_POST['email']);
        $email = $conn -> real_escape_string($email);
        $senha = stripcslashes($_POST['senha']);
        $senha = $conn -> real_escape_string($senha);
        $numero = stripcslashes($_POST['numero']);
        $numero = $conn -> real_escape_string($numero);
        $pais = stripcslashes($_POST['pais']);
        $pais = $conn -> real_escape_string($pais);
        $cidade = stripcslashes($_POST['cidade']);
        $cidade = $conn -> real_escape_string($cidade);
        $estado = stripcslashes($_POST['estado']);
        $estado = $conn -> real_escape_string($estado);
        $endereco = stripcslashes($_POST['endereco']);
        $endereco = $conn -> real_escape_string($endereco);
        
        // Verifica se ocorreu alguma falha durante a conexão
        if ($conn->connect_error){
            die("Falha na conexão com o MySQL: " . $conn->connect_error);}
        else{
            echo "Conectado ao MySQL";

            $sql = "INSERT INTO usuarios(email, senha, categoria) VALUES ('$email', '$senha', '$categoria')";
           
            if ($conn -> query($sql)) {
                echo "Cadastrado com Sucesso";            
                $id = $conn->insert_id;

                // Verifica se ocorreu alguma falha durante a conexão
                if ($conn->connect_error){
                    die("Falha na conexão com o MySQL: " . $conn->connect_error);}
                else{
                    echo "Conectado ao MySQL";
                    $sql = "INSERT INTO empresas(id_empresa, nome, empresa, cnpj, email, senha, telefone, pais, cidade, estado, endereco) VALUES ('$id', '$nome', '$nome_empresa', '$cnpj', '$email', '$senha', '$numero', '$pais', '$cidade', '$estado', '$endereco')";
                    if ($conn -> query($sql)) {
                        echo "Cadastrado com Sucesso";
                        header("Location: Entrar.php");

                    } else { echo "Error: " . $sql . "" . mysqli_error($conn); }$conn->close();
                }

            } else {
                $erro = "Error: " . $sql . "" . mysqli_error($conn);
                if(strpos($erro, 'Duplicate') == true) { $preenchido = true; $erro = "*E-mail já em uso";}
            }
            $conn->close();
        }

    }

?>


<form action="CadastroEmpresa.php" method="post">
    <div>
        <h1>1-Sobre sua empresa</h1><br>
        <span>Nome completo</span><br>
        <input maxlength="255" type="text" name="nome" placeholder="Nome" <?php if($preenchido){ echo "value='$nome'";}?>><div class="erro-form"><?php if($erro_nome){echo "Preenchimento obrigatório"; } ?></div><br><br>
        <span>CNPJ<span><br>
        <input maxlength="20" type="number" name="cnpj" placeholder="CNPJ" <?php if($preenchido){ echo "value='$cnpj'";}?>><div class="erro-form"><?php if($erro_cnpj){echo "Preenchimento obrigatório"; } ?></div><br><br>
        <span>Nome da empresa<span><br>
        <input maxlength="60" type="text" name="nome_empresa" placeholder="Nome da empresa" <?php if($preenchido){ echo "value='$nome_empresa'";}?>><div class="erro-form"><?php if($erro_nome_empresa){echo "Preenchimento obrigatório"; } ?></div><br><br>
        
        <h2>2-Informações da Conta</h2><br>
        <span>E-mail</span><br>
        <input maxlength="255" type="email" name="email" placeholder="E-mail" id="inputEmail" <?php if($preenchido){ echo "value='$email'";}?>><div class="erro-form"><?php if($erro_email){echo "Preenchimento obrigatório"; } ?><?php if($erro){echo "*E-mail já em uso"; } ?></div><br><br>
        <span>Senha</span><br>
        <input maxlength="30" type="password" name="senha" placeholder="Senha" id="inputPassword" <?php if($preenchido){ echo "value='$senha'";}?>><div class="erro-form"><?php if($erro_senha){echo "Preenchimento obrigatório"; } ?></div><br><br>
        
        <h2>3-Informações de Contato</h2><br>
        <span>WhatsApp</span><br>
        <input maxlength="15" type="number" name="numero" placeholder="5535999093020" <?php if($preenchido){ echo "value='$numero'"; }?>><div class="erro-form"><?php if($erro_numero){echo "Preenchimento obrigatório"; } ?></div><br><br>
        <span>País</span><br>
        <input maxlength="58" type="text" name="pais" placeholder="Brasil" <?php if($preenchido){ echo "value='$pais'"; }?>><div class="erro-form"><?php if($erro_pais){echo "Preenchimento obrigatório"; } ?></div><br><br>
        
        <span>Cidade</span><br>
        <input maxlength="58" type="text" name="cidade" placeholder="Cidade" <?php if($preenchido){ echo "value='$cidade'"; }?>><div class="erro-form"><?php if($erro_cidade){echo "Preenchimento obrigatório"; } ?></div><br><br>
        <span>Estado</span><br>
        <input maxlength="50" type="text" name="estado" placeholder="Estado" <?php if($preenchido){ echo "value='$estado'"; }?>><div class="erro-form"><?php if($erro_estado){echo "Preenchimento obrigatório"; } ?></div><br><br>
        <span>Endereço</span><br>
        <input maxlength="300" type="text" name="endereco" placeholder="Endereço" <?php if($preenchido){ echo "value='$endereco'"; }?>><div class="erro-form"><?php if($erro_endereco){echo "Preenchimento obrigatório"; } ?></div><br><br>

        <div class="botao">
            <input type="submit" name="submit" class="submit">
        </div>
    </div>
</form>

<?php 
echo '<script src="btnMenu.js"></script>';
?>
