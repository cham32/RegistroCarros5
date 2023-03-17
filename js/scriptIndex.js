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

// Agrega un usuario
function agregausua(){    
    $.post("./agregarusuario.php",
        {
            usuario:$("#usuario").val(),
            correo:$("#correo").val(),
            contra:$("#contraseña").val(),
        }
    );  
           
}

// Recupera contraseña de usuario
function linkrecuperacion(){
    $.post("./enviar.php",
        {
            Username:$("#login").val(),
        }
    );
    location.href='index.html';
}
