<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login ReportsCali</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/pin.png" rel="icon">

  
  <!-- Vendor CSS Files -->
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(to top, #30A6FC, #B1DEFF, #ffffff)">
  <?php
      include_once '../webService/helpers.php';
  ?>

  <main>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
              <section>

                <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-lg-3 col-md-3 d-flex flex-column align-items-center justify-content-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d125073.31778963153!2d-76.52126349885016!3d3.41957925943635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1697425794263!5m2!1ses-419!2sco" width="800" height="725" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
                      </div>
                    </div>
                </div>

              </section>
            </div>
            <div class="col-2"></div>
            <div class="col-lg-6">
              <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-5">
                <div class="container">
                  <div class="row justify-content-end">
                    <div class="col-lg-10 col-md-12 d-flex flex-column align-items-center justify-content-center">

                      <div class="d-flex col-8 py-3">
                          <img src="../assets/img/pin.png" width="50" height="50" alt="">
                          <h1 style="font-family:Georgia, serif">ReportsCali</h1>
                      </div><!-- End Logo -->

                      <div class="card mb-3">

                        <div class="card-body">

                          <div class="pt-2 pb-2">
                            <h5 class="card-title text-center pb-0 fs-3" style="font-family:Georgia, serif">Inicio de sesión</h5>                
                          </div>

                          <form class="row g-3" action="<?php echo getUrl("Login","Login","Iniciarsesion",false,"ajax")?>" method="POST" id="form-login">

                            <div class="col-12 form-group">
                              <label for="yourUsername" class="form-label" style="font-family:Georgia, serif">Correo electrónico</label>
                              <div class="input-group has-validation">
                                <input type="text" name="correo" class="form-control form-control-user" id="correo" required>
                                <div class="invalid-feedback">Por favor ingrese su correo electrónico.</div>
                              </div>
                            </div>

                            <div class="col-12 form-group">
                              <label for="yourPassword" class="form-label" style="font-family:Georgia, serif">Contraseña</label>
                              <input type="password" name="contrasena" class="form-control form-control-user" id="contrasena" required>
                              <div class="invalid-feedback">Por favor ingrese su contraseña</div>
                            </div>

                            <div class="col-12 form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                <label class="form-check-label" for="rememberMe" style="font-family:Georgia, serif">Recordar usuario</label>
                              </div>
                            </div>
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary w-100" id="Iniciarsesión" style="font-family:Georgia, serif">Ingresar</button>
                            </div>
                            <div class="col-12" style="text-align: right;font-family:Georgia, serif">
                              <p class="small mb-0">¿No tienes cuenta? <a href="Registro.php">Registrate</a></p>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </section>
            </div>
         </div>
     </div>
  </main><!-- End #main -->

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>