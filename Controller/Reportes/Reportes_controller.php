<?php
include '../Model/Reportes/Reportes_model.php';

class Reportes_controller {

    function __construct() {
        
    }
    function index(){
        try{
            $conexion=new Reportes_model();
            $sql="SELECT r.Direccion,r.fecha_reporte,r.Descripción,r.Id_estado, r.Id_prioridad, e.Est_nombre, p.Pri_nombre FROM reportes AS r,estados AS e, prioridades AS p WHERE r.Id_estado=e.Id_estado AND r.Id_prioridad=p.Id_prioridades ORDER BY r.Id_estado ASC";
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
            $sql="SELECT Uni_nombre FROM unidades_medida";
            $response = $conexion->consultar($sql);
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
}
