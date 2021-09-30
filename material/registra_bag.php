<?php
include('../connect/conexao.php');
session_start();
$codigo = $_POST['Codigo'];
$data = $_POST['Data'];
$moinho = $_POST['Moinho'];
$peso = $_POST['Peso'];
$usuario = $_SESSION['usuario'];


echo("$codigo,$data,$moinho,$usuario");

echo("<br>");

$query_registro_bag = "insert into bags_refugos(Material,Data,Moinho,Baixa,Peso,usuario) values ('".$codigo."','".$data."','".$moinho."','N','".$peso."','".$usuario."');";

$registrando = mysqli_query($conexao, $query_registro_bag);

header('Location:../painel.php');
exit();