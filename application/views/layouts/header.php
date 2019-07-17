<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tasks Codeigniter</title>

  <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('./assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('./assets/css/simple-sidebar.css') ?>">
</head>

<body>
<?php if(isset($_SESSION['account'])){ ?>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">App Tareas</div>
      <div class="list-group list-group-flush">
        <a href="<?php echo base_url('Dashboard'); ?>" class="list-group-item list-group-item-action bg-light">Tablero</a>
        <a href="<?php echo base_url('Tasks'); ?>" class="list-group-item list-group-item-action bg-light">Tareas</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
<!--             <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mi perfil
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" id="perfil"></a>
                <a class="dropdown-item" href="#"><?php echo isset($_SESSION['account']) ? $_SESSION['account'] : '';?></a>
                <a class="dropdown-item" href="#">Mis datos</a>
                <div class="dropdown-divider"></div>
                <?php if(isset($_SESSION['account'])){ ?>
                  <a class="dropdown-item" href="<?php echo base_url('Auth/logout'); ?>" id="cerrar">Cerrar sesión</a>
                <?php }else{ ?>
                  <a class="dropdown-item" href="<?php echo base_url('Auth/login'); ?>" id="cerrar">Iniciar sesión</a>
                <?php } ?>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <?php } ?>
    <div class="container"><br>