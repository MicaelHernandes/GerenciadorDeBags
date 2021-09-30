<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Criador de etiquetas Online</title>
</head>

<body>
<div class="border m-5 p-5 center">
    <h1>Bem vindo ao Gerenciador de Produção By:Micael Hernandes</h1>
    <?php 
    if(isset($_SESSION['nao-autenticado'])):
    ?>
    <div class="alert alert-danger" role="alert">
    Usuario ou senha invalidos!
</div>
    <?php
    unset($_SESSION['nao-autenticado']); 
    endif;?>
<form action="./connect/login.php" method="post">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Usuario:</label>
  <input type="text" class="form-control" id="usuario" name="usuario" required>
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Senha:</label>
  <input type="password" class="form-control" id="senha" name="senha">
</div>
<button type="submit" class="btn btn-danger">Entrar</button>
</form>
</div>

</body>

</html>