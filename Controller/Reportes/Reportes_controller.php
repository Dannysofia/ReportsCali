<?php
include '../Model/Reportes/Reportes_model.php';

class Reportes_controller {

    function __construct() {
        
    }
    function index(){
        try{
            $conexion=new Reportes_model();
            $sql="SELECT r.Direccion,r.fecha_reporte,r.Descripcion,r.Id_estado, e.Est_nombre FROM reportes AS r,estados AS e WHERE r.Id_estado=e.Id_estado ORDER BY r.Id_estado ASC";
            $response = $conexion->consultar($sql);
            include_once '../View/Reportes/Consultar_reporte.php';

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
            $conexion=new Reportes_model();

            $sql="SELECT Tip_nombre FROM tipos_danos";
            $responseTip = $conexion->consultar($sql);

            $sql="SELECT Uni_nombre FROM unidades_medida";
            $responseUni = $conexion->consultar($sql);

            $sql="SELECT Bar_nombre FROM barrios";
            $responseBar = $conexion->consultar($sql);


            include_once '../View/Reportes/Crear_reporte.php';
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
            $conexion=new Reportes_model();

            $dano=$_POST['dano'];
            $direccion=$_POST['direccion'];
            $tamaño=$_POST['tamaño'];
            $unidad=$_POST['unidad'];
            $latitud=$_POST['latitud'];
            $longitud=$_POST['longitud'];
            $barrio=$_POST['barrio'];
            $descripcion=$_POST['descripcion'];
            $imagen=$_POST['imagen'];
            $video=$_POST['video'];

            if (!empty($_POST['dano']) && !empty($_POST['direccion']) && !empty($_POST['tamaño']) && !empty($_POST['unidad']) && !empty($_POST['latitud']) && !empty($_POST['longitud']) && !empty($_POST['barrio']) && !empty($_POST['descripcion']) && !empty($_POST['imagen']) && !empty($_POST['video'])) {

                $sql="SELECT Id_tipos_danos FROM tipos_danos WHERE Tip_nombre='$dano'";
                $responseTip = $conexion->consultar($sql);

                foreach ($responseTip as $row) {
                    $id_danos= $row -> Id_tipos_danos;
                }

                $sql="SELECT Id_unidad FROM unidades_medida WHERE Uni_nombre='$unidad'";
                $responseUni = $conexion->consultar($sql);

                foreach ($responseUni as $row) {
                    $id_uni= $row -> Id_unidad;
                }

                $sql = "INSERT INTO ubicaciones (Latitud,Longitud) VALUES ('$latitud', '$longitud')";
                $responseUbi = $conexion->insertar($sql);

                $sql="SELECT Id_ubicacion FROM ubicaciones WHERE Latitud='$latitud' AND Longitud='$longitud'";
                $responseUbi2 = $conexion->consultar($sql);

                foreach ($responseUbi2 as $row) {
                    $id_ubi= $row -> Id_ubicacion;
                }

                $sql="SELECT Id_barrio FROM barrios WHERE Bar_nombre='$barrio'";
                $responseBar = $conexion->consultar($sql);

                foreach ($responseBar as $row) {
                    $id_bar= $row -> Id_barrio;
                }

                $sql = "INSERT INTO imagenes (Nombre_img) VALUES ('$imagen')";
                $responseImg = $conexion->insertar($sql);

                $sql="SELECT Id_imagenes FROM imagenes WHERE Nombre_img='$imagen'";
                $responseImg2 = $conexion->consultar($sql);

                foreach ($responseImg2 as $row) {
                    $id_img= $row -> Id_imagenes;
                }

                $sql = "INSERT INTO videos (Nombre_vid) VALUES ('$video')";
                $responseVid = $conexion->insertar($sql);

                $sql="SELECT Id_videos FROM videos WHERE Nombre_vid='$video'";
                $responseVid2 = $conexion->consultar($sql);

                foreach ($responseVid2 as $row) {
                    $id_vid= $row -> Id_videos;
                }


                $fecha=date('y').date('m').date('d');
                $id_est=1;
                $id_pri=0;
                $id_usu=$_SESSION['usuario'];
                $id_ord=0;

                $sql= "INSERT INTO reportes (Direccion, fecha_reporte, Descripcion, Longitud, Id_unidad, Id_imagen, Id_video, Id_estado, Id_prioridad, Id_usuario, Id_tipos_danos, Id_ubicacion, Id_barrio, Id_orden_mantenimiento) VALUES ('$direccion','$fecha','$descripcion',$tamaño,$id_uni,$id_img,$id_vid,$id_est,$id_pri,$id_usu,$id_danos,$id_ubi,$id_bar,$id_ord)";
                $response = $conexion->insertar($sql);

                if($response){
                    redirect('ajax.php?modulo=Reportes&controlador=Reportes&funcion=index');
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
}
