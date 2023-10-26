<?php
include '../../CRUD/CRUD.php';

class Registrousuarios {

    function __construct() {
        
    }

    function Registrar_usuario() {
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Obtener los datos enviados en la solicitud POST
                $_POST=json_decode(file_get_contents('php://input'),true);

                $rol = $_POST['rol'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];
                $codigo = $_POST['codigo'];

                //Se valida si el código del secretario esta registrado en la BD.
                if($rol==1){
                    $conexion = new crud();
                    $resultadoConsulta = $conexion->consultar("SELECT Id_codigo FROM codigos_secretario WHERE Codigo = '$codigo'");

                    if (!empty($resultadoConsulta)) {
                        $cod=1;
                        $codigo=$resultadoConsulta[0]->Id_codigo;
                    }else{
                        //echo "El código no esta registrado";
                        $cod=2;
                    }
                }else{
                    $cod=0;
                    $codigo=0;
                }

                //Condición para validar si el registro se debe hacer con codigo de secretario y sin codigo

                if($cod==1 || $cod==0){
                    $crud = new crud();
                    $sql = "INSERT INTO usuarios (Nombre, Apellido, Correo_electronico, Contrasena, Id_codigo, Id_rol) VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$codigo', '$rol')";
                    $response = $crud->insertar($sql);
                    echo $response;
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
            // Devolver la respuesta en formato JSON en caso de error
            header('Content-Type: application/json');
            echo json_encode($response);
        }

    }
}

// Crear una instancia de la clase 'Registrousuarios'
$Crearusuario = new Registrousuarios();
// Llamar a la función 'Registrar_usuario' para manejar la solicitud POST
$Crearusuario->Registrar_usuario();