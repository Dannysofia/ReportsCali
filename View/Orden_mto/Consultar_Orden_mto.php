<?php
    if(isset($_SESSION['ordenc'])){
?>

<div class="position-absolute top-0 end-0 p-3" style="z-index: 5;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        <?php echo $_SESSION['ordenc'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
    }
    unset($_SESSION['ordenc']);
?>

<?php
    if(isset($_SESSION['ordene'])){
?>

<div class="position-absolute top-0 end-0 p-3" style="z-index: 5;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        <?php echo $_SESSION['ordene'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php
    }
    unset($_SESSION['ordene']);
?>

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
             <section class="section">
                <div class="col-lg-12 col-md-12 flex-column">
                  <div class="col-12">
                        <a href='../webService/index.php' style="float:right;"><i class="bi bi-house" style="font-size: 24px;"></i></a>
                  </div>
                  <div class="d-flex col-lg-12 py-4 col-md-12 justify-content-center">
                    <h1 style="font-family:Georgia, serif; color:#2980b9; text-align: center; font-weight: bold;">Ordenes de mantenimiento</h1>                     
                  </div>
        
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex col-lg-12  col-md-12 py-3">
                      <a class="nav-link " href="<?php echo getUrl("Reportes","Reportes","index",false,"ajax");?>">
                       <button type="button" class="btn btn-success">
                       + Crear Orden
                      </button></a>
                      </div>
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Fecha creación</th>
                            <th scope="col">Fecha terminación</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Supervisor</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Prioridad</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php

                        if($response){
                          foreach ($response as $row) {
                            echo '<tr>';
                            echo '<td>MTO-'.$row->Id_ordenes_mantenimiento.'</td>';
                            echo '<td>'.$row->Fecha_creacion.'</td>';
                            echo '<td>'.$row->Fecha_terminacion.'</td>';
                            echo '<td>'.$row->Descripcion.'</td>';
                            echo '<td>'.$row->Supervisor.'</td>';
                            echo '<td>'.$row->Est_nombre.'</td>';
                            echo '<td style="color: Red;">'.$row->Pri_nombre.'</td>';
                            echo '<td>';
                            if($row -> Id_estado==3){
                              echo '<a class="nav-link" href="'.getUrl("Orden_mto","Orden_mto","getConsultar",array("Id_ordenes"=>$row->Id_ordenes_mantenimiento),"ajax").'">
                              <button type="button" class="btn" style="border: none;">
                              <img src="../assets/img/lista.png" alt="Reportes" width="45" height="45">
                              </button></a>';
                            }else{
                              echo '<a class="nav-link" href="'.getUrl("Orden_mto","Orden_mto","getEditar",array("Id_ordenes"=>$row->Id_ordenes_mantenimiento),"ajax").'">
                              <button type="button" class="btn" style="border: none;">
                              <img src="../assets/img/editar.png" alt="Reportes" width="45" height="45">
                              </button></a>';
                            }
                            
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