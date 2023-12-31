<?php
    include_once '../webService/helpers.php';
    if(isset($_SESSION['usuario']) === true){
      redirect('index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registrar usuario</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

</head>

<body style="background: linear-gradient(to top, #2980b9, #6dd5fa, #ffffff)">
  <?php
      include_once 'helpers.php';
  ?>
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex col-8 py-4">
                  <img src="../assets/img/pin.png" width="50" height="50" alt="">
                  <h1 style="font-family:Georgia, serif">ReportsCali</h1>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-2 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style="font-family:Georgia, serif">Registro</h5>
                  </div>

                  <form class="row g-2 needs-validation" action="<?php echo getUrl("Usuarios","Registro","Registrarusuario",false,"ajax")?>" method="POST" style="font-family:Georgia, serif">
                    <div class="col-12 form-group">
                      <label class="col-sm-2 col-form-label">Rol</label>
                      <div class="col-12">
                        <select class="form-select" aria-label="Default select example" id="rol" name="rol">
                          <option selected>Seleccionar</option>
                          <option value="1">Secretario</option>
                          <option value="2">Ciudadano</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12 form-group">
                      <label for="yourName" class="form-label">Nombre</label>
                      <input type="text" name="nombre" class="form-control" id="nombre" required>
                      <div class="invalid-feedback">Por favor, ingrese su nombre!</div>
                    </div>

                    <div class="col-12 form-group">
                      <label for="yourName" class="form-label">Apellidos</label>
                      <input type="text" name="apellido" class="form-control" id="apellido" required>
                      <div class="invalid-feedback">Por favor, ingrese su apellido!</div>
                    </div>

                    <div class="col-12 form-group">
                      <label for="yourEmail" class="form-label">Correo electrónico</label>
                      <input type="email" name="correo" class="form-control" id="correo" required>
                      <div class="invalid-feedback">Por favor ingrese un correo valido!</div>
                    </div>

                    <div class="col-12 form-group">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="contrasena" class="form-control" id="contrasena" required>
                      <div class="invalid-feedback">Por favor ingrese su contraseña!</div>
                    </div>

                    <div class="col-12 form-group">
                      <label for="codigo" class="form-label">Código de identificación</label>
                      <div class="input-group has-validation">
                        <input type="text" name="codigo" class="form-control" id="codigo">
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Registrarse</button>
                    </div>
                    <div class="col-12" style="text-align: right;">
                      <p class="small mb-0">Ya tienes una cuenta? <a href="login.php">Ingresar</a></p>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>