<?php
$conn = mysqli_connect("localhost", "empr0577_corujas", "_!Bp.as]=2)3", "empr0577_corujas") or die('Erro ao conectar ao banco de dados requisitado');
$id_curriculo = $_POST['id'];
$id_usuario = $_POST['id_usuario'];
$sql = "SELECT * FROM vagas WHERE fk_usuarios LIKE '%$id_curriculo %' ";
$result = mysqli_query($conn,$sql) or die("Erro ao consultar");

while ($dado = $result->fetch_array()) {
    if(empty($dado['fk_usuarios'])){
        echo "vazio não precisa de excluir";
    }else{
        $list_curriculos = $dado['fk_usuarios'];
        $list_id_vagas = $dado['id_vaga'];

        $array_id_vagas = explode(" ",$list_id_vagas);
        $array_curriculos = explode(" ",$list_curriculos);
        foreach ($array_curriculos as $value)
            if($value == $id_curriculo){
                $value = '';
                echo 'id = item <br>';
                echo "value: ". $value;
                $sql = "UPDATE vagas SET fk_usuarios = '$array_curriculos' WHERE fk_usuario= '$id_usuario'"; 
                mysqli_query($conn,$sql) or die("Erro ao tentar atualizar registro");

            }

    }
}
mysqli_close($conn);
?>




