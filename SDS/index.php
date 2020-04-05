<?php require_once 'includes/header.php'; ?>

	<div class="box">
            <img class="logo" src="assets/img/logo.png" alt="Logo de SDS">	
           
            <h1 class="titulo">Login</h1>
               <?php if(isset($_SESSION['error_login'])): ?> 
                <div class="alerta-error-login">
                    <h3> <?=$_SESSION['error_login']?></h3>
                </div>
               
               <?php endif; ?> 
                <form action="login.php" method="post">	                        
			        <input type="text" name="id" class="input" placeholder="ID Usuario">				
			        <input type="password" name="password" class="input" placeholder="Contraseña">
			        <input class="btn btn-primary btn-ingresar" type="submit" value="Ingresar">
			
                </form>
                <a class="enlace" href="recuperar_password.php">Recuperar Password</a>
                <br>
                <?php borrarError(); ?>       
        </div>
          
</body>
    <div class="clearfix"></div> 
<footer>
    <div class="pie">
            <p> Desarrollado por German Quintas - Fernando Cazenave - Francisco Sponton - &copy; 2020 </p>
    </div>
</footer>
</html>