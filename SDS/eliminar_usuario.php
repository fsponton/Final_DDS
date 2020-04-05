<?php
var_dump($_post['eliminar']);
die();
if(isset($_POST['dato'])){
   $dato = strtolower($_GET['dato']);
   
    if(empty($_GET['eliminar'])){
        echo '<h1>No se ha seleccionado usuario</h1>';
    }else{
        foreach($_GET['eliminar'] as $id_borrar){
            $sql = "DELETE FROM usuarios WHERE id LIKE '$dato' OR nombre LIKE '$dato' OR apellidos LIKE '$dato';";
            $borrarUsuarios = mysqli_query($database,$sql);
        }
        
    }

    
}

?>