<?php
$conn = mysqli_connect("localhost", "empr0577_corujas", "_!Bp.as]=2)3", "empr0577_corujas") or die('Erro ao conectar ao banco de dados requisitado');
$id = $_POST['id'];
$sql = "DELETE FROM curriculos WHERE id_curriculo= $id"; 
mysqli_query($conn,$sql) or die("Erro ao tentar excluir registro");
echo "Currículo excluído";
header("Location: meuCurriculo.php");
mysqli_close($conn);
?>



