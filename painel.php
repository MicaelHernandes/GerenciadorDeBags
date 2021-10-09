<?php
session_start();
include('./connect/verifica.php');
include('./connect/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <title>Bem vindo, <?php echo ($_SESSION['usuario']) ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <span class="navbar-brand">GERENCIADOR DE BAGS</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Bags
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./material/bags.php">Adicionar</a></li>
              <!-- <li>
                <hr class="dropdown-divider">
              </li> -->
            </ul>
          </li>
    
          <li class="nav-item">
            <a class="nav-link" href="./connect/logout.php">Sair</a>
          </li>
        </ul>
        <form class="d-flex" method="get" action="./material/seacher.php">
          <input class="form-control me-2" type="number" placeholder="Código" aria-label="Search" name="codigo" required min="100" max="999">
          <button class="btn btn-primary" type="submit">Procurar</button>
        </form>
      </div>
    </div>
  </nav>

  <?php 
  $result_bags = "select * from bags_refugos where Baixa = 'N';";
  $resultado_bags = mysqli_query($conexao, $result_bags);
  $numero_linhas = mysqli_num_rows($resultado_bags);


  if($numero_linhas == 0){
    echo("<div class='p-5 m-5'><div class='alert alert-success' role='alert'>
    <h4 class='alert-heading'>Nenhum Bag Registrado</h4>
    <p>Insira bags na aba Bags -> Adicionar!</p>
    <hr>
    <p class='mb-0'>By: Micael Hernandes</p>
  </div></div>");
  }else{
    echo("<div class='border m-5 p-5'>
    <table class='table'>
      <thead>
        <tr>
          <th scope='col'>Numero</th>
          <th scope='col'>Codigo</th>
          <th scope='col'>Data</th>
          <th scope='col'>Baixa</th>
          <th scope='col'>Moinho</th>
          <th scope='col'>Peso</th>
          <th scope='col'>Usuario</th>
          <th scope='col'>Atualizar</th>
          <th scope='col'>Dar Baixa</th>

        </tr>
      </thead>
      <tbody>");
      while ($row_usuario = mysqli_fetch_assoc($resultado_bags)) {
        echo ("<tr>
      <th scope='row'>" . $row_usuario['cod'] . "</th>
      <td>" . $row_usuario['Material'] . "</td>
      <td>" . $row_usuario['Data'] . "</td>
      <td>" . $row_usuario['Baixa'] . "</td>
      <td>" . $row_usuario['Moinho'] . "</td>
      <td>" . $row_usuario['Peso'] . "</td>
      <td>" . $row_usuario['usuario'] . "</td>
      <td><form action='./material/update_bag.php' method='post'>
      <button class='btn btn-primary' type='submit' value='" . $row_usuario['cod'] . "' name='cod'>Modificar</button>
      </form></td>


      <td><form action='./material/baixa_bag.php' method='post'>
      <button class='btn btn-danger' type='submit' value='" . $row_usuario['cod'] . "' name='cod'>Deletar</button>
      </form></td>
      
    </tr>");
      }
    echo(" </tbody>
    </table></div>");
  
    }
  
  ?>
  
      
     

  
</body>

</html>