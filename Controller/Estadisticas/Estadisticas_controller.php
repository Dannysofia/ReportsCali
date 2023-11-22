<?php
include '../Model/Estadisticas/Estadisticas_model.php';

class Estadisticas_controller {

    function Estado() {
        try {
                // Crear una instancia de la clase 'Login_model'
                $conexion = new Estadisticas_model();

                $sql = "SELECT e.Est_nombre, COUNT(r.id_estado) as cantidad_reportes
                FROM reportes r
                INNER JOIN estados e ON r.id_estado = e.id_estado
                GROUP BY r.id_estado, e.Est_nombre";
                $result = $conexion->consultar($sql);

                if ($result) {
                    foreach($result as $row){
                        $data[] = array('cantidad_reportes' => $row->cantidad_reportes,'estado' => $row->Est_nombre);
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

    function meses(){
        try {
            // Crear una instancia de la clase 'Login_model'
            $conexion = new Estadisticas_model();

            $sql = "SELECT CASE 
            WHEN MONTH(fecha_reporte) = 1 THEN 'Enero'
            WHEN MONTH(fecha_reporte) = 2 THEN 'Febrero'
            WHEN MONTH(fecha_reporte) = 3 THEN 'Marzo'
            WHEN MONTH(fecha_reporte) = 4 THEN 'Abril'
            WHEN MONTH(fecha_reporte) = 5 THEN 'Mayo'
            WHEN MONTH(fecha_reporte) = 6 THEN 'Junio'
            WHEN MONTH(fecha_reporte) = 7 THEN 'Julio'
            WHEN MONTH(fecha_reporte) = 8 THEN 'Agosto'
            WHEN MONTH(fecha_reporte) = 9 THEN 'Septiembre'
            WHEN MONTH(fecha_reporte) = 10 THEN 'Octubre'
            WHEN MONTH(fecha_reporte) = 11 THEN 'Noviembre'
            WHEN MONTH(fecha_reporte) = 12 THEN 'Diciembre'
            END AS mes, COUNT(*) AS cantidad_reportes FROM reportes GROUP BY MONTH(fecha_reporte) ORDER BY MONTH(fecha_reporte)";
            $result = $conexion->consultar($sql);

            if ($result) {
                foreach($result as $row){
                    $data[] = array('mes' => $row->mes,'cant' => $row->cantidad_reportes);
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

    function Prioridad() {
        try {
                // Crear una instancia de la clase 'Login_model'
                $conexion = new Estadisticas_model();

                $sql = "SELECT p.Pri_nombre, COUNT(o.id_prioridad) as cantpri
                FROM ordenes_mantenimiento o
                INNER JOIN prioridades p ON o.id_prioridad = p.id_prioridades
                GROUP BY o.id_prioridad, p.Pri_nombre";
                $result = $conexion->consultar($sql);

                if ($result) {
                    foreach($result as $row){
                        $data[] = array('cantp' => $row->cantpri,'prioridad' => $row->Pri_nombre);
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
