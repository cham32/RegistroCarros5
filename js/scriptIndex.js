// Mostrar usuarios con boton borrar
function mostrarUsuario() {
    $.get('mostrar_usuario.php',
        function(respuesta,status) {
            $("#listausers").html(respuesta);
        },              
    );
}

// Mostrar usuarios sin boton borrar
function mirarUsuario() {
    $.get('mirar_usuario.php',
        function(respuesta,status) {
            $("#listausers").html(respuesta);
        },              
    );
}

// Borrar usuarios
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
            //rol:$("#rol").val(),
            rol:getrol(),
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

// Valor de radio button
function getrol(){
    if(document.getElementById('user').checked){
        return 2;
    }
    if(document.getElementById('admin').checked){
        return 1;
    }
}