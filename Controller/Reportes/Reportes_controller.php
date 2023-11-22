<?php
include '../Model/Reportes/Reportes_model.php';

class Reportes_controller {

    function __construct() {
        
    }
    function index(){
        try{
            $conexion=new Reportes_model();
            $sql="SELECT r.Id_reportes, r.Direccion,r.fecha_reporte,r.Descripcion,r.Id_estado,r.Id_orden_mantenimiento, e.Est_nombre FROM reportes AS r,estados AS e WHERE r.Id_estado=e.Id_estado ORDER BY r.Id_estado ASC";
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
            $imagen=$_FILES['imagen'];
            $video=$_FILES['video'];

            if (!empty($_POST['dano']) && !empty($_POST['direccion']) && !empty($_POST['tamaño']) && !empty($_POST['unidad']) && !empty($_POST['latitud']) && !empty($_POST['longitud']) && !empty($_POST['barrio']) && !empty($_POST['descripcion']) && !empty($_FILES['imagen']) && !empty($_FILES['video'])) {

                //Guardar imagenes cargadas en la carpeta img de assets
                $carpeta_destino = "../assets/img/";
                $nombre_imagen = $_FILES['imagen']['name'];
                $imagen=$nombre_imagen;
                $ruta_imagen_temporal = $_FILES['imagen']['tmp_name'];
                $ruta_imagen_destino = $carpeta_destino . $nombre_imagen;
                move_uploaded_file($ruta_imagen_temporal, $ruta_imagen_destino);

                //Guardar videos cargados en la carpeta vid de assets
                $carpeta_destino = "../assets/vid/";
                $nombre_video = $_FILES['video']['name'];
                $video=$nombre_video;
                $ruta_video_temporal = $_FILES['video']['tmp_name'];
                $ruta_video_destino = $carpeta_destino . $nombre_video;
                move_uploaded_file($ruta_video_temporal, $ruta_video_destino);

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

                $sql= "INSERT INTO reportes (Direccion, fecha_reporte, Descripcion, Tamano, Id_unidad, Id_imagen, Id_video, Id_estado, Id_prioridad, Id_usuario, Id_tipos_danos, Id_ubicacion, Id_barrio, Id_orden_mantenimiento) VALUES ('$direccion','$fecha','$descripcion',$tamaño,$id_uni,$id_img,$id_vid,$id_est,$id_pri,$id_usu,$id_danos,$id_ubi,$id_bar,$id_ord)";
                $response = $conexion->insertar($sql);

                if($response){
                    $_SESSION['reportesb']="El reporte se creo de manera exitosa";
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

    function getConsultar(){

        try{ 
            $conexion=new Reportes_model();

            $id_reporte=$_GET['Id_reportes'];

            $sql="SELECT r.Id_reportes,r.Direccion,r.Descripcion,r.Tamano,r.Id_unidad,u.Uni_nombre,r.Id_imagen,i.Nombre_img,r.Id_video,v.Nombre_vid,r.Id_estado,e.Est_nombre,r.Id_tipos_danos,t.Tip_nombre,r.Id_ubicacion,l.Latitud,l.Longitud,r.Id_barrio,b.Bar_nombre,r.Id_orden_mantenimiento, r.Id_estado FROM reportes AS r,unidades_medida AS u, imagenes AS i, videos AS v, estados AS e, tipos_danos AS t, ubicaciones AS l, barrios AS b WHERE r.Id_reportes=$id_reporte AND r.Id_estado=e.Id_estado AND r.Id_unidad=u.Id_Unidad AND r.Id_imagen=i.Id_imagenes AND r.Id_video=v.Id_videos AND r.Id_tipos_danos=t.Id_tipos_danos AND r.Id_ubicacion=l.Id_ubicacion AND r.Id_barrio=b.Id_barrio";
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

    function verOrden(){

        try{ 
            $conexion=new Reportes_model();

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
}
