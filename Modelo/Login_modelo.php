<?php
include '../CRUD/CRUD.php';

class Login {

    function __construct() {
        
    }

    function Iniciarsesion() {
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Obtener los datos enviados en la solicitud POST
                $_POST=json_decode(file_get_contents('php://input'),true);

                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];

                    $crud = new crud();
                    $sql = "SELECT * FROM usuarios WHERE correo_electronico = '$correo' AND contrasena = '$contrasena'";
                    $response = $crud->consultar($sql);

                    // Verificar si se encontraron resultados en la consulta
                    if (!empty($response) && count($response) > 0) {
                        // Inicio de sesión exitoso, imprime la respuesta deseada
                        echo "OK";
                    } else {
                        // Inicio de sesión fallido, imprime un mensaje de error
                        echo "Fallido";
                    }

            } else {
                // Si no es una solicitud POST, devolver un mensaje de error
                header('HTTP/1.1 405 Method Not Allowed');
                echo 'Método no permitido.';
            }
        } catch (PDOException $e) {
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

// Crear una instancia de la clase 'Registrousuarios'
$Iniciar = new Login();
// Llamar a la función 'Registrar_usuario' para manejar la solicitud POST
$Iniciar->Iniciarsesion();