<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reportes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/pin.png" rel="icon">

  
  <!-- Vendor CSS Files -->
  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">
        <div class="row">
            <div class="col-lg-3" style="margin-right: 95px;">
              <section>

                <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-lg-3 col-md-3 d-flex flex-column align-items-center justify-content-center">
                        <img src="../../assets/img/MAPA.png" width="500" height="600"/>
                      </div>
                    </div>
                </div>
              </section>
            </div>
            <div class="col-1"></div>

            <div class="col-lg-7">
             <section class="section">
                <div class="col-lg-12 col-md-8 flex-column justify-content-center">
                  <div class="d-flex col-lg-12 py-4 col-md-12 justify-content-center">
                    <h1 style="font-family:Georgia, serif; color:#2980b9; text-align: center; font-weight: bold;">Reportes</h1>                     
                  </div>
        
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex col-lg-12  col-md-12 py-3">
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#largeModal">
                      + Crear reporte
                      </button>
                        <?php  include_once 'Crear_reporte.php';?>
                      </div>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Calle 6 #56-43</td>
                            <td>9/09/2023</td>
                            <td>Reporte1</td>
                            <td>Activo</td>
                            <td><a href="View/Reportes/Ver reporte.html" class="d-flex align-items-center w-auto">
                              <img src="../../assets/img/documento.png" alt="Reportes" width="40" height="40">
                            </a></td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Calle 6 #56-43</td>
                            <td>9/09/2023</td>
                            <td>Reporte1</td>
                            <td>Activo</td>
                            <td><a href="View/Reportes/Ver reporte.html" class="d-flex align-items-center w-auto">
                              <img src="../../assets/img/documento.png" alt="Reportes" width="40" height="40">
                            </a></td>
                          </tr>

                        </tbody>
                      </table>
                      <!-- End Table with stripped rows -->
        
                    </div>
                  </div>
        
                </div>
              </div>
          </section>
        </div>
            
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>