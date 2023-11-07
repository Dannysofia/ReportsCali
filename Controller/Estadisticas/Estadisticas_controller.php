<?php
include '../Model/Estadisticas/Estadisticas_model.php';

class Estadisticas_controller {

    function Estado() {
        try {
                // Crear una instancia de la clase 'Login_model'
                $conexion = new Estadisticas_model();

                $sql = "SELECT id_estado, COUNT(*) as cantidad_reportes
                FROM reportes
                GROUP BY id_estado";
                $result = $conexion->consultar($sql);

                if ($result) {
                    foreach($result as $row){
                        $data[] = array('cantidad_reportes' => $row->cantidad_reportes);
                    }
                }

                return $data_json = json_encode($data);
        } catch (PDOException $e) {
            $response = array(
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            );
            //Devolver la respuesta en formato JSON en caso de error
            //header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    function tipodaño() {
        try {
                // Crear una instancia de la clase 'Login_model'
                $conexion = new Estadisticas_model();

                $sql = "SELECT id_tipos_danos, COUNT(*) as cantidad_danos
                FROM reportes
                GROUP BY id_tipos_danos";
                $result = $conexion->consultar($sql);

                if ($result) {
                    foreach($result as $row){
                        $data[] = array('cantidad_danos' => $row->cantidad_danos);
                    }
                }

                return $data_json = json_encode($data);
        } catch (PDOException $e) {
            $response = array(
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            );
            //Devolver la respuesta en formato JSON en caso de error
            //header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
