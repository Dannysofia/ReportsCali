<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Editar Orden</title>
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
                <h1 style="font-family:Georgia, serif; color:#2980b9; text-align: center; font-weight: bold;">Editar Orden</h1>
                <form class="row g-3 mx-auto" action="<?php echo getUrl("Orden_mto","Orden_mto","postEditar",array("Id_ordenes"=>$id_orden),"ajax")?>" method="POST" enctype="multipart/form-data">
                    <div class="col-6 justify-content-center">
                        <div class="col-12 justify-content-center">
                                <label for="fechac" class="form-label">Fecha creación</label>
                                <input type="text" class="form-control" name="fechac" id="fechac" value="<?php echo $fechac; ?>" readonly> 
                        </div>  
                        <div class="col-12">
                            <label for="prioridad" class="form-label">Prioridad</label>
                            <select id="prioridad" class="form-select" name="prioridad" >
                                <?php 
                                if($responsePri){
                                    echo "<option selected>".$Prioridad."</option>";
                                    foreach ($responsePri as $row) {
                                        if($row -> Pri_nombre != $Prioridad){
                                            echo "<option>".$row -> Pri_nombre."</option>";
                                        }
                                    }
                                }else{
                                    echo "No existen registros";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="estado" class="form-label">Estado</label>
                            <select id="estado" class="form-select" name="estado" >
                                <?php 
                                if($responseEst){
                                    echo "<option selected>".$Estado."</option>";
                                    foreach ($responseEst as $row) {
                                        if($row -> Est_nombre != $Estado){
                                            echo "<option>".$row -> Est_nombre."</option>";
                                        }
                                    }
                                }else{
                                    echo "No existen registros";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="secre" class="form-label">Autorizado por:</label>
                            <input type="text" class="form-control" name="secre" id="secre" value="<?php echo $Usuario?>" readonly>

                        </div>
                        <div class="col-12 justify-content-center">
                            <label for="supervisor" class="form-label">Supervisor</label>
                            <input type="text" class="form-control" name="supervisor" id="supervisor" value="<?php echo $Supervisor?>" required>
                        </div>
                    </div>
                    <div class="col-6 justify-content-center">
                        <label for="descripcion" class="form-label">Descripción mantenimiento</label> 
                        <div class="col-12 justify-content-center">
                                <textarea id="descripcion" name="descripcion" rows="13" cols="50" style="resize: none; border-round; border-radius: 8px;" required><?php echo $Descripcion?></textarea>
                        </div> 
                    </div>

                    <div class="col-6" id="campoImagen" style="display: none;">
                        <img src="../assets/img/imagen.png" width="70" height="70" alt="" style="margin-left: 200px; margin-bottom: 15px">
                        <input type="file" class="form-control" name="imagen" id="imagen">
                    </div>
                
                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-4 text-center">
                            <a href=<?php echo getUrl("Orden_mto","Orden_mto","index",false,"ajax")?>><button type="button" class="btn btn-secondary col-4">Cancelar</button></a>
                        </div>
                        <div class="col-4 text-center">
                            <button type="submit" class="btn btn-primary col-4">Guardar</button>
                        </div>
                        <div class="col-4 text-center">
                            <a href=<?php echo getUrl("Orden_mto","Orden_mto","Verreporte",array("Id_ordenes"=>$id_orden),"ajax")?>><button type="button" class="btn btn-success col-4">Ver reporte</button></a>
                        </div>
                    </div>
                </form><!-- Vertical Form -->
        </div>
    </section>
</div>

<!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    document.getElementById('estado').addEventListener('change', function() {
        var campoImagen = document.getElementById('campoImagen');
        var estadoSeleccionado = document.getElementById('estado').value;

        if (estadoSeleccionado === 'Completado') {
            campoImagen.style.display = 'block';
        } else {
            campoImagen.style.display = 'none';
        }
    });
</script>

</body>

</html>


  