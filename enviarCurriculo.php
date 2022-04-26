<?php
$conn = mysqli_connect("localhost", "empr0577_corujas", "_!Bp.as]=2)3", "empr0577_corujas") or die('Erro ao conectar ao banco de dados requisitado');
$id_vaga = $_POST['id'];
$plano = $_POST['plano'];
$id_usuario = $_POST['id_usuario'];
echo $plano; echo '<br>';  
echo $id_usuario;


if($plano == "premium"){
    $sql = "SELECT fk_usuarios FROM vagas WHERE id_vaga = '$id_vaga'";
    $result = mysqli_query($conn,$sql) or die("Erro ao consultar");

    while ($dado = $result->fetch_array()) {
        if(empty($dado['fk_usuarios'])){
            $sql = "UPDATE vagas SET fk_usuarios = '$id_usuario' WHERE id_vaga= '$id_vaga'"; 
            mysqli_query($conn,$sql) or die("Erro ao tentar atualizar registro");
            header("Location: vagas.php");
        }else{
            $list_curriculos = $dado['fk_usuarios'];
            $array = explode(" ",$list_curriculos);
            foreach ($array as $value)
                echo $value;
                if($id_usuario == $value){
                    echo "já enviou o curriculo!";
                    header("Location: vagas.php");
                }else{
                    $sql = "UPDATE vagas SET fk_usuarios = '$list_curriculos$id_usuario' WHERE id_vaga= '$id_vaga'"; 
                    mysqli_query($conn,$sql) or die("Erro ao tentar atualizar registro");
                        header("Location: vagas.php");
                }
        }
    }
}else{
    $sql = "SELECT * FROM curriculos_enviados WHERE fk_usuario = '$id_usuario'";
    $result = mysqli_query($conn,$sql) or die("Erro ao consultar");
    $rowcount=mysqli_num_rows($result);
 
    if($rowcount == 0){
        $sql = "INSERT INTO curriculos_enviados(fk_usuario, enviado) VALUES ('$id_usuario', '1')";
        mysqli_query($conn,$sql) or die("Erro ao tentar atualizar registro");
        header("Location: vagas.php");
    }else{
        $sql = "SELECT * FROM curriculos_enviados WHERE fk_usuario='$id_usuario'";
        mysqli_query($conn,$sql) or die("Erro ao tentar atualizar registro");
        while ($dado = $result-> fetch_array()){
            $enviado = $dado['enviado'];
            $list_enviados = $dado['enviados'];
            $array = explode(" ",$list_enviados);

            if(in_array($id_vaga, $array)){
                header("Location: vagas.php");
            }else{
                if ($enviado != 4){
                    $num = 1;
                    $soma_enviado = ($enviado + $num);
 
                    $sql = "UPDATE curriculos_enviados SET  enviados = '$list_enviados $id_vaga' WHERE fk_usuario = '$id_usuario'";
                    mysqli_query($conn,$sql) or die("Erro ao tentar atualizar registro");

                    if ($conn -> query($sql)) {
                        echo "Inserido com Sucesso";
                        $sql = "UPDATE curriculos_enviados SET  enviado = '$soma_enviado' WHERE fk_usuario = '$id_usuario'";
                        mysqli_query($conn,$sql) or die("Erro ao tentar atualizar registro");
                        header("Location: vagas.php");            
                    }else{
                        $erro = "Error: " . $sql . "" . mysqli_error($conn);
                    }
                }else{
                    header("Location: limite.php");
                }
            }
        }
    }
}
mysqli_close($conn);
?>




