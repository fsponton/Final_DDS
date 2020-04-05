

<?php require_once 'includes/header.php'; ?>

  

<div class="contenedor-box">
                <div class="box2">
                                <div class="caja" id="cero" >
                                        <img class="icon" src="https://img.icons8.com/ios/50/000000/edit-file.png">
                                        <p class="texto">Modificar producto</p>
                                </div>
                                <div class="caja" id="uno">
                                        <a href="agregar_producto.html"><img class="icon" src="https://img.icons8.com/wired/64/000000/add-file--v2.png"></a>
                                        <p class="texto">Agregar producto</p>
                                </div>
                                <div class="caja" id="dos">
                                        <img class="icon" src="https://img.icons8.com/dotty/80/000000/ask-question.png">
                                        <p class="texto">Consulta de existencias</p>
                                </div>
                                <div class="caja" id="tres">
                                        <img class="icon" src="https://img.icons8.com/dotty/64/000000/shopping-cart.png">
                                        <p class="texto">Entrada y salida de mercadería</p>
                                </div>
                                <!--*****************-->
                                <div class="caja" id="cuatro">
                                        <img class="icon" src="https://img.icons8.com/wired/64/000000/in-inventory.png">
                                        <p class="texto">Cierre de inventarios</p>
                                </div>
                                <div class="caja" id="cinco">
                                        <img class="icon" src="https://img.icons8.com/dusk/64/000000/hourglass.png">
                                        <p class="texto">Próximos a vencerse</p>
                                </div>
                                <div class="caja" id="seis">
                                        <img class="icon" src="https://img.icons8.com/dusk/64/000000/warning-shield.png">
                                        <p class="texto">Reporte de productos faltantes</p>
                                </div>
                                <div class="caja" id="siete">
                                        <img class="icon" src="https://img.icons8.com/nolan/64/000000/waypoint-map.png">
                                        <p class="texto">Mapa del almacen</p>
                                </div>
                </div> 
                <?php $tipo=$_SESSION['usuario']['tipo']?>  
                <?php if($tipo=='Administrador'): ?>
                <div class="contenedor-option"  >
                    
                    <div class="titulo-option" style="width: 200px; height: 100px; background: #FA5858;">
                            <h2 style="text-align: center; text-transform: uppercase; font-size: 20px; ">
                                <span style="margin-bottom:;">Usuario Administrador</span><br/> 
                                <h3 style="text-align: center; margin-top: -5%; color:#FFF; font-weight: 300;"> <?= $_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellidos'] ?></h3>
                            </h2>
                    </div>                          
                                <div class="option" >                
                                        <p class="texto"><a class="enlace" href="registro.php">Crear  Usuario</a></p>
                                </div>
                                <div class="option" >      
                                        <p class="texto"><a class="enlace" href="modificar_usuario.php">Modificar Datos Usuario</a></p>
                                </div>
                                <div class="option" >     
                                        <p class="texto"><a class="enlace" href="reiniciar_password.php">Reiniciar Password de Usuario</a></p>
                                </div>                       
                                <div class="option" >
                                        <p class="texto"><a class="enlace" href="lista_usuarios.php">Eliminar Usuario</a></p>
                                </div>
                     <div class="option" >
                                       
                                     <p class="salir" style=" padding-bottom: 10px; letter-spacing: 2px; font-size: 20px;"><a class="enlace" href="salir.php">SALIR</a></p>
                                </div>
                </div>        
    
                       <?php endif;?>         
 