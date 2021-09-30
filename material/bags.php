<?php
session_start();
include('../connect/verifica.php');
include('../connect/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Bem vindo, <?php echo($_SESSION['usuario']) ?></title>
</head>
<body>
    <form action="registra_bag.php" method="post">
<div class="border m-5 p-5">
    <h1>Adicionar Bags</h1>
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Codigo Material:</label>
  <input type="number" class="form-control" id="formGroupExampleInput" placeholder="ex: 679" min="100" max="999" name="Codigo" required>
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Data</label>
  <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" required name="Data">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Moinho</label>
  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="ex: 01" min="0" max="32" required name="Moinho">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Peso:</label>
  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="ex.:857" min="0" max="5000" default='0' name="Peso">
</div>
<button class="btn btn-success" type="submit">Adicionar</button>
<button type="reset" class="btn btn-warning">Resetar</button>
<button class="btn btn-light" onclick="window.location.href ='../painel.php'">Voltar</button>
</div>

</form>
</body>
</html>