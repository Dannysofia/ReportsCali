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

<body>
  <?php
      include_once '../webService/helpers.php';
  ?>

<div class="col-lg-12 w-50 h-50">
    <section>
        <div class="container">
            <div class="justify-content-center">
                <h1 style="font-family:Georgia, serif; color:#2980b9; text-align: center; font-weight: bold;">Crear Reporte</h1>
                <form class="row g-3">
                    <div class="col-4 justify-content-center">
                        <label for="inputNanme4" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-4">
                        <label for="inputNanme4" class="form-label">Tamaño</label>
                        <input type="text" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-4">
                        <label for="inputNanme4" class="form-label">Unidad</label>
                        <select id="inputState" class="form-select">
                            <?php 
                            if($response){
                                echo "<option selected>Seleccione</option>";
                                foreach ($response as $row) {
                                    echo "<option>".$row -> Uni_nombre."</option>";
                                }
                            }else{
                                echo "No existen registros";
                            }
                            ?>
                        </select>
                    </div>
                    <label for="inputAddress" class="form-label">Ubicación (Coordenadas)</label>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Latitud</label>
                        <input type="text" class="form-control" id="inputAddress">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Longitud</label>
                        <input type="text" class="form-control" id="inputAddress">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Barrio</label>
                        <input type="text" class="form-control" id="inputAddress">
                    </div>
                    <div class="col-4">
                        <label for="inputNanme4" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-4">
                        <img src="../../assets/img/imagen.png" width="70" height="70" alt="" style="margin-left: 75px;">
                        <input type="file" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-4">
                        <img src="../../assets/img/video.png" width="70" height="70" alt="" style="margin-left: 75px;">
                        <input type="file" class="form-control" id="inputNanme4">
                    </div>
                        <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary col-4">Guardar</button>
                </form><!-- Vertical Form -->
             </div>

        </div>
    </section>
</div>

<!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


  