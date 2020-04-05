<?php
require_once 'conexion.php';


function mostrarErrores($errores, $campo){
    $alerta='';
    
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div';
    }
    
    return $alerta;
}


function borrarError(){
    $borrado = false;
    
    if(isset($_SESSION['error_login'])){
        $_SESSION['error_login']=null;
        $borrado = true;        
    }
    
    
    if(isset($_SESSION['completado']) &&  isset($_SESSION['id'])){
        $_SESSION['completado'] = null;
        $_SESSION['id'] = null;
        $borrado = true;
    }
    
    if(isset($_SESSION['errores']['nombre'])){
        $_SESSION['errores']['nombre'] = null;
        $borrado = true;
    }
    
     if(isset($_SESSION['errores']['apellidos'])){
        $_SESSION['errores']['apellidos'] = null;
        $borrado = true;
    }
    
     if(isset($_SESSION['errores']['password'])){
        $_SESSION['errores']['password'] = null;
        $borrado = true;
    }
     return borrado;
}


// function mostrarUsuario($database, $dato){

//     $sql = "SELECT id, nombre, apellidos FROM usuarios 
//     WHERE id LIKE '$dato' 
//     OR nombre LIKE '$dato' 
//     OR apellidos LIKE'dato';"



// }




