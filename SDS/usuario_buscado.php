<?php require_once 'includes/header.php'; ?>
<div class="box box-eliminar">
<img class="logo" src="assets/img/logo.png" alt="Logo de SDS">  
           <h1 class="">Eliminar usuario</h1>
           <form  action="usuario_buscado.php" method="POST"> 
              <div>
                  <div class="buscar2">
                    <input class="form-control-sm" type="text" name="busqueda" id="busqueda" placeholder="Ingrese ID, ombre o Apellido"/>
                  </div>
                  <div class="buscar-submit">
                  <button type="submit" class="btn btn-success btn-sm">Buscar</button>
                  </div>
                  
              </div>
            <div id="tabla_usuarios">
                   <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Seleccionar</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              if(isset($_POST)){
                                $dato = strtolower($_POST['busqueda']);
                                
                                if(!empty($dato)){
                                  $sql = "SELECT id, nombre, apellidos FROM usuarios WHERE id LIKE '$dato' OR nombre LIKE '%".$dato."%' OR apellidos LIKE '%".$dato."%';";
                                  
                                  $usuarios = mysqli_query($database,$sql);
                                             While($mostrar= mysqli_fetch_array($usuarios)){
                                              echo '<tr class="">
                                                 <th>'.$mostrar['id'].'</th> 
                                                 <th>'.$mostrar['nombre'].'</th> 
                                                 <th>'.$mostrar['apellidos'].'</th>  
                                                 <td><input type="checkbox" name="eliminar[]" value="'.$mostrar['id'].'"/> </td>
                                             </tr>';
                                                }

                                              }

                                            }
                                             ?>
                        </tbody>
                       </table>
           </div>                       
           <?php 
            if(isset($_POST['borrar'])){
                
                if(empty($_POST['eliminar'])){
                    echo 
                    '<div class="alert alert-danger" role="alert">
                         No se selecciono ningun usuario.
                    </div>';
                }else{   //va recorriendo cada uno y asignandole a id_borrar
                  foreach($_POST['eliminar'] as $id_borrar) {
                      $sql = "DELETE FROM usuarios WHERE id = '$id_borrar'";
                      $borrarUsuario = mysqli_query($database,$sql);
                      echo 
                        '<div class="alert alert-success" role="alert">
                            Se borro con exito el usuario.
                        </div>';
                  }
                }
            }
            ?>
           
           <input class="btn btn-danger" type="submit" name="borrar" value="Eliminar">  
            
            <a href="menu.php" class=" volver">Volver al menu</a>
        </div>

        </form>                                   
 
