<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reportes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/pin.png" rel="icon">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
  <?php
      include_once '../webService/helpers.php';
  ?>

  <main>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
              <section>
                  <div class=" d-flex flex-column align-items-center justify-content-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d125073.31778963153!2d-76.52126349885016!3d3.41957925943635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1697425794263!5m2!1ses-419!2sco" width="700" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
                  </div>
              </section>
            </div>
            <div class="col-lg-3"></div>

            <div class="col-lg-7">
             <section class="section">
                <div class="col-lg-12 col-md-12 flex-column">
                  <div class="col-12">
                        <a href='../webService/index.php' style="float:right;"><i class="bi bi-house" style="font-size: 24px;"></i></a>
                  </div>
                  <div class="d-flex col-lg-12 py-4 col-md-12 justify-content-center">
                    <h1 style="font-family:Georgia, serif; color:#2980b9; text-align: center; font-weight: bold;">Reportes</h1>                     
                  </div>
        
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex col-lg-12  col-md-12 py-3">
                      <a class="nav-link " href="<?php echo getUrl("Reportes","Reportes","getCrear",false,"ajax");?>">
                       <button type="button" class="btn btn-success">
                       + Crear reporte
                      </button></a>
                      </div>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php

                        if($response){
                          foreach ($response as $row) {
                            echo '<tr>';
                            echo '<td>'.$row->fecha_reporte.'</td>';
                            echo '<td>'.$row->Direccion.'</td>';
                            echo '<td>'.$row->Descripcion.'</td>';
                            echo '<td>'.$row->Est_nombre.'</td>';
                            echo '<td>';
                            echo '<a class="nav-link" href="'.getUrl("Reportes","Reportes","getConsultar",array("Id_reportes"=>$row->Id_reportes),"ajax").'">
                            <button type="button" class="btn" style="border: none;">
                            <img src="../assets/img/documento.png" alt="Reportes" width="45" height="45">
                            </button></a>';
                            echo '</td>';
                            echo '</tr>';
                          }
                        }else{
                          echo "No existen registros";
                        }
                        ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
        
                </div>
              </div>
          </section>
        </div>
            
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

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>