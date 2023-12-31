<?php

include_once '../webService/conection.php';


class crud {

    function __construct() {
        
    }

     function consultar($sql) {
        
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($sql);
        $results = $sql->execute();
        $rows = $sql->fetchAll(\PDO::FETCH_OBJ);
        
        return $rows;
    }

    function insertar($sql) {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($sql);
        $result = $sql->execute();
        
        if ($result) {
            return "Registro insertado correctamente.";
        } else {
            return "Error al insertar el registro.";
        }
    }

    function actualizar($sql) {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($sql);
        $result = $sql->execute();
        
        if ($result) {
            return "Registro actualizado correctamente.";
        } else {
            return "Error al actualizar el registro.";
        }
    }

    function eliminar($sql) {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($sql);
        $result = $sql->execute();
        
        if ($result) {
            return "Registro eliminado correctamente.";
        } else {
            return "Error al eliminar el registro.";
        }
    }
    
    
}