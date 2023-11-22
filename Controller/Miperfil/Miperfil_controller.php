<?php
include '../Model/Miperfil/Miperfil_model.php';
class Miperfil_controller {

    function __construct() {
        
    }

    function Verperfil(){
        try{
            if(isset($_SESSION['usuario']) === false){
                redirect('login.php');
              }
          
              $id = $_SESSION['usuario'];
              $Iniciar = new Miperfil_model();
              $sql = "SELECT * FROM usuarios WHERE Id_usuario = $id";
              $response = $Iniciar->consultar($sql);
              $usuario = null;
              $rol = null;
          
              foreach ($response as $row) {
                  $usuario = $row;
              }
          
              $sql = "SELECT * FROM roles WHERE Id_rol = $usuario->Id_rol";
              $response = $Iniciar->consultar($sql);
          
              foreach ($response as $row) {
                  $rol = $row;
              }

              include_once '../View/Miperfil/Miperfil.php';
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

    function Actualizarusuario(){
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $conexion = new Miperfil_model();

                $id = $_SESSION['usuario'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];

                if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo'])){

                    $sql ="UPDATE usuarios SET Usu_nombre = '$nombre', Apellido ='$apellido', Correo_electronico = '$correo' where Id_usuario = '$id'";
                    $response = $conexion->actualizar($sql);

                    if($response){
                        $_SESSION['perfil']="El perfil se actualizo de manera exitosa";
                        redirect('ajax.php?modulo=Miperfil&controlador=Miperfil&funcion=Verperfil');;
                    }else{
                        echo "No";
                    }
                }else{
                    $_SESSION['perfil']="Diligencie todos los campos";
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

    function Vercontraseña(){
        include_once '../View/Miperfil/Contraseña.php';
    }

    function Actualizarcontraseña(){
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $conexion = new Miperfil_model();

                $id = $_SESSION['usuario'];

                $contrasena_actual = $_POST['contrasena_actual'];
                $contrasena = $_POST['contrasena'];

                if (!empty($_POST['contrasena_actual']) && !empty($_POST['contrasena'])){

                    $sql = "SELECT * FROM usuarios WHERE Id_usuario = $id";
                    $response = $conexion->consultar($sql);
                    $usuario = null;
                
                    foreach ($response as $row) {
                        $usuario = $row->Contrasena;
                    }
                
                    if ($usuario === $contrasena_actual) {
                        $sql = "UPDATE usuarios SET Contrasena = '$contrasena' WHERE Id_usuario = '$id'";
                        $response = $conexion->actualizar($sql);

                        if($response){
                            $_SESSION['contraseñab']="La contraseña se actualizo de manera exitosa";
                            redirect('ajax.php?modulo=Miperfil&controlador=Miperfil&funcion=Vercontraseña');
                        }else{
                            echo "No";
                        }
                    }else{
                        $_SESSION['contraseñam']="La contraseña actual es incorrecta";
                        redirect('ajax.php?modulo=Miperfil&controlador=Miperfil&funcion=Vercontraseña');
                    }
                }else{
                    $_SESSION['contraseñam']="Diligencie todos los campos";
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
