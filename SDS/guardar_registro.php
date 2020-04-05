<?php
//si recibe info por POST
if(isset($_POST)){
    
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
         session_start();
    }
   
   
    //recoger los valores del registro y asignarlo a variables si existen
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($database, $_POST['nombre']) : false;
    $apellidos =  isset($_POST['apellidos']) ? mysqli_real_escape_string($database,$_POST['apellidos']) : false; 
    $password =  isset($_POST['password']) ? mysqli_real_escape_string($database,$_POST['password']) : false;
    $tipo = isset($_POST) ? mysqli_real_escape_string($database,$_POST['tipo_usuario']) : false;
    
    
    //ARRAY DE ERRORES
    $errores = array();
    
    //validar datos antes de guardar en la base de datos
    
    //validar nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    //validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else {
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }
    

    //validar password
    if (!empty($password) && strlen($password) >= 6) {
            $password_validado = true;
    }elseif (!empty($password) && strlen($password)<6){
            $password_validado = false;
            $errores['password'] = "La password contiene menos de 6 caracteres";
    }else {
             $password_validado = false;
            $errores['password'] = "La password esta vacia";
           
    }
    
    
   
    $guardar_usuario = false;
    
    //si el array de errores esta vacio
    if(count($errores) == 0){
        $guardar_usuario = true;
        
        //cifrar contrasenia
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        
        $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos', '$password_segura', CURDATE(), CURDATE(), 1, '$tipo');";
        
        $guardar = mysqli_query($database, $sql);
        
        //Devuelve el id autogenerado que se utilizó en la última consulta
        $id = mysqli_insert_id($database);
        
        if($guardar){
            $_SESSION['completado'] = "El registro se completo con exito,";
            $_SESSION['id'] = " el id es: ".$id.".";
        }else{
            $_SESSION['errores']['general'] = "Fallo al registrar usuario!!"; 
        }
   
        
    }else{
        //si hay errores en el formulario se hace una session
      $_SESSION['errores']=$errores;
     
    }
}  
header('Location: registro.php');
