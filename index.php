<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arena360</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php 
        include_once("Model/Database.php"); 
    ?>
    
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Arena360</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="./">Início</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Clientes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cliente/cadastrar">Cadastrar</a></li>
            <li><a class="dropdown-item" href="?page=cliente/listar">Listar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Equipamentos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=equipamento/cadastrar">Cadastrar</a></li>
            <li><a class="dropdown-item" href="?page=equipamento/listar">Listar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Reservas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=reserva/cadastrar">Cadastrar</a></li>
            <li><a class="dropdown-item" href="?page=reserva/listar">Listar</a></li>
          </ul>
        </li>

      </ul>

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>

    </div>
  </div>
</nav>

    <div class="container mt-5">
        <?php
            $page = @$_REQUEST["page"];

            switch ($page) {
                case 'cliente/cadastrar':
                case 'cliente/listar':
                case 'cliente/editar':
                    include("View/{$page}.php");
                    break;
                case 'cliente/processar':
                    include("Controller/ClienteController.php");
                    handleClienteRequest($conn); 
                    break;

                case 'equipamento/cadastrar':
                case 'equipamento/listar':
                case 'equipamento/editar':
                    include("View/{$page}.php"); 
                    break;
                case 'equipamento/processar':
                    include("Controller/EquipamentoController.php");
                    handleEquipamentoRequest($conn); 
                    break;

                case 'reserva/cadastrar':
                case 'reserva/listar':
                case 'reserva/editar':
                    include("View/{$page}.php"); 
                    break;
                case 'reserva/processar':
                    include("Controller/ReservaController.php");
                    handleReservaRequest($conn); 
                    break;
                    
                default:
                    print "<h1>Arena360</h1>";
                     print '<img src="assets/Img/arena360-logo.png">';
                    break;
            }
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>