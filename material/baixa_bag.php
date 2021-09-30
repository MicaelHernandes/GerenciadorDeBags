<?php
include('../connect/conexao.php');

$codigo_bag = $_POST['cod'];

$query_apaga = "delete from bags_refugos where cod = '".$codigo_bag."';";

$query = mysqli_query($conexao,$query_apaga);

header('Location: ../painel.php');