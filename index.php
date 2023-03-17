<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta  charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión</title>

    <!-- Incluye libreria para jquery
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>-->
    <script src="./JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>

    <!-- Incluye Mi libreria -->
    <script type="text/javascript" src="./js/scriptIndex.js" type="application/javascript"></script>

    <!-- Incluye el CSS -->
    <link rel="stylesheet" href="./css/estilo.css">
    <style>
        body{
    font-family: sans-serif;
    margin: 0;
    align-items: center;
    justify-content: center;
    text-align: center;
    flex-direction: column;    
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/carros.jpg");
    background-repeat: no-repeat;
    background-size: cover;   
}
    </style>
</head>

<!-- ************************* PAGINA ***************************************** --> 
<!-- Funciones llamadas despues de cargar la pagina --> 
<body onload='mostrarUsuari();'>
    <section id="menu">
        <h1>Iniciar sesión</h1>
        <section id="botones">
                <input type="button" class="boton1" name="botonLogin" value="Login" onclick="location.href='login.html'">
                <input type="button" class="boton1" name="botonRegister" value="Register" onclick="location.href='register.html'">            

        </section>
    </section>

    
</body>

</html>