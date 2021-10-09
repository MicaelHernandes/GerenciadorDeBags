<?php

include('../connect/conexao.php');
$cod = $_POST['cod'];
$material = $_POST['Codigo'];
$data = $_POST['Data'];
$moinho = $_POST['Moinho'];
$peso = $_POST['Peso'];

$query = "update bags_refugos set Material = '$material' , Data = '$data', Moinho = '$moinho',Peso = '$peso' where cod= '$cod';";

$query_result = mysqli_query($conexao, $query);

header('Location: ../painel.php');
exit();
