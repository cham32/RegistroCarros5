function crearSelector3() {
    $.get("crearSelector.php", function(respuesta, status){
        $("#lugarSelector").html(respuesta);
    });
}

function mifuncion2(){
    //Obtiene el valor elegido con el SELECT
    var dato=document.getElementById('seleccion').value;
    //Llama funcion que obtiene los datos buscados
    llamarPhp2(dato);
}

function llamarPhp2(dato){
// AJAX
$.ajax({
   //Tipo de envio
   type: "GET",
   //URL destino
   url: "consulta.php",
   //Datos a enviar
   data: {q:dato},  // Se forma la cadena consulta.php?q=2
   
   //Procesa dato recibido. Obtiene la tabla HTML en el objeto "respuesta"
   success: function (respuesta) {
       //Coloca el resultado en la pagina WEB
       $("#resultado").html(respuesta);
   },
   
   //Procesa mensaje de error
   error: function (e) {
       //Coloca un mensaje en la pagina WEB
       $("#resultado").text("error:"+e.status+"error:"+e.statusText);
   }
}); 
}
