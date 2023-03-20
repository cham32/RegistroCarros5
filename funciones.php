<?php

function roltexto($numero){
    switch ($numero) {
        case 1:
            return "Administrador";
            break;
        case 2:
            return "Usuario";
            break;
        default:
            return "No identificado";
    }
}

?>