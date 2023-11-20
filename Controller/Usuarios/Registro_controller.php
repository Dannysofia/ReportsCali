<?php
include '../Model/Usuarios/Registro_model.php';

class Registro_controller{

    function __construct() {
        
    }

    function Registrarusuario() {
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Crear una instancia de la clase 'Registrousuarios'
                $conexion = new Registro_model();

                // Obtener los datos enviados en la solicitud POST

                $rol = $_POST['rol'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];
                $codigo = $_POST['codigo'];

                //Se valida si el código del secretario esta registrado en la BD.
                if($rol==1){
                    $resultadoConsulta = $conexion->consultar("SELECT Id_codigo FROM codigos_secretario WHERE Codigo = '$codigo'");

                    if (!empty($resultadoConsulta)) {
                        $cod=1;
                        $codigo=$resultadoConsulta[0]->Id_codigo;
                    }else{
                        echo "El código no esta registrado";
                        $cod=2;
                    }
                }else{
                    $cod=0;
                    $codigo=0;
                }

                //Condición para validar si el registro se debe hacer con codigo de secretario y sin codigo

                if($cod==1 || $cod==0){
                    $crud = new crud();
                    $sql = "INSERT INTO usuarios (Usu_nombre, Apellido, Correo_electronico, Contrasena, Id_codigo, Id_rol) VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$codigo', '$rol')";
                    $response = $crud->insertar($sql);

                    if($response=="Registro insertado correctamente."){
                      redirect('login.php');
                    }else{
                      echo "No";
                    }
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

    function Aualizarusuario() {
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Crear una instancia de la clase 'Registrousuarios'
                $conexion = new Registro_model();

                // Obtener los datos enviados en la solicitud POST

                $id = $_SESSION['usuario'];

                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];

                $crud = new crud();
                $sql = "update usuarios set Usu_nombre = '{$nombre}', Apellido =' {$apellido}', Correo_electronico = '{$correo}' where Id_usuario = '{$id}'";
                $response = $crud->insertar($sql);

                if($response=="Registro insertado correctamente."){
                  redirect('MiPerfil.php');
                }else{
                  echo "No";
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

    function Aualizarcontrasena() {
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Crear una instancia de la clase 'Registrousuarios'
                $conexion = new Registro_model();

                // Obtener los datos enviados en la solicitud POST

                $id = $_SESSION['usuario'];

                $contrsena_actual = $_POST['contrasena_actual'];
                $contrasena = $_POST['contrasena'];

                $sql = "SELECT * FROM usuarios WHERE Id_usuario = $id";
                $response = $conexion->consultar($sql);
                $usuario = null;
            
                foreach ($response as $row) {
                    $usuario = $row;
                }
            
                if ($usuario->Contrasena === $contrsena_actual) {
                    $crud = new crud();
                    $sql = "update usuarios set Contrasena = '{$contrasena}' where Id_usuario = '{$id}'";
                    $response = $crud->insertar($sql);
    
                    if($response=="Registro insertado correctamente."){
                      redirect('MiPerfil.php');
                    }else{
                      echo "No";
                    }
                } else {
                    echo "no";
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

