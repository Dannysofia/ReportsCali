<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Crear reporte</title>
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
        <div class="container border p-3 mx-auto" style="background-color: #ffffff; max-width: 1000px; margin:30px; border-radius: 10px; ">
                <h1 style="font-family:Georgia, serif; color:#2980b9; text-align: center; font-weight: bold;">Crear Reporte</h1>
                <form class="row g-3 mx-auto" action="<?php echo getUrl("Reportes","Reportes","postCrear",false,"ajax")?>" method="POST" enctype="multipart/form-data">
                    <div class="col-6">
                        <label for="dano" class="form-label">Tipo de daño</label>
                        <select id="dano" class="form-select" name="dano" >
                            <?php 
                            if($responseTip){
                                echo "<option selected>Seleccione</option>";
                                foreach ($responseTip as $row) {
                                    echo "<option>".$row -> Tip_nombre."</option>";
                                }
                            }else{
                                echo "No existen registros";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-6 justify-content-center">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>
                    <div class="col-6">
                        <label for="tamaño" class="form-label">Tamaño</label>
                        <input type="number" class="form-control"  name="tamaño"cid="tamaño">
                    </div>
                    <div class="col-6">
                        <label for="unidad" class="form-label">Unidad</label>
                        <select name="unidad" id="unidad" class="form-select">
                            <?php 
                            if($responseUni){
                                echo "<option selected>Seleccione</option>";
                                foreach ($responseUni as $row) {
                                    echo "<option>".$row -> Uni_nombre."</option>";
                                }
                            }else{
                                echo "No existen registros";
                            }
                            ?>
                        </select>
                    </div>
                    <label for="ubicacion" class="form-label">Ubicación (Coordenadas)</label>
                    <div class="col-4">
                        <label for="latitud" class="form-label">Latitud</label>
                        <input type="text" class="form-control" name="latitud" id="latitud">
                    </div>
                    <div class="col-4">
                        <label for="longitud" class="form-label">Longitud</label>
                        <input type="text" class="form-control" name="longitud" id="longitud">
                    </div>
                    <div class="col-4">
                        <label for="Barrio" class="form-label">Barrio</label>
                        <select name="barrio" id="barrio" class="form-select">
                            <?php 
                            if($responseBar){
                                echo "<option selected>Seleccione</option>";
                                foreach ($responseBar as $row) {
                                    echo "<option>".$row -> Bar_nombre."</option>";
                                }
                            }else{
                                echo "No existen registros";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                    </div>
                    <div class="col-6">
                        <img src="../assets/img/imagen.png" width="70" height="70" alt="" style="margin-left: 200px; margin-bottom: 15px">
                        <input type="file" class="form-control" name="imagen" id="imagen">
                    </div>
                    <div class="col-6">
                        <img src="../assets/img/video.png" width="70" height="70" alt="" style="margin-left: 200px;margin-bottom: 15px">
                        <input type="file" class="form-control" name="video" id="video">
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


  