<?php
include('../connect/conexao.php');
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <title>Bem vindo, <?php echo ($_SESSION['usuario']) ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GERENCIADOR DE BAGS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../painel.php">Principal</a>
          </li>
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
        <form class="d-flex" method="get" action="../material/seacher.php">
          <input class="form-control me-2" type="number" placeholder="Código" aria-label="Search" name="codigo" required min="100" max="999">
          <button class="btn btn-primary" type="submit">Procurar</button>
        </form>
      </div>
    </div>
  </nav>
  <?php
  $material = $_GET['codigo'];
  $result_bags = "select * from bags_refugos where Material = '" . $material . "';";
  $resultado_bags = mysqli_query($conexao, $result_bags);
  $numero_linhas = mysqli_num_rows($resultado_bags);

  if ($numero_linhas == 0) {
    echo ("<div class='m-5 p-5'><div class='alert alert-primary d-flex align-items-center' role='alert'>
    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
      <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
    </svg>
    <div>
     Nenhum bag encontrado de ".$_GET['codigo']."
    </div>
  </div></div>");
  } else {
    echo ("<div class='border m-5 p-5'>
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
        <td><form action='../material/baixa_bag.php' method='post'>
        <button class='btn btn-danger' type='submit' value='" . $row_usuario['cod'] . "' name='cod'>Deletar</button>
        </form></td>
        
      </tr>
      </tbody>
      </table>
      
      </div>
      ");
    }
  }

  ?>



</body>

</html>