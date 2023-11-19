<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Crear Orden</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/pin.png" rel="icon">

  
  <!-- Vendor CSS Files -->
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body style="background: linear-gradient(to top, #30A6FC, #B1DEFF, #ffffff)">
  <?php
      include_once '../webService/helpers.php';
  ?>

<div class="col-lg-12 d-flex justify-content-center align-items-center">
    <section>
        <div class="container border p-3 mx-auto" style="background-color: #ffffff; max-width: 1000px; margin:112px; border-radius: 10px; ">
                <h1 style="font-family:Georgia, serif; color:#2980b9; text-align: center; font-weight: bold;">Crear Orden</h1>
                <form class="row g-3 mx-auto" action="<?php echo getUrl("Orden_mto","Orden_mto","postCrear",false,"ajax")?>" method="POST" enctype="multipart/form-data">
                <div class="col-6 justify-content-center">
                    <div class="col-12 justify-content-center">
                            <label for="fechac" class="form-label">Fecha creación</label>
                            <input type="text" class="form-control" name="fechac" id="fechac" value="<?php echo "20".date('y')."-".date('m')."-".date('d')?>" readonly> 
                    </div>  
                    <div class="col-12">
                        <label for="prioridad" class="form-label">Prioridad</label>
                        <select id="prioridad" class="form-select" name="prioridad" >
                            <?php 
                            if($responsePri){
                                echo "<option selected>Seleccione</option>";
                                foreach ($responsePri as $row) {
                                    echo "<option>".$row -> Pri_nombre."</option>";
                                }
                            }else{
                                echo "No existen registros";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $estado?>" readonly>

                    </div>
                    <div class="col-12">
                        <label for="secre" class="form-label">Autorizado por:</label>
                        <input type="text" class="form-control" name="secre" id="secre" value="<?php echo $usuario?>" readonly>

                    </div>
                    <div class="col-12 justify-content-center">
                        <label for="supervisor" class="form-label">Supervisor</label>
                        <input type="text" class="form-control" name="supervisor" id="supervisor">
                    </div>
                </div>
                <div class="col-6 justify-content-center">
                    <label for="descripcion" class="form-label">Descripción mantenimiento</label> 
                    <div class="col-12 justify-content-center">
                            <textarea id="descripcion" name="descripcion" rows="13" cols="50" style="resize: none; border-round; border-radius: 8px;"></textarea>
                    </div> 
                </div>
                
                    
                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-4 text-center">
                            <a href=<?php echo getUrl("Reportes","Reportes","index",false,"ajax")?>><button type="button" class="btn btn-secondary col-4">Cancelar</button></a>
                        </div>
                        <div class="col-4 text-center">
                            <button type="submit" class="btn btn-primary col-4">Guardar</button>
                        </div>
                    </div>
                </form><!-- Vertical Form -->
        </div>
    </section>
</div>

<!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


  