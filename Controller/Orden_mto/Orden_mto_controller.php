<?php
include '../Model/Orden_mto/Orden_mto_model.php';

class Orden_mto_controller {

    function __construct() {
        
    }
    function index(){
        try{
            $conexion=new Orden_model();
            $sql="SELECT o.Id_ordenes_mantenimiento,o.Descripcion,o.Fecha_creacion,o.Fecha_terminacion,o.Id_estado,e.Est_nombre,o.Id_prioridad,p.Pri_nombre, o.Supervisor FROM ordenes_mantenimiento AS o,estados AS e, prioridades AS p WHERE o.Id_estado=e.Id_estado  AND o.Id_prioridad=p.Id_prioridades ORDER BY o.Id_prioridad ASC";
            $response = $conexion->consultar($sql);
            include_once '../View/Orden_mto/Consultar_Orden_mto.php';

        }catch (PDOException $e) {
            $response = array(
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            );
            //Devolver la respuesta en formato JSON en caso de error
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    function getCrear(){
        try{ 
            $conexion=new Orden_model();

            $sql="SELECT Est_nombre FROM estados Where id_estado=1";
            $responseEst = $conexion->consultar($sql);

            if($responseEst){
                foreach ($responseEst as $row) {
                    $estado=$row -> Est_nombre;
                }
            }else{
                echo "No existen registros";
            }

            $sql="SELECT Pri_nombre FROM prioridades";
            $responsePri = $conexion->consultar($sql);

            $id_usu=$_SESSION['usuario'];

            $sql="SELECT Usu_nombre, Apellido FROM usuarios WHERE Id_usuario=$id_usu";
            $responseUsu = $conexion->consultar($sql);

            if($responseUsu){
                foreach ($responseUsu as $row) {
                    $usuario=$row -> Usu_nombre." ".$row -> Apellido;

                }
            }else{
                echo "No existen registros";
            }


            include_once '../View/Orden_mto/Crear_Orden_mto.php';
        }catch (PDOException $e) {
            $response = array(
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            );
            //Devolver la respuesta en formato JSON en caso de error
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    function postCrear(){

        try{ 
            $conexion=new Orden_model();

            $descripcion=$_POST['descripcion'];
            $fecha=$_POST['fechac'];
            $prioridad=$_POST['prioridad'];
            $estado=$_POST['estado'];
            $supervisor=$_POST['supervisor'];

            if (!empty($_POST['fechac']) && !empty($_POST['prioridad']) && !empty($_POST['estado']) && !empty($_POST['secre']) && !empty($_POST['supervisor'])) {

                $sql="SELECT Id_prioridades FROM prioridades WHERE pri_nombre='$prioridad'";
                $responsePri = $conexion->consultar($sql);
                
                foreach ($responsePri as $row) {
                    $id_pri= $row -> Id_prioridades;
                }

                $id_est=1;
                $id_usu=$_SESSION['usuario'];
                $id_reporte=$_SESSION['reporte'];

                $sql= "INSERT INTO ordenes_mantenimiento (Descripcion, Fecha_creacion, Id_usuario, Id_prioridad, Id_estado, Supervisor) VALUES ('$descripcion','$fecha', $id_usu, $id_pri, $id_est, '$supervisor')";
                $response = $conexion->insertar($sql);

                $sql="SELECT Id_ordenes_mantenimiento FROM ordenes_mantenimiento ORDER BY Id_ordenes_mantenimiento DESC LIMIT 1";
                $responseid = $conexion->consultar($sql);

                foreach ($responseid as $row) {
                    $id_ord= $row -> Id_ordenes_mantenimiento;
                }

                $sql="UPDATE reportes SET id_orden_mantenimiento=$id_ord, id_estado=2 WHERE id_reportes=$id_reporte";
                $responsereporte = $conexion->actualizar($sql);

                if($response){
                    $_SESSION['ordenc']="La orden se creo de manera exitosa";
                    redirect('ajax.php?modulo=Orden_mto&controlador=Orden_mto&funcion=index');
                }

            }else{
                echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>".
                        "Diligencie todos los campos".
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                        "</button></div>";
            }

        }catch (PDOException $e) {
            $response = array(
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            );
            //Devolver la respuesta en formato JSON en caso de error
            header('Content-Type: application/json');
            echo json_encode($response);
        }

    }

    function getEditar(){

        try{ 
            $conexion=new Orden_model();

            $id_orden=$_GET['Id_ordenes'];

            $sql="SELECT o.Id_ordenes_mantenimiento,o.Descripcion,o.Fecha_creacion,o.Id_estado,e.Est_nombre,o.Id_prioridad,p.Pri_nombre, o.Id_usuario, u.Usu_nombre, u.Apellido, o.Supervisor FROM ordenes_mantenimiento AS o,estados AS e, prioridades AS p, usuarios AS u WHERE o.Id_ordenes_mantenimiento=$id_orden AND o.Id_estado=e.Id_estado  AND o.Id_prioridad=p.Id_prioridades AND o.Id_usuario=u.Id_usuario";
            $response = $conexion->consultar($sql);

            $sql="SELECT Est_nombre FROM estados";
            $responseEst = $conexion->consultar($sql);

            $sql="SELECT Pri_nombre FROM prioridades";
            $responsePri = $conexion->consultar($sql);


            if($response){
                foreach ($response as $row){
                    $fechac=$row->Fecha_creacion;
                    $Prioridad=$row->Pri_nombre;
                    $Estado=$row->Est_nombre;
                    $Supervisor=$row->Supervisor;
                    $Usuario=$row->Usu_nombre." ".$row->Apellido;
                    $Descripcion=$row->Descripcion;
                    $id_orden=$row->Id_ordenes_mantenimiento;
                    $id_estado=$row->Id_estado;
                }
            }

            include_once '../View/Orden_mto/Editar_Orden_mto.php';
        }catch (PDOException $e) {
            $response = array(
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            );
            //Devolver la respuesta en formato JSON en caso de error
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    function postEditar(){

        try{ 
            $conexion=new Orden_model();

            $id_orden=$_GET['Id_ordenes'];

            $descripcion=$_POST['descripcion'];
            $prioridad=$_POST['prioridad'];
            $estado=$_POST['estado'];
            $supervisor=$_POST['supervisor'];
            $imagen=$_FILES['imagen'];
            $id_reporte=$_SESSION['reporte'];


            if (!empty($_POST['prioridad']) && !empty($_POST['estado']) && !empty($_POST['secre']) && !empty($_POST['supervisor'])) {


                $sql="SELECT Id_prioridades FROM prioridades WHERE pri_nombre='$prioridad'";
                $responsePri = $conexion->consultar($sql);
                
                foreach ($responsePri as $row) {
                     $id_pri= $row -> Id_prioridades;
                }

                $sql="SELECT Id_estado FROM Estados WHERE Est_nombre='$estado'";
                $responseEst = $conexion->consultar($sql);
                
                foreach ($responseEst as $row) {
                     $id_est= $row -> Id_estado;
                }

                if($id_est==3){
                    //Guardar imagenes cargadas en la carpeta img de assets
                    $carpeta_destino = "../assets/img/";
                    $nombre_imagen = $_FILES['imagen']['name'];
                    $imagen=$nombre_imagen;
                    $ruta_imagen_temporal = $_FILES['imagen']['tmp_name'];
                    $ruta_imagen_destino = $carpeta_destino . $nombre_imagen;
                    move_uploaded_file($ruta_imagen_temporal, $ruta_imagen_destino);

                    $sql = "INSERT INTO imagenes (Nombre_img) VALUES ('$imagen')";
                    $responseImg = $conexion->insertar($sql);
    
                    $sql="SELECT Id_imagenes FROM imagenes WHERE Nombre_img='$imagen'";
                    $responseImg2 = $conexion->consultar($sql);
    
                    foreach ($responseImg2 as $row) {
                        $id_img= $row -> Id_imagenes;
                    }

                    $fechat="20".date('y')."-".date('m')."-".date('d');

                    $sql= "UPDATE ordenes_mantenimiento SET Descripcion='$descripcion', Id_prioridad=$id_pri, Id_estado=$id_est, Supervisor='$supervisor', Id_imagen=$id_img, Fecha_terminacion='$fechat' WHERE id_ordenes_mantenimiento=$id_orden";
                    $response = $conexion->actualizar($sql);

                    $sql="UPDATE reportes SET Id_orden_mantenimiento=$id_orden,Id_estado=3 WHERE Id_reportes=$id_reporte";
                    $responsereporte = $conexion->actualizar($sql);
                }else{

                    $sql= "UPDATE ordenes_mantenimiento SET Descripcion='$descripcion', Id_prioridad=$id_pri, Id_estado=$id_est, Supervisor='$supervisor' WHERE id_ordenes_mantenimiento=$id_orden";
                    $response = $conexion->actualizar($sql);

                }

                if($response){
                    $_SESSION['ordene']="La orden se actualizo de manera exitosa";
                    redirect('ajax.php?modulo=Orden_mto&controlador=Orden_mto&funcion=index');
                }
            }else{
                echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>".
                        "Diligencie todos los campos".
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                        "</button></div>";
            }

        }catch (PDOException $e) {
            $response = array(
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            );
            //Devolver la respuesta en formato JSON en caso de error
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

        function getConsultar(){

            try{ 
                $conexion=new Orden_model();

                $id_orden=$_GET['Id_ordenes'];

                $sql="SELECT o.Id_ordenes_mantenimiento,o.Descripcion,o.Fecha_creacion,o.Id_estado,e.Est_nombre,o.Id_prioridad,p.Pri_nombre, o.Id_usuario, u.Usu_nombre, u.Apellido, o.Supervisor, o.Id_imagen, i.Nombre_img FROM ordenes_mantenimiento AS o,estados AS e, prioridades AS p, usuarios AS u, imagenes AS i WHERE o.Id_ordenes_mantenimiento=$id_orden AND o.Id_estado=3  AND o.Id_prioridad=p.Id_prioridades AND o.Id_usuario=u.Id_usuario AND o.Id_imagen=i.Id_imagenes";
                $response = $conexion->consultar($sql);

                if($response){
                    foreach ($response as $row){
                        $fechac=$row->Fecha_creacion;
                        $Prioridad=$row->Pri_nombre;
                        $Estado=$row->Est_nombre;
                        $Supervisor=$row->Supervisor;
                        $Usuario=$row->Usu_nombre." ".$row->Apellido;
                        $Descripcion=$row->Descripcion;
                        $Imagen=$row->Nombre_img;
                        $id_orden=$row->Id_ordenes_mantenimiento;
                        $id_estado=$row->Id_estado;
                    }
                }

                include_once '../View/Orden_mto/Ver_Orden_mto.php';
            }catch (PDOException $e) {
                $response = array(
                    "success" => false,
                    "message" => "Error: " . $e->getMessage()
                );
                //Devolver la respuesta en formato JSON en caso de error
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }

        function Verreporte(){

            try{ 
                $conexion=new Orden_model();
    
                $id_orden=$_GET['Id_ordenes'];

                $sql="SELECT r.Id_reportes,r.Direccion,r.Descripcion,r.Tamano,r.Id_unidad,u.Uni_nombre,r.Id_imagen,i.Nombre_img,r.Id_video,v.Nombre_vid,r.Id_estado,e.Est_nombre,r.Id_tipos_danos,t.Tip_nombre,r.Id_ubicacion,l.Latitud,l.Longitud,r.Id_barrio,b.Bar_nombre,r.Id_orden_mantenimiento, r.Id_estado FROM reportes AS r,unidades_medida AS u, imagenes AS i, videos AS v, estados AS e, tipos_danos AS t, ubicaciones AS l, barrios AS b WHERE r.Id_estado=e.Id_estado AND r.Id_unidad=u.Id_Unidad AND r.Id_imagen=i.Id_imagenes AND r.Id_video=v.Id_videos AND r.Id_tipos_danos=t.Id_tipos_danos AND r.Id_ubicacion=l.Id_ubicacion AND r.Id_barrio=b.Id_barrio AND r.Id_orden_mantenimiento=$id_orden";
                $response = $conexion->consultar($sql);
    
                if($response){
                    foreach ($response as $row){
                        $dano=$row->Tip_nombre;
                        $dir=$row->Direccion;
                        $tamaño=$row->Tamano;
                        $unidad=$row->Uni_nombre;
                        $lat=$row->Latitud;
                        $lon=$row->Longitud;
                        $barrio=$row->Bar_nombre;
                        $desc=$row->Descripcion;
                        $img=$row->Nombre_img;
                        $vid=$row->Nombre_vid;
                        $_SESSION['reporte']=$row->Id_reportes;
                        $id_orden=$row->Id_orden_mantenimiento;
                        $estado=$row->Id_estado;
                    }
                }
    
                include_once '../View/Reportes/Ver_reporte.php';
            }catch (PDOException $e) {
                $response = array(
                    "success" => false,
                    "message" => "Error: " . $e->getMessage()
                );
                //Devolver la respuesta en formato JSON en caso de error
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }

}
