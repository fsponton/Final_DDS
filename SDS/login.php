<?php

require_once 'includes/conexion.php';

if(isset($_POST)){

    $id_usuario =($_POST['id']);
    $password = ($_POST['password']);
    
   
    //hacer la consulta al servidor
    $sql = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
   
    // asignar la query a login
    $login = mysqli_query($database, $sql);
    
    
   
    if($login && mysqli_num_rows($login) ==1){
        //asociar el sql a un objeto
        $usuario = mysqli_fetch_assoc($login);
        
       // verificar la password con el objeto usuario y arrat passsword y asignarlo a una variable 
        $verify = password_verify($password, $usuario['password']);       
        
        
        if($verify){
            //mensaje de inicio de usuario
            $_SESSION['usuario']=$usuario;
            header('Location: menu.php');           
            
        }else{
            //mensaje de serror
            $_SESSION['error_login'] = "Login incorrecto!!";
            header('Location: index.php');
        }
    }
    
}




