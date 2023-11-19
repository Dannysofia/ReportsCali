<?php
    include_once '../webService/helpers.php';
    include '../Model/Login/Login_model.php';
    if(isset($_SESSION['usuario']) === false){
      redirect('login.php');
    }

    $id = $_SESSION['usuario'];
    $Iniciar = new Login_model();
    $sql = "SELECT * FROM usuarios WHERE Id_usuario = $id";
    $response = $Iniciar->consultar($sql);
    $usuario = null;
    $rol = null;

    foreach ($response as $row) {
        $usuario = $row;
    }

    $sql = "SELECT * FROM roles WHERE Id_rol = $usuario->Id_rol";
    $response = $Iniciar->consultar($sql);

    foreach ($response as $row) {
        $rol = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ReportsCali</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/pin.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
 <?php
      include_once '../webService/helpers.php';
  ?>
  <!-- Incluye la barra de navegación -->
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between" style="margin-right: 900px;">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../assets/img/pin.png" alt="">
        <span class="d-none d-lg-block" style="font-family:Georgia, serif">ReportsCali</span>
      </a>
    </div><!-- End Logo -->



    <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
      <i class="bi bi-bell"></i>
      <span class="badge bg-primary badge-number">1</span>
    </a> -->
    <!-- End Notification Icon -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
                <?php echo $usuario->Usu_nombre . ' ' . $usuario->Apellido ;?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $usuario->Usu_nombre . ' ' . $usuario->Apellido ;?> </h6>
              <span><?php echo $rol->Rol_nombre?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="MiPerfil.php">
                <i class="bi bi-person"></i>
                <span>Mi perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo getUrl("Login","Login","Cerrarsesion",false,"ajax")?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesión</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="<?php echo getUrl("Reportes","Reportes","index", false, "ajax");?>">
          <i><img src="../assets/img/revision.png" alt="Reportes" width="25" height="25"></i>
          <span>Reportes</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="<?php echo getUrl("Orden_mto","Orden_mto","index", false, "ajax");?>">
          <i><img src="../assets/img/mant.png" alt="Ordenes" width="25" height="25"></i>
          <span>Ordenes de Mantenimiento</span>
        </a>
      </li>
  </aside> <!--End Sidebar-->

  <!-- Contenido de la página de inicio -->
  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">
        <?php  include_once 'Estadisticas.php';?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ReportsCali</span></strong>. Todos los derechos reservados
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

</body>

</html>