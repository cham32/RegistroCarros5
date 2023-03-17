
        /****************************************************************
         *  Funcion que muestra en la pagina Web la tabla con los datos *
         *  guardados en la BD                                          *
         ****************************************************************/
        function mostrarUsuario() {
            $.get('mostrar_usuario.php',            // la URL para la petición
                function(respuesta,status) {        //Funcion que recibe la respuesta
                    $("resultado2").html(respuesta);  //Cambia el DOM
                },              
            );
        }
       
         function borrarUsuario3($valor) {
            $.post("eliminar_usuarios.php",
                {placa:$valor}
            );
        }

        /*********************************************************************
         *               Funcion que inserta datos en la BD                  *
         *********************************************************************/
        function insertarUsuario(){    
            $.post("insertar_usuario.php",
                {
                    placa:$("#placa").val(),
                    tipo_vehiculo:$("#tipo_vehiculo").val(),
                    marca:$("#marca").val(),
                    modelo:$("#modelo").val(),
                    version_modelo:$("#version_modelo").val(),
                    numero_serie:$("#numero_serie").val()
                }
            );  
        }
        function agregausua(){    
            $.post("agregarusuario.php",
                {
                    usuario:$("#usuario").val(),
                    correo:$("#correo").val(),
                    contra:$("#contraseña").val()
                }
            );  
           
        }
        function linkrecuperacion(){
            $.post("./enviar.php",
                {
                    Username:$("#login").val(),
                }
            );
            location.href='index.html';
        }
        


