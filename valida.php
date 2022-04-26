<?php
    $servidor = "localhost";
    $usuario = "empr0577_corujas";
    $senha = "_!Bp.as]=2)3";
    $dbname = "empr0577_corujas";
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }
?> 


<?php
    session_start(); 
    //Incluindo a conexão com banco de dados    
    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
       
            
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $sql = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id_usuario'];
            $_SESSION['usuarioCategoria'] = $resultado['categoria'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
            $_SESSION['usuarioPlano'] = $resultado['plano'];
            if($_SESSION['usuarioCategoria'] == "empresa"){
                header("Location: indexEmpresa.php");
            }elseif($_SESSION['usuarioCategoria'] == "trabalhador"){
                header("Location: vagas.php");
            }else{
                header("Location: cliente.php");
            }
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = '<label>*Usuário ou senha Inválido</label> <style>label{color: red; font-size: 15px; margin-top: 1.5vh; margin-bottom: 2vh;}</style>';
            header("Location: Entrar.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = '<label>*Usuário ou senha Inválido</label> <style>label{color: red; font-size: 15px; margin-top: 1.5vh; margin-bottom: 2vh;}</style>';
        header("Location: Entrar.php");
    }
?>