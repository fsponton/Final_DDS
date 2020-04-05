<?php require_once 'includes/header.php'; ?>
<div class="box">
                <h1 class="titulo">Registro</h1>
                
                   <?php if(isset($_SESSION['completado']) &&  isset($_SESSION['id'])): ?>
                        <div class="">
                            <?=$_SESSION['completado'].$_SESSION['id'];?>
                        </div>    
                    <?php elseif(isset($_SESSION['errores']['general'])):?>
                        <div class="">
                            <?=$_SESSION['errores']['general'];?>
                        </div>  
                    <?php endif;?>
                <form action="guardar_registro.php" method="POST">		
			<input type="text" name="nombre" class="input" placeholder="Nombre" />
			<?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre'):''; ?>
                         
			<input type="text" name="apellidos" class="input" placeholder="Apellidos"/>
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'apellidos'):''; ?>
                        
                        <input type="password" name="password" class="input" placeholder="Password"/>
                        <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'password'):''; ?>
                        <select name="tipo_usuario">
                            <option>Administrador</option>
                            <option>Editor de datos</option>
                            <option>Visualizador</option>
                        </select>
			
			<input class="boton " type="submit" value="Registrar"/>
                </form>
                <a href="menu.php" class=" volver">Volver al menu</a>
                <?php borrarError(); ?>
        </div>
       
        
    