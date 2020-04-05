<?php require_once 'includes/header.php'; ?>
<div class="box box-eliminar">
<img class="logo" src="assets/img/logo.png" alt="Logo de SDS">  
           <h1 class="">Modificar Usuario</h1>
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
                            <th scope="col">Modificar</th>
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
                                             }                  
                            ?>                                 
                        </tbody>
                       </table>                    
            </div> 
                                            
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
      let html  = "<tr> <th>"+data.id+"</th> <th>"+data.nombre+"</th> <th>"+data.apellidos+"</th> <td> <button onClick='modificarDatos(this)'> Modificar </button></td> </tr>";
        $('#tabla_usuarios2').append(html);
    }
   
    function modificarDatos (_this){
        const tr = _this.children('tr');

        console.log(tr);
    }

    
</script>


<!-- <button type='submit' name='modificar' value="+data.id+"> </button>  -->