<?php
    include_once '../webService/helpers.php';
    if(isset($_SESSION['contraseñab'])){
?>

<div class="position-absolute top-0 end-0 p-3" style="z-index: 5;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        <?php echo $_SESSION['contraseñab'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
    }
    unset($_SESSION['contraseñab']);
?>

<?php
    if(isset($_SESSION['contraseñam'])){
?>

<div class="position-absolute top-0 end-0 p-3" style="z-index: 5;">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        <?php echo $_SESSION['contraseñam'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
    }
    unset($_SESSION['contraseñam']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mi perfil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/pin.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

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

<body style="background: linear-gradient(to top, #30A6FC, #B1DEFF, #ffffff)">

  <main>

    <section class="section profile" style="margin: 200px;">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="row justify-content-center">

          <div class="col-lg-6 col-md-6 col-sm-12">

              <div class="card">
                  <div class="card-body pt-3">
                          <form class="row g-2 needs-validation" action="<?php echo getUrl("Miperfil","Miperfil","Actualizarcontraseña",false,"ajax")?>" method="POST" style="font-family:Georgia, serif">
                          <h1 style="font-family:Georgia, serif; color:#2980b9; text-align: center; font-weight: bold;">Cambiar contraseña</h1>                     

                          <div class="col-12 form-group">
                            <label for="yourEmail" class="form-label">Contraseña actual</label>
                            <input type="password" name="contrasena_actual" class="form-control" id="contrasena_actual" required>
                            <div class="invalid-feedback">Por favor ingrese su contraseña!</div>
                          </div>

                          <div class="col-12 form-group">
                            <label for="yourPassword" class="form-label">Nueva Contraseña</label>
                            <input type="password" name="contrasena" class="form-control" id="contrasena" required>
                            <div class="invalid-feedback">Por favor ingrese su nueva contraseña!</div>
                          </div>

                          <div class="col-12 d-flex justify-content-center">
                            <div class="col-6 text-center">
                                <a href="../webService/index.php"><button type="button" class="btn btn-secondary col-5">Cancelar</button></a>
                            </div>
                            <div class="col-6 text-center">
                                <button type="submit" class="btn btn-primary col-6">Guardar</button>
                            </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      

    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <script>
    function showAlert() {
        document.getElementById('myAlert').style.display = 'block';
    }

    function closeAlert() {
        document.getElementById('myAlert').style.display = 'none';
    }
</script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>