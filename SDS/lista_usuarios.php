<?php require_once 'includes/header.php'; ?>
<div class="box box-eliminar">
<img class="logo" src="assets/img/logo.png" alt="Logo de SDS">  
           <h1 class="">Eliminar usuario</h1>
           <!-- <form  action="usuario_buscado.php" method="POST">  -->
           <form  method="POST"> 
              <div>
                  <div class="">
                    <input class="form-control-sm" type="text" name="busqueda" id="busqueda" placeholder="Ingrese ID, ombre o Apellido"/>
                  </div>
                  <div class="buscar-submit">
                  <button type="submit" class="btn btn-success btn-sm" id="boton-buscar">Buscar</button>
                  </div>
              </div>
            <div id="tabla_usuarios">
                   <table class="table" id="tabla_usuarios2">
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
                                             $sql = "SELECT * FROM usuarios";
                                             $usuarios = mysqli_query($database, $sql);
                                             $usuariosTotales = array();
                                             $usuariosList = array();
                                             While($usuario= mysqli_fetch_array($usuarios)){        
                                              $usuariosList['id']=$usuario['id'];
                                              $usuariosList['nombre']=$usuario['nombre'];
                                              $usuariosList['apellidos']=$usuario['apellidos'];
                                              array_push($usuariosTotales,$usuariosList);
                                            /*  echo '<tr class="">
                                                 <th>'.$usuario['id'].'</th> 
                                                 <th>'.$usuario['nombre'].'</th> 
                                                 <th>'.$usuario['apellidos'].'</th>  
                                                 <td><input type="checkbox" name="eliminar[]" value="'.$usuario['id'].'"/> </td>
                                             </tr>';*/
                                             }                   
                            ?>                                 
                        </tbody>
                       </table>                    
            </div>  
            <?php 
            if(isset($_POST['borrar'])){     
                if(empty($_POST['eliminar'])){
                    echo 
                    '<div class="alert alert-danger alert-sm" role="alert">
                         No se selecciono ningun usuario.
                    </div>';
                }else{   //va recorriendo cada uno y asignandole a id_borrar
                  foreach($_POST['eliminar'] as $id_borrar) {
                      $sql = "DELETE FROM usuarios WHERE id = '$id_borrar'";
                      $borrarUsuario = mysqli_query($database,$sql);
                      echo 
                        '<div class="alert alert-success alert-sm" role="alert">
                            Se borro con exito el usuario.
                        </div>';
                  }
                }
            }
            ?>                                  
            <input class="btn btn-danger" type="submit" name="borrar" value="Eliminar">      
            <a href="menu.php" class=" volver">Volver al menu</a>
            </form>
        </div>

  <script type="text/javascript">
   usuarios = <?php echo json_encode($usuariosTotales); ?>;
   listaUsuarios = listarUsuarios(usuarios);
   
   $('#busqueda').change(function (){
      if($('#busqueda').val()==""){
        console.log(usuarios);
          listarUsuarios(usuarios);
      }
   });

    $('#busqueda').autocomplete({
      source: function (textInput) {
        dataTable = usuarios.filter(function (i,n){
          return i.apellidos.toLowerCase().indexOf(textInput.term.toLowerCase()) > -1;
        });
        console.log(dataTable);
        if (dataTable.length >= 0) {
          $('#tabla_usuarios2').html('');
          dataTable.forEach(function (data) {
            inyectarHtml(data)
          });
        }
      }
     
    });     
    

    function listarUsuarios (usuarios) {
      listaUsuarios = []; 
      $('#tabla_usuarios2').html('');
      usuarios.forEach(function (element) {

        inyectarHtml(element)
        
        listaUsuarios.push(element.apellidos);
      });

      
    return listaUsuarios;
    }
    

    function inyectarHtml (data) {
      let html  = "<tr> <th>"+data.id+"</th> <th>"+data.nombre+"</th><th>"+data.apellidos+"</th><td><input type='checkbox' name='eliminar[]' value="+data.id+"> </td> </tr>";
        $('#tabla_usuarios2').append(html);
    }
   
    

    
</script>
























