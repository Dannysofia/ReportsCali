<?php
    @session_start();
    function redirect($url){
        echo "<script type='text/javascript'>"
            ."window.location.href='$url'"
            ."</script>";
    }

    function getUrl($modulo,$controlador,$funcion, $parametros=false,$pagina=false){
        
        if($pagina==false){
            $pagina="index";
        }

        $url="$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";

        if($parametros!=false){
            foreach($parametros as $key=>$valor){
                $url.="&$key=$valor";
            }
        }

        return $url;
    }

    function resolve(){
        $modulo=ucwords($_GET['modulo']);
        $controlador=ucwords($_GET['controlador']);
        $funcion=$_GET['funcion'];

        if(is_dir("../Controller/$modulo")){
            //modulo=carpeta
            //controlador=archivo
            //funcion=metodo del Controlador
            if(file_exists("../Controller/$modulo/".$controlador."_controller.php")){
                include_once "../Controller/$modulo/".$controlador."_controller.php";
                $nombreClase=$controlador."_controller";
                $objClase= new $nombreClase();
                if(method_exists($objClase,$funcion)){
                    $objClase->$funcion();
                }else{
                    echo "La función especificada no existe";
                }
            }else{
                echo "El controlador especificado no existe";
            }
        }else{
            echo "El método especificado no existe";
        }
    }

    
?>