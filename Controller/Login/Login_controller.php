<?php
include '../Model/Login/Login_model.php';

class Login_controller {

    function __construct() {
        
    }

    function Iniciarsesion() {
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Crear una instancia de la clase 'Login_model'
                $Iniciar = new Login_model();

                // Obtener los datos enviados en la solicitud POST
                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];

                if(isset($_POST['correo']) && isset($_POST['contrasena']) && $correo!="" && $contrasena!=""){

                    $sql = "SELECT * FROM usuarios WHERE correo_electronico = '$correo' AND contrasena = '$contrasena'";
                    $response = $Iniciar->consultar($sql);

                    // Verificar si se encontraron resultados en la consulta
                    if (!empty($response) && count($response) > 0) {
                        // Inicio de sesión exitoso, imprime la respuesta deseada
                        echo "OK";
                        redirect('index.php'); 
                    } else {
                        // Inicio de sesión fallido, imprime un mensaje de error
                        echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>".
                        "Correo electronico y/o Contraseña incorrecta".
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                        "</button></div>";

                        redirect('login.php');
                    }
                }else{
                    redirect('login.php'); 
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
